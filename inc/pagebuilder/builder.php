<?php

include 'save.php';

/**
 *
 */
class PT_PageBuilder {

	private static $PT_PB_VERSION ;
	private static $PT_PB_DIR ;
	private static $PT_PB_URI ;

	// Hold an instance of the class
	private static $instance;

	public function __construct() {

		//set the Page Builder specific variables
		self::$PT_PB_VERSION = wp_get_theme()->Version ;
		self::$PT_PB_DIR = trailingslashit( dirname( __FILE__ ) ) ;
		self::$PT_PB_URI = get_template_directory_uri() . '/inc/pagebuilder' ;

		//setup required Hooks and Filters
		add_action( 'after_setup_theme', array( $this, 'InitializeMetaBox' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'EnqueueAssets' ), 10, 1 );
	}

	/**
	 * Returns an instance of the PT_PageBuilder class, creates one if an instance doesn't exist. Implements Singleton pattern
	 *
	 * @return PT_PageBuilder
	 */
	public static function getInstance() {
		if ( !isset( self::$instance ) ) {
			self::$instance = new static();
		}
		return self::$instance;
	}

	/**
	 * calls add_action on 'add_meta_boxes' hook and attaches the 'AddMetaBox' function
	 *
	 * @return void
	 */
	public function InitializeMetaBox() {
		add_action( 'add_meta_boxes', array( $this, 'AddMetaBox' ) );
	}

	/**
	 * Adds the Page Builder Metabox to allowed post types, Post types can be modified using the 'pt_pb_builder_post_types' filter
	 *
	 * @return void
	 */
	public function AddMetaBox() {
		$post_types = apply_filters( 'pt_pb_builder_post_types', array(
				'page'
			) );

		foreach ( $post_types as $post_type ) {
			add_meta_box( 'pt-pb-layout', __( 'Quest Page Builder', 'Quest' ), array( $this, 'PageBuilderHtml' ), $post_type, 'normal', 'high' );
		}
	}

	/**
	 * Enqueues required js and css for the pagebuilder
	 *
	 * @return void
	 */
	public function EnqueueAssets( $hook ) {
		global $typenow, $post;

		if ( ! in_array( $hook, array( 'post-new.php', 'post.php' ) ) ) return;

		$post_types = apply_filters( 'pt_pb_builder_post_types', array(
				'page'
			) );

		/*
		 * Load the builder javascript and css files for custom post types
		 * custom post types can be added using pt_pb_builder_post_types filter
		*/
		if ( isset( $typenow ) && in_array( $typenow, $post_types ) ) {

			wp_enqueue_script( 'jquery-ui-core' );

			wp_enqueue_script( 'jquery-ui-dialog' );
			wp_enqueue_style (  'wp-jquery-ui-dialog' );

			wp_enqueue_script( 'underscore' );
			wp_enqueue_script( 'backbone' );

			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_style( 'wp-color-picker' );


			wp_enqueue_style( 'animate-css', get_template_directory_uri().'/assets/plugins/animate/animate.css' );

			wp_enqueue_script( 'jquery-reveal', get_template_directory_uri().'/assets/plugins/reveal/jquery.reveal.js' );
			wp_enqueue_style( 'jquery-reveal', get_template_directory_uri().'/assets/plugins/reveal	/reveal.css' );


			wp_enqueue_script( 'pt_pb_models_js', self::$PT_PB_URI . '/assets/js/models.js', array( 'jquery', 'jquery-ui-core', 'underscore', 'backbone' ), self::$PT_PB_VERSION, true );
			wp_enqueue_script( 'pt_pb_collections_js', self::$PT_PB_URI . '/assets/js/collections.js', array( 'jquery', 'jquery-ui-core', 'underscore', 'backbone' ), self::$PT_PB_VERSION, true );
			wp_enqueue_script( 'pt_pb_views_js', self::$PT_PB_URI . '/assets/js/views.js', array( 'jquery', 'jquery-ui-core', 'underscore', 'backbone' ), self::$PT_PB_VERSION, true );
			wp_enqueue_script( 'pt_pb_admin_js', self::$PT_PB_URI . '/assets/js/app.js', array( 'jquery', 'jquery-ui-core', 'underscore', 'backbone' ), self::$PT_PB_VERSION, true );

			wp_localize_script( 'pt_pb_admin_js', 'trPbAppSections', get_post_meta( $post->ID, 'pt_pb_sections', true ) );

			wp_enqueue_style( 'pt_pb_admin_css', self::$PT_PB_URI . '/assets//css/style.css', array(), self::$PT_PB_VERSION );

		}
	}

	/**
	 * Prints all required HTML and '_' templates required by the Page Builder
	 *
	 * @return void
	 */
	public function PageBuilderHtml() {
		wp_nonce_field( 'save', 'pt-pb-nonce' );
		?>


			<div id="pt_pb_stage">
				<div id="pt-pb-main-container">
				</div>

				<div class="pt-pb-add-section">
					<input name="pt_pb_section[]" type="hidden" value="">
					<a href="#" class="pt-pb-insert-section pt-pb-btn"><i class="dashicons dashicons-plus-alt"></i> <?php _e( 'Add New Section', 'Quest' ); ?></a>
				</div>
			</div>

			<?php
			/*
			* Action hook to add custom templates
			*/
			do_action( 'pt_pb_before_templates' );
			?>

			<!-- Partial Temapltes -->

			<script type="text/template" id="pt-pb-module-header-template">
				<div class="module-controls">
					<div class="edit-module edit-module-<%= typeof module != 'undefined' ? module : 'module' %>">
						<a href="#" title="<?php _e( 'Edit Module', 'Quest' ) ?>" class="edit"><i class="fa fa-pencil"></i></a>
						<a href="#" title="<?php _e( 'Remove Module', 'Quest' ) ?>" class="remove"><i class="fa fa-remove"></i></a>
					</div>
					<div class="admin-label"><%= admin_label %></div>
					<a href="#" class="pt-pb-module-toggle" title="<?php _e( 'Click to toggle', 'Quest' ); ?>"><div class="handlediv"><br></div></a>
				</div>
			</script>

			<script type="text/template" id="pt-pb-form-css-class">
				<div class="pt-pb-option">
					<label for="css_class"><?php _e( 'CSS Class', 'Quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="css_class" class="regular-text"  type="text" value="<%= css_class %>" />

						<p class="description"><?php _e( 'CSS classes of the section, this will help you set custom styling. You can enter multiple classes by seperating them with spaces', 'Quest' )?></p>
					</div>
				</div>
			</script>

			<script type="text/template" id="pt-pb-form-animation">
				<div class="pt-pb-option">
					<label for="animation"><?php _e( 'CSS3 Animation', 'Quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<select class="js-animations" name="animation">
							<%= generateOption(animation, '') %>
							<optgroup label="Attention Seekers">
								<%= generateOption(animation, 'bounce') %>
								<%= generateOption(animation, 'flash') %>
								<%= generateOption(animation, 'pulse') %>
								<%= generateOption(animation, 'rubberBand') %>
								<%= generateOption(animation, 'shake') %>
								<%= generateOption(animation, 'swing') %>
								<%= generateOption(animation, 'tada') %>
								<%= generateOption(animation, 'wobble') %>
							</optgroup>

							<optgroup label="Bouncing Entrances">
								<%= generateOption(animation, 'bounceIn') %>
								<%= generateOption(animation, 'bounceInDown') %>
								<%= generateOption(animation, 'bounceInLeft') %>
								<%= generateOption(animation, 'bounceInRight') %>
								<%= generateOption(animation, 'bounceInUp') %>
							</optgroup>

							<optgroup label="Bouncing Exits">
								<%= generateOption(animation, 'bounceOut') %>
								<%= generateOption(animation, 'bounceOutDown') %>
								<%= generateOption(animation, 'bounceOutLeft') %>
								<%= generateOption(animation, 'bounceOutRight') %>
								<%= generateOption(animation, 'bounceOutUp') %>
							</optgroup>

							<optgroup label="Fading Entrances">
								<%= generateOption(animation, 'fadeIn') %>
								<%= generateOption(animation, 'fadeInDown') %>
								<%= generateOption(animation, 'fadeInDownBig') %>
								<%= generateOption(animation, 'fadeInLeft') %>
								<%= generateOption(animation, 'fadeInLeftBig') %>
								<%= generateOption(animation, 'fadeInRight') %>
								<%= generateOption(animation, 'fadeInRightBig') %>
								<%= generateOption(animation, 'fadeInUp') %>
								<%= generateOption(animation, 'fadeInUpBig') %>
							</optgroup>

							<optgroup label="Fading Exits">
								<%= generateOption(animation, 'fadeOut') %>
								<%= generateOption(animation, 'fadeOutDown') %>
								<%= generateOption(animation, 'fadeOutDownBig') %>
								<%= generateOption(animation, 'fadeOutLeft') %>
								<%= generateOption(animation, 'fadeOutLeftBig') %>
								<%= generateOption(animation, 'fadeOutRight') %>
								<%= generateOption(animation, 'fadeOutRightBig') %>
								<%= generateOption(animation, 'fadeOutUp') %>
								<%= generateOption(animation, 'fadeOutUpBig') %>
							</optgroup>

							<optgroup label="Flippers">
								<%= generateOption(animation, 'flip') %>
								<%= generateOption(animation, 'flipInX') %>
								<%= generateOption(animation, 'flipInY') %>
								<%= generateOption(animation, 'flipOutX') %>
								<%= generateOption(animation, 'flipOutY') %>
							</optgroup>

							<optgroup label="Lightspeed">
								<%= generateOption(animation, 'lightSpeedIn') %>
								<%= generateOption(animation, 'lightSpeedOut') %>
							</optgroup>

							<optgroup label="Rotating Entrances">
								<%= generateOption(animation, 'rotateIn') %>
								<%= generateOption(animation, 'rotateInDownLeft') %>
								<%= generateOption(animation, 'rotateInDownRight') %>
								<%= generateOption(animation, 'rotateInUpLeft') %>
								<%= generateOption(animation, 'rotateInUpRight') %>
							</optgroup>

							<optgroup label="Rotating Exits">
								<%= generateOption(animation, 'rotateOut') %>
								<%= generateOption(animation, 'rotateOutDownLeft') %>
								<%= generateOption(animation, 'rotateOutDownRight') %>
								<%= generateOption(animation, 'rotateOutUpLeft') %>
								<%= generateOption(animation, 'rotateOutUpRight') %>
							</optgroup>

							<optgroup label="Specials">
								<%= generateOption(animation, 'hinge') %>
								<%= generateOption(animation, 'rollIn') %>
								<%= generateOption(animation, 'rollOut') %>
							</optgroup>

							<optgroup label="Zoom Entrances">
								<%= generateOption(animation, 'zoomIn') %>
								<%= generateOption(animation, 'zoomInDown') %>
								<%= generateOption(animation, 'zoomInLeft') %>
								<%= generateOption(animation, 'zoomInRight') %>
								<%= generateOption(animation, 'zoomInUp') %>
							</optgroup>

							<optgroup label="Zoom Exits">
								<%= generateOption(animation, 'zoomOut') %>
								<%= generateOption(animation, 'zoomOutDown') %>
								<%= generateOption(animation, 'zoomOutLeft') %>
								<%= generateOption(animation, 'zoomOutRight') %>
								<%= generateOption(animation, 'zoomOutUp') %>
							</optgroup>
						</select>

						<p class="description"><?php _e( 'CSS Animation for the Module', 'Quest' )?></p>

						<h3 class="animation-preview">Animate</h3>
					</div>
				</div>
			</script>

			<script type="text/template" id="pt-pb-form-admin-label">
				<div class="pt-pb-option">
					<label for="admin_label"><?php _e( 'Admin Label', 'Quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="admin_label" class="regular-text"  type="text" value="<%= admin_label %>" />

						<p class="description"><?php _e( 'Admin label for the module, this is the label/title you will see in the Module title, it lets you name your modules and keep track of them', 'Quest' )?></p>
					</div>
				</div>
			</script>

			<!--End partial Tmeplates -->

			<script type="text/template" id="pt-pb-section-template">
				<div class="pt-pb-header">
					<h3><?php _e( 'Section', 'Quest' ); ?></h3>
					<div class="pt-pb-controls">
						<a href="#" class="pt-pb-settings pt-pb-settings-section" title="<?php _e( 'Edit Section', 'Quest' ); ?>"><i class="fa fa-cog"></i></a>
						<a href="#" class="pt-pb-clone pt-pb-clone-section" title="<?php _e( 'Clone Section', 'Quest' ); ?>"><i class="fa fa-copy"></i></a>
						<a href="#" class="pt-pb-remove" title="<?php _e( 'Delete Section', 'Quest' ); ?>"><i class="fa fa-remove"></i></a>
					</div>
					<a href="#" class="pt-pb-section-toggle" title="<?php _e( 'Click to toggle', 'Quest' ); ?>"><div class="handlediv"><br></div></a>
				</div>
				<div class="pt-pb-content-wrap">
					<div class="pt-pb-column-edit <%=  (_.isArray(content) || content.attributes !== undefined) ? 'hidden' : ''  %>"><a href="#" class="edit-columns" title="<?php _e( 'Edit Columns', 'Quest' ); ?>"><i class="fa fa-columns"></i></a></div>
					<div class="pt-pb-content clearfix">
						<a href="#" class="section-type pt-pb-insert-column"><i class="fa fa-columns"></i> <?php _e( 'Columns', 'Quest' ); ?></a>
						<a href="#" class="section-type pt-pb-insert-slider"><i class="dashicons dashicons-images-alt"></i> <?php _e( 'Image Slider', 'Quest' ); ?></a>
						<a href="#" class="section-type pt-pb-insert-gallery"><i class="dashicons dashicons-format-gallery"></i> <?php _e( 'Gallery', 'Quest' ); ?></a>
					</div>
				</div>
			</script>

			<script type="text/template" id="pt-pb-section-edit-template">
				<h2><?php _e( 'Edit Section', 'Quest' ); ?></h2>
				<div class="edit-content">
					<form action="#">

						<div class="pt-pb-option">
							<label for="bg_image"><?php _e( 'Background Image', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="bg_image" type="text" class="regular-text pt-pb-upload-field" value="<%= bg_image %>">
								<input type="button" class="button pt-pb-upload-button" value="Upload" data-type="image" data-choose="<?php _e( 'Select Background Image', 'Quest' ); ?>" data-update="<?php _e( 'Select Image', 'Quest' ); ?>">
								<input type="button" class="button pt-pb-remove-upload-button" value="Remove" data-type="image">

								<p class="description"><?php _e( 'If defined, this image will be used as the background for this section. To remove a background image, simply delete the URL from the settings field.', 'Quest' ); ?></p>
								<div class="screenshot"></div>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="bg_color"><?php _e( 'Background Color', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="bg_color" class="pt-pb-color"  type="text" value="<%= bg_color %>" />

								<p class="description"><?php _e( 'Background Color for the section, leave it blank to set a transparent color', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="text_color"><?php _e( 'Text Color', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="text_color" class="pt-pb-color"  type="text" value="<%= text_color %>" />

								<p class="description"><?php _e( 'Text Color for the section', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="padding_top"><?php _e( 'Padding Top', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="padding_top" class="regular-text"  type="text" value="<%= padding_top %>" />

								<p class="description"><?php _e( 'Padding (Spacing) at the top', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="padding_bottom"><?php _e( 'Padding Bottom', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="padding_bottom" class="regular-text"  type="text" value="<%= padding_bottom %>" />

								<p class="description"><?php _e( 'Padding (Spacing) at the Bottom', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="border_top_width"><?php _e( 'Border Top Width', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="border_top_width" class="regular-text"  type="text" value="<%= border_top_width %>" />

								<p class="description"><?php _e( 'Border width for the section top', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="border_bottom_width"><?php _e( 'Border Bottom Width', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="border_bottom_width" class="regular-text"  type="text" value="<%= border_bottom_width %>" />

								<p class="description"><?php _e( 'Border width for the section bottom', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="border_top_color"><?php _e( 'Border Top Color', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="border_top_color" class="pt-pb-color"  type="text" value="<%= border_top_color %>" />

								<p class="description"><?php _e( 'Border color for the section top', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="border_bottom_color"><?php _e( 'Border Bottom Color', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="border_bottom_color" class="pt-pb-color"  type="text" value="<%= border_bottom_color %>" />

								<p class="description"><?php _e( 'Border color for the section bottom', 'Quest' )?></p>
							</div>
						</div>

						<%= partial('pt-pb-form-css-class', { css_class: css_class }) %>

					</form>
				</div>
				<div class="edit-bottom">
					<input type="button" class="button button-primary save-section" value="Save" />
					<input type="button" class="button close-model" value="Close" />
				</div>
			</script>

			<script type="text/template" id="pt-pb-column-template">
				<div title="Drag-and-drop this column into place" class="pt-pb-column-header pt-pb-column-sortable ui-sortable-handle">
					<div class="sortable-background column-sortable-background"></div>
				</div>
				<div class="pt-pb-column-content">
					<a href="#" class="pt-pb-insert-module"><span><?php _e( 'Insert Module', 'Quest' ) ?></span></a>
				</div>
			</script>

			<script type="text/template" id="pt-pb-column-edit-template">
				<a href="#" class="pt-pb-insert-module"><span><?php _e( 'Insert Module', 'Quest' ) ?></span></a>
			</script>

			<script type="text/template" id="pt-pb-insert-column-template">
				<h2><?php _e( 'Select Layout', 'Quest' ); ?></h2>
				<div class="edit-content">
					<ul class="column-layouts">
						<li data-layout="1-1">
							<div class="column-layout full-width"></div>
						</li>
						<li data-layout="1-2,1-2">
							<div class="column-layout column-layout-1_2"></div>
							<div class="column-layout column-layout-1_2"></div>
						</li>
						<li data-layout="1-3,1-3,1-3">
							<div class="column-layout column-layout-1_3"></div>
							<div class="column-layout column-layout-1_3"></div>
							<div class="column-layout column-layout-1_3"></div>
						</li>
						<li data-layout="1-4,1-4,1-4,1-4">
							<div class="column-layout column-layout-1_4"></div>
							<div class="column-layout column-layout-1_4"></div>
							<div class="column-layout column-layout-1_4"></div>
							<div class="column-layout column-layout-1_4"></div>
						</li>
					</ul>
				</div>
			</script>

			<script type="text/template" id="pt-pb-module-slider-template">

				<div class="slider-container clearfix">
					<div class="pt-pb-column-edit ">
						<a href="#" class="pt-pb-settings pt-pb-settings-slider" title="<?php _e( 'Slider Settings', 'Quest' ) ?>"><i class="dashicons dashicons-images-alt"></i></a>
					</div>
					
					<div class="pt-pb-add-slide">
						<a href="#" class="pt-pb-insert-slide pt-pb-btn"><i class="dashicons dashicons-format-image"></i> <?php _e( 'New Slide', 'Quest' ) ?></a>
					</div>

				</div>
				<div>

				</div>
			</script>

			<script type="text/template" id="pt-pb-module-slider-edit-template" data-title="<?php _e( 'Slider Settings', 'Quest' ); ?>">
				<h2><?php _e( 'Edit Slider', 'Quest' ); ?></h2>
				<div class="edit-content">
					<form>

						<div class="pt-pb-option">
							<label for="height"><?php _e( 'Slider Height', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="height" class="regular-text"  type="text" value="<%= height %>" />

								<p class="description"><?php _e( 'Height of the slider', 'Quest' )?></p>
							</div>
						</div>


						<div class="pt-pb-option">
							<label for="autoplay"><?php _e( 'Slider AutoPlay', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<select name="autoplay">
									<option value="true" <%= autoplay == 'true' ? 'selected' : void 0  %> ><?php _e( 'Yes', 'Quest' ); ?></option>
									<option value="false" <%= autoplay == 'false' ? 'selected' : void 0  %> ><?php _e( 'No', 'Quest' ); ?></option>
								</select>

								<p class="description"><?php _e( 'Do you want to enable AutoPlay for this slider ? If autoplay is turned on, you can control the interval below', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="interval"><?php _e( 'AutoPlay Interval', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="interval" class="regular-text"  type="text" value="<%= interval %>" />

								<p class="description"><?php _e( 'Interval between playing the next slide, specify the time in milliseconds ( 1 second = 1000 milliseconds. You already knew this, didn\'t you :) )', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="speed"><?php _e( 'Transition Speed', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="speed" class="regular-text"  type="text" value="<%= speed %>" />

								<p class="description"><?php _e( 'Speed of the CSS3 slide transitions, specify the time in milliseconds ( 1 second = 1000 milliseconds. You already knew this, didn\'t you :) )', 'Quest' )?></p>
							</div>
						</div>

						<%= partial('pt-pb-form-css-class', { css_class: css_class }) %>
						<%= partial('pt-pb-form-admin-label', { admin_label: admin_label }) %>

					</form>
				</div>
				<div class="edit-bottom">
					<input type="button" class="button button-primary save-slider" value="Save" />
					<input type="button" class="button close-model" value="Close" />
				</div>
			</script>

			<script type="text/template" id="pt-pb-module-slide-template">
				<div title="Drag-and-drop this column into place" class="pt-pb-column-header pt-pb-column-sortable ui-sortable-handle">
					<div class="sortable-background column-sortable-background"></div>
				</div>
				<div class="pt-pb-column-content">
					<%= partial('pt-pb-module-header-template', { admin_label: admin_label, module: 'slide' }) %>
					<div class="slide-content-preview" <%= bg_image != '' ? 'style="background-image:url(' + bg_image + ');"' : void 0  %>>
						<% if (bg_image == "") { %>
							<div class="slide-dummy-image"><a href="#" title="<?php _e( 'Edit Slide', 'Quest' ); ?>"><i class="dashicons dashicons-format-image"></i></a></div>
						<% }%>

						<% if (heading == "" && text == "") { %>

						<% }%>

						<% if (heading != "") { %>
						    <h2 class="slide-heading" style="<%= heading_color != '' ? 'color:' + heading_color + ';' : void 0  %>"><%= heading %></h2>
						<% }%>

						<% if (text != "") { %>
							<p class="slide-text" style="<%= text_color != '' ? 'color:' + text_color + ';' : void 0  %>"><%= text %></h2>
						<% }%>
					</div>
				</div>
			</script>

			<script type="text/template" id="pt-pb-module-slide-edit-template" data-title="<?php _e( 'Edit Slider', 'Quest' ); ?>">
				<h2><?php _e( 'Edit Image', 'Quest' ); ?></h2>
				<div class="edit-content">
					<form>

						<div class="pt-pb-option">
							<label for="bg_image"><?php _e( 'Select Image', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="bg_image" type="text" class="regular-text pt-pb-upload-field" value="<%= bg_image %>">
								<input type="button" class="button pt-pb-upload-button" value="Upload" data-type="image" data-choose="<?php _e( 'Select Image', 'Quest' ); ?>" data-update="<?php _e( 'Select Image', 'Quest' ); ?>">
								<input type="button" class="button pt-pb-remove-upload-button" value="Remove" data-type="image">

								<p class="description"><?php _e( 'Select the slide image', 'Quest' ); ?></p>
								<div class="screenshot"></div>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="bg_pos_x"><?php _e( 'Image Position - Horizontal', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<select name="bg_pos_x">
									<option value="center" <%= bg_pos_x == 'center' ? 'selected' : void 0  %> ><?php _e( 'Center', 'Quest' ); ?></option>
									<option value="left" <%= bg_pos_x == 'left' ? 'selected' : void 0  %> ><?php _e( 'Left', 'Quest' ); ?></option>
									<option value="right" <%= bg_pos_x == 'right' ? 'selected' : void 0  %> ><?php _e( 'Right', 'Quest' ); ?></option>
								</select>

								<p class="description"><?php _e( 'Horizontal position of the Image, if the image width is more than the slider width then the image will be positioned as per this setting', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="bg_pos_y"><?php _e( 'Image Position - Vertical', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<select name="bg_pos_y">
									<option value="center" <%= bg_pos_y == 'center' ? 'selected' : void 0  %> ><?php _e( 'Center', 'Quest' ); ?></option>
									<option value="top" <%= bg_pos_y == 'top' ? 'selected' : void 0  %> ><?php _e( 'Top', 'Quest' ); ?></option>
									<option value="bottom" <%= bg_pos_y == 'bottom' ? 'selected' : void 0  %> ><?php _e( 'Bottom', 'Quest' ); ?></option>
								</select>

								<p class="description"><?php _e( 'Vertical position of the Image, if the image height is more than the slider height then the image will be positioned as per this setting', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="heading"><?php _e( 'Slide Heading', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="heading" class="regular-text"  type="text" value="<%= heading %>" />

								<p class="description"><?php _e( 'The heading for the slide, this will be the main heading/title displayed in the slide frontend', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="heading_color"><?php _e( 'Slide Heading Text Color', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="heading_color" class="pt-pb-color"  type="text" value="<%= heading_color %>" />

								<p class="description"><?php _e( 'Text Color for the heading', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="text"><?php _e( 'Slide Text', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<textarea name="text" class="regular-text"><%= text %></textarea>

								<p class="description"><?php _e( 'Content for the slide, this will be displayed in teh front end below the heading', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="text_color"><?php _e( 'Slide Text Color', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="text_color" class="pt-pb-color"  type="text" value="<%= text_color %>" />

								<p class="description"><?php _e( 'Text Color for the text', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="orientation"><?php _e( 'Slice Orientation', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<select name="orientation">
									<option value="vertical" <%= orientation == 'vertical' ? 'selected' : void 0  %> ><?php _e( 'Vertical', 'Quest' ); ?></option>
									<option value="horizontal" <%= orientation == 'false' ? 'selected' : void 0  %> ><?php _e( 'Horizontal', 'Quest' ); ?></option>
								</select>

								<p class="description"><?php _e( 'Should the slices split vertically or horizontally ?', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="slice1_rotation"><?php _e( 'Slice 1 Rotation', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="slice1_rotation" class="regular-text"  type="text" value="<%= slice1_rotation %>" />

								<p class="description"><?php _e( 'Amount of rotation in degrees for the first slice', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="slice2_rotation"><?php _e( 'Slice 2 Rotation', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="slice2_rotation" class="regular-text"  type="text" value="<%= slice2_rotation %>" />

								<p class="description"><?php _e( 'Amount of rotation in degrees for the second slice', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="slice1_scale"><?php _e( 'Slice 1 Scale', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="slice1_scale" class="regular-text"  type="text" value="<%= slice1_scale %>" />

								<p class="description"><?php _e( 'How big should the slice 1 scale ?', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="slice2_scale"><?php _e( 'Slice 2 Scale', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="slice2_scale" class="regular-text"  type="text" value="<%= slice2_scale %>" />

								<p class="description"><?php _e( 'How big should the slice 2 scale ?', 'Quest' )?></p>
							</div>
						</div>

						<%= partial('pt-pb-form-css-class', { css_class: css_class }) %>
						<%= partial('pt-pb-form-admin-label', { admin_label: admin_label }) %>

					</form>
				</div>
				<div class="edit-bottom">
					<input type="button" class="button button-primary save-slide" value="Save" />
					<input type="button" class="button close-model" value="Close" />
				</div>
			</script>

			<script type="text/template" id="pt-pb-module-gallery-template">

				<div class="gallery-container clearfix">
					<div class="pt-pb-column-edit ">
						<a href="#" class="pt-pb-settings pt-pb-settings-gallery" title="<?php _e( 'Gallery Settings', 'Quest' ) ?>"><i class="dashicons dashicons-format-gallery"></i></a>
					</div>
					
					<div class="images-container clearfix"></div>

					<div class="pt-pb-add-image">
						<a href="#" class="pt-pb-insert-gimage pt-pb-btn"><i class="dashicons dashicons-format-image"></i> <?php _e( 'New Image', 'Quest' ) ?></a>
					</div>

				</div>
				<div>

				</div>
			</script>

			<script type="text/template" id="pt-pb-module-gallery-edit-template" data-title="<?php _e( 'Gallery Settings', 'Quest' ); ?>">
				<h2><?php _e( 'Edit Gallery', 'Quest' ); ?></h2>
				<div class="edit-content">
					<form>

						<div class="pt-pb-option">
							<label for="shape"><?php _e( 'Thumbnails Shape', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<select name="shape">
									<option value="rounded" <%= shape == 'rounded' ? 'selected' : void 0  %> ><?php _e( 'Round', 'Quest' ); ?></option>
									<option value="square" <%= shape == 'square' ? 'selected' : void 0  %> ><?php _e( 'Square', 'Quest' ); ?></option>
								</select>

								<p class="description"><?php _e( 'Do you want to enable Fullscreen for this gallery preview ?', 'Quest' )?></p>
							</div>
						</div>

						<%= partial('pt-pb-form-css-class', { css_class: css_class }) %>
						<%= partial('pt-pb-form-admin-label', { admin_label: admin_label }) %>

					</form>
				</div>
				<div class="edit-bottom">
					<input type="button" class="button button-primary save-gallery" value="Save" />
					<input type="button" class="button close-model" value="Close" />
				</div>
			</script>

			<script type="text/template" id="pt-pb-module-gimage-template">
				<div title="Drag-and-drop this column into place" class="pt-pb-column-header pt-pb-column-sortable ui-sortable-handle">
					<div class="sortable-background column-sortable-background"></div>
				</div>
				<div class="pt-pb-column-content">
					<%= partial('pt-pb-module-header-template', { admin_label: admin_label, module: 'gimage' }) %>
					<div class="gimage-content-preview" <%= src != '' ? 'style="background-image:url(' + src + ');"' : void 0  %>>
						<% if (src == "") { %>
							<div class="slide-dummy-image"><a href="#" title="<?php _e( 'Edit Image', 'Quest' ); ?>"><i class="dashicons dashicons-format-image"></i></a></div>
						<% }%>
					</div>
				</div>
			</script>

			<script type="text/template" id="pt-pb-module-gimage-edit-template" data-title="<?php _e( 'Edit Slider', 'Quest' ); ?>">
				<h2><?php _e( 'Edit Image', 'Quest' ); ?></h2>
				<div class="edit-content">
					<form>

						<div class="pt-pb-option">
							<label for="src"><?php _e( 'Select Image', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="src" type="text" class="regular-text pt-pb-upload-field" value="<%= src %>">
								<input name="post_id" type="hidden" class="regular-text pt-pb-upload-field-id" value="<%= post_id %>">
								<input type="button" class="button pt-pb-upload-button" value="Upload" data-type="image" data-choose="<?php _e( 'Select Image', 'Quest' ); ?>" data-update="<?php _e( 'Select Image', 'Quest' ); ?>">
								<input type="button" class="button pt-pb-remove-upload-button" value="Remove" data-type="image">

								<p class="description"><?php _e( 'Select the slide image', 'Quest' ); ?></p>
								<div class="screenshot"></div>
							</div>
						</div>

						<%= partial('pt-pb-form-css-class', { css_class: css_class }) %>
						<%= partial('pt-pb-form-admin-label', { admin_label: admin_label }) %>

					</form>
				</div>
				<div class="edit-bottom">
					<input type="button" class="button button-primary save-gimage" value="Save" />
					<input type="button" class="button close-model" value="Close" />
				</div>
			</script>

			<script type="text/template" id="pt-pb-insert-module-template">
				<h2><?php _e( 'Select Module', 'Quest' ); ?></h2>
				<div class="edit-content">
					<div class="column-modules">
					<% _.each(modules, function(attr, module){ %>
						<a class="column-module" href="#" data-module="<%= module.toLowerCase() %>"><i class="dashicons dashicons-<%= attr.icon %>"></i> <%= attr.admin_label %></a>
			        <% }); %>
					</div>
				</div>
			</script>


			<script type="text/template" id="pt-pb-module-image-template">
				<%= partial('pt-pb-module-header-template', { admin_label: admin_label}) %>
				<div class="content-preview" style="text-align:<%= align %>;"><img src="<%= src %>" /></div>
			</script>

			<script type="text/template" id="pt-pb-module-image-edit-template" data-title="<?php _e( 'Edit Image', 'Quest' ); ?>">
				<h2><?php _e( 'Edit Image', 'Quest' ); ?></h2>
				<div class="edit-content">
					<form>
						<div class="pt-pb-option">
							<label for="src"><?php _e( 'Select Image', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="src" type="text" class="regular-text pt-pb-upload-field" value="<%= src %>">
								<input type="button" class="button pt-pb-upload-button" value="Upload" data-type="image" data-choose="<?php _e( 'Select Image', 'Quest' ); ?>" data-update="<?php _e( 'Select Image', 'Quest' ); ?>">
								<input type="button" class="button pt-pb-remove-upload-button" value="Remove" data-type="image">

								<p class="description"><?php _e( 'Select the Image you want to insert', 'Quest' ); ?></p>
								<div class="screenshot"></div>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="align"><?php _e( 'Alignment', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<select name="align">
									<option value="left" <%= align === 'left' ? 'selected' : void 0  %> ><?php _e( 'Left', 'Quest' ); ?></option>
									<option value="center" <%= align === 'center' ? 'selected' : void 0  %> ><?php _e( 'Center', 'Quest' ); ?></option>
									<option value="right" <%= align === 'right' ? 'selected' : void 0  %> ><?php _e( 'Right', 'Quest' ); ?></option>
								</select>

								<p class="description"><?php _e( 'The alignment of the image', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="alt"><?php _e( 'Alt', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="alt" class="regular-text"  type="text" value="<%= alt %>" />

								<p class="description"><?php _e( 'HTML alt attribute for the image', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="title"><?php _e( 'Title', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="title" class="regular-text"  type="text" value="<%= title %>" />

								<p class="description"><?php _e( 'HTML title attribute for the image', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="href"><?php _e( 'URL / Hyperlink', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="href" class="regular-text"  type="text" value="<%= href %>" />

								<p class="description"><?php _e( 'If set the image will be wraped inside an anchor tag which will be opened if the user clicks on the image', 'Quest' )?></p>
							</div>
						</div>


						<div class="pt-pb-option">
							<label for="target"><?php _e( 'URL should open in New Tab ?', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<select name="target">
									<option value="_blank" <%= target === '_blank' ? 'selected' : void 0  %> ><?php _e( 'Yes', 'Quest' ); ?></option>
									<option value="_self" <%= target === '_self' ? 'selected' : void 0  %> ><?php _e( 'No', 'Quest' ); ?></option>
								</select>

								<p class="description"><?php _e( 'Do you want the URL to be opened in a new tab or the same tab ?', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="lightbox"><?php _e( 'Image Lightbox', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<select name="lightbox">
									<option value="true" <%= lightbox == 'true' ? 'selected' : void 0  %> ><?php _e( 'Yes', 'Quest' ); ?></option>
									<option value="false" <%= lightbox == 'false' ? 'selected' : void 0  %> ><?php _e( 'No', 'Quest' ); ?></option>
								</select>

								<p class="description"><?php _e( 'Do you want to show a lightbox for the image ? If set to yes it will override the URL and the image will be displayed in a lightbox when the image is clicked', 'Quest' )?></p>
							</div>
						</div>

						<%= partial('pt-pb-form-animation', { animation: animation }) %>
						<%= partial('pt-pb-form-admin-label', { admin_label: admin_label }) %>

					</form>
				</div>
				<div class="edit-bottom">
					<input type="button" class="button button-primary save-image" value="Save" />
					<input type="button" class="button close-model" value="Close" />
				</div>
			</script>


			<script type="text/template" id="pt-pb-module-text-template">
				<%= partial('pt-pb-module-header-template', { admin_label: admin_label}) %>
				<div class="content-preview"><%= content %></div>
			</script>

			<script type="text/template" id="pt-pb-module-hovericon-template">
				<%= partial('pt-pb-module-header-template', { admin_label: admin_label}) %>
				<div class="content-preview hover-icon">
					<a href="#<%= href %>" class="fa fa-<%= size %>x <%= icon %>"></a>
					<h3 class="icon-title"><%= title %></h3>
					<%= content %>
				</div>
			</script>

			<script type="text/template" id="pt-pb-module-hovericon-edit-template" data-title="<?php _e( 'Edit Hover Icon', 'Quest' ); ?>">
				<h2><?php _e( 'Edit Hover Icon', 'Quest' ); ?></h2>
				<div class="edit-content">
					<form>

						<div class="pt-pb-option">
							<label for="align"><?php _e( 'Icon', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<div class="icon-preview"><i class="fa fa-2x <%= icon %>"></i></div>
								<input name="icon" type="hidden" class="pt-pb-icon" value="<%= icon %>">
								<input type="button" class="button pt-pb-icon-select" value="<?php _e( 'Select Icon', 'Quest' ); ?>">

								<p class="description"><?php _e( 'Select the Icon you want to insert', 'Quest' ); ?></p>
								<div class="icon-grid"></div>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="align"><?php _e( 'Icon Size', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<select name="size">
									<option value="1" <%= size == '1' ? 'selected' : void 0  %> >1</option>
									<option value="2" <%= size == '2' ? 'selected' : void 0  %> >2</option>
									<option value="3" <%= size == '3' ? 'selected' : void 0  %> >3</option>
									<option value="4" <%= size == '4' ? 'selected' : void 0  %> >4</option>
									<option value="5" <%= size == '5' ? 'selected' : void 0  %> >5</option>
								</select>

								<p class="description"><?php _e( 'Size of the Icon', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="color"><?php _e( 'Color', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="color" class="pt-pb-color"  type="text" value="<%= color %>" />

								<p class="description"><?php _e( 'Color of the Icon, this will be Icon Color and the border color', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="hover_color"><?php _e( 'Hover Color', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="hover_color" class="pt-pb-color"  type="text" value="<%= hover_color %>" />

								<p class="description"><?php _e( 'Background Color of the Icon, when a user hovers on the Icon the Color and Hover Color will be swapped', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="title"><?php _e( 'Icon Title', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<input name="title" class="regular-text"  type="text" value="<%= title %>" />

								<p class="description"><?php _e( 'This will be the heading/title below the Icon', 'Quest' )?></p>
							</div>
						</div>

						<div class="pt-pb-option">
							<label for="content"><?php _e( 'Icon Text', 'Quest' ); ?>: </label>

							<div class="pt-pb-option-container">
								<textarea name="content" class="regular-text"><%= content %> </textarea>

								<p class="description"><?php _e( 'This will be the text below the Icon Title', 'Quest' )?></p>
							</div>
						</div>

						<%= partial('pt-pb-form-animation', { animation: animation }) %>
						<%= partial('pt-pb-form-admin-label', { admin_label: admin_label }) %>

					</form>
				</div>
				<div class="edit-bottom">
					<input type="button" class="button button-primary save-icon" value="Save" />
					<input type="button" class="button close-model" value="Close" />
				</div>
			</script>

			<div id="pt-pb-editor-modal" class="reveal-modal">
				<h2><?php _e( 'Edit Content', 'Quest' ); ?></h2>
				<div class="edit-content">
					<div class="pt-pb-option">
						<label for="pt_pb_editor"><?php _e( 'Content', 'Quest' ); ?>: </label>
						<div class="pt-pb-option-container">
							<?php
								wp_editor( '', 'pt_pb_editor', array(
										'tinymce'       => array(
											'wp_autoresize_on' => false,
											'resize'           => false
										),
										'editor_height' => 260
									) );
							?>
						</div>
					</div>
					<div class="pt-pb-option">

						<label for="animation">CSS3 Animation: </label>

						<div class="pt-pb-option-container">
							<select class="js-animations" name="animation">
								<option value=""></option>
								<optgroup label="Attention Seekers">
									<option value="bounce">bounce</option>
									<option value="flash">flash</option>
									<option value="pulse">pulse</option>
									<option value="rubberBand">rubberBand</option>
									<option value="shake">shake</option>
									<option value="swing">swing</option>
									<option value="tada">tada</option>
									<option value="wobble">wobble</option>
								</optgroup>

								<optgroup label="Bouncing Entrances">
									<option value="bounceIn">bounceIn</option>
									<option value="bounceInDown">bounceInDown</option>
									<option value="bounceInLeft">bounceInLeft</option>
									<option value="bounceInRight">bounceInRight</option>
									<option value="bounceInUp">bounceInUp</option>
								</optgroup>

								<optgroup label="Bouncing Exits">
									<option value="bounceOut">bounceOut</option>
									<option value="bounceOutDown">bounceOutDown</option>
									<option value="bounceOutLeft">bounceOutLeft</option>
									<option value="bounceOutRight">bounceOutRight</option>
									<option value="bounceOutUp">bounceOutUp</option>
								</optgroup>

								<optgroup label="Fading Entrances">
									<option value="fadeIn">fadeIn</option>
									<option value="fadeInDown">fadeInDown</option>
									<option value="fadeInDownBig">fadeInDownBig</option>
									<option value="fadeInLeft">fadeInLeft</option>
									<option value="fadeInLeftBig">fadeInLeftBig</option>
									<option value="fadeInRight">fadeInRight</option>
									<option value="fadeInRightBig">fadeInRightBig</option>
									<option value="fadeInUp">fadeInUp</option>
									<option value="fadeInUpBig">fadeInUpBig</option>
								</optgroup>

								<optgroup label="Fading Exits">
									<option value="fadeOut">fadeOut</option>
									<option value="fadeOutDown">fadeOutDown</option>
									<option value="fadeOutDownBig">fadeOutDownBig</option>
									<option value="fadeOutLeft">fadeOutLeft</option>
									<option value="fadeOutLeftBig">fadeOutLeftBig</option>
									<option value="fadeOutRight">fadeOutRight</option>
									<option value="fadeOutRightBig">fadeOutRightBig</option>
									<option value="fadeOutUp">fadeOutUp</option>
									<option value="fadeOutUpBig">fadeOutUpBig</option>
								</optgroup>

								<optgroup label="Flippers">
									<option value="flip">flip</option>
									<option value="flipInX">flipInX</option>
									<option value="flipInY">flipInY</option>
									<option value="flipOutX">flipOutX</option>
									<option value="flipOutY">flipOutY</option>
								</optgroup>

								<optgroup label="Lightspeed">
									<option value="lightSpeedIn">lightSpeedIn</option>
									<option value="lightSpeedOut">lightSpeedOut</option>
								</optgroup>

								<optgroup label="Rotating Entrances">
									<option value="rotateIn">rotateIn</option>
									<option value="rotateInDownLeft">rotateInDownLeft</option>
									<option value="rotateInDownRight">rotateInDownRight</option>
									<option value="rotateInUpLeft">rotateInUpLeft</option>
									<option value="rotateInUpRight">rotateInUpRight</option>
								</optgroup>

								<optgroup label="Rotating Exits">
									<option value="rotateOut">rotateOut</option>
									<option value="rotateOutDownLeft">rotateOutDownLeft</option>
									<option value="rotateOutDownRight">rotateOutDownRight</option>
									<option value="rotateOutUpLeft">rotateOutUpLeft</option>
									<option value="rotateOutUpRight">rotateOutUpRight</option>
								</optgroup>

								<optgroup label="Specials">
									<option value="hinge">hinge</option>
									<option value="rollIn">rollIn</option>
									<option value="rollOut">rollOut</option>
								</optgroup>

								<optgroup label="Zoom Entrances">
									<option value="zoomIn">zoomIn</option>
									<option value="zoomInDown">zoomInDown</option>
									<option value="zoomInLeft">zoomInLeft</option>
									<option value="zoomInRight">zoomInRight</option>
									<option value="zoomInUp">zoomInUp</option>
								</optgroup>

								<optgroup label="Zoom Exits">
									<option value="zoomOut">zoomOut</option>
									<option value="zoomOutDown">zoomOutDown</option>
									<option value="zoomOutLeft">zoomOutLeft</option>
									<option value="zoomOutRight">zoomOutRight</option>
									<option value="zoomOutUp">zoomOutUp</option>
								</optgroup>
							</select>

							<p class="description">CSS Animation for the Module</p>

							<h3 class="animation-preview">Animate</h3>
						</div>

					</div>

					<div class="pt-pb-option">
						<label for="admin_label"><?php _e( 'Admin Label', 'Quest' ); ?>: </label>

						<div class="pt-pb-option-container">
							<input name="admin_label" class="regular-text"  type="text" value="" />

							<p class="description"><?php _e( 'Admin label for the module, this is the label/title you will see in the Module title, it lets you name your modules and keep track of them', 'Quest' )?></p>
						</div>
					</div>

				</div>
				<div class="edit-bottom">
					<input type="button" class="button button-primary save-content" value="Save" />
					<input type="button" class="button close-model" value="Close" />
				</div>
			</div>


		<?php

		/*
		* Action hook to add custom templates
		*/
		do_action( 'pt_pb_after_templates' );

	}


}


PT_PageBuilder::getInstance();

?>