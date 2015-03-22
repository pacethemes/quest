<?php
define( 'TR_PB_VERSION', wp_get_theme()->Version );
define( 'TR_PB_DIR', trailingslashit( dirname( __FILE__ ) ) );
define( 'TR_PB_URI', get_template_directory_uri() . '/inc/pagebuilder' );

include 'save.php';

function tr_pb_setup_theme() {
	add_action( 'add_meta_boxes', 'tr_pb_add_custom_box' );
}
add_action( 'after_setup_theme', 'tr_pb_setup_theme' );

function tr_pb_add_custom_box() {
	$post_types = apply_filters( 'tr_pb_builder_post_types', array(
			'page'
		) );

	foreach ( $post_types as $post_type ) {
		add_meta_box( 'tr_pb_layout', __( 'Trivoo Page Builder', 'Trivoo' ), 'tr_pb_pagebuilder_meta_box', $post_type, 'normal', 'high' );
	}
}

function tr_pb_pagebuilder_meta_box() {
	wp_nonce_field( 'save', 'tr-pb-nonce' );
?>


		<div id="tr_pb_stage">
			<div id="tr_pb_main_container">
			</div>

			<div class="tr-pb-add-section">
				<a href="#" class="tr-pb-insert-section tr-pb-btn"><i class="dashicons dashicons-plus-alt"></i> <?php _e( 'Add New Section', 'Trivoo' ); ?></a>
			</div>
		</div>

		<!-- Partial Temapltes -->

		<script type="text/template" id="tr-pb-module-header-template">
			<div class="module-controls">
				<div class="edit-module edit-module-<%= typeof module != 'undefined' ? module : 'module' %>">
					<a href="#" title="<?php _e( 'Edit Module', 'Trivoo' ) ?>" class="edit"><i class="fa fa-pencil"></i></a>
					<a href="#" title="<?php _e( 'Remove Module', 'Trivoo' ) ?>" class="remove"><i class="fa fa-remove"></i></a>
				</div>
				<div class="admin-label"><%= admin_label %></div>
				<a href="#" class="tr-pb-module-toggle" title="<?php _e( 'Click to toggle', 'Trivoo' ); ?>"><div class="handlediv"><br></div></a>
			</div>
		</script>

		<script type="text/template" id="tr-pb-form-css-class">
			<div class="tr-pb-option">
				<label for="css_class"><?php _e( 'CSS Class', 'Trivoo' ); ?>: </label>

				<div class="tr-pb-option-container">
					<input name="css_class" class="regular-text"  type="text" value="<%= css_class %>" />

					<p class="description"><?php _e( 'CSS classes of the section, this will help you set custom styling. You can enter multiple classes by seperating them with spaces', 'Trivoo' )?></p>
				</div>
			</div>
		</script>

		<script type="text/template" id="tr-pb-form-animation">
			<div class="tr-pb-option">
				<label for="animation"><?php _e( 'CSS3 Animation', 'Trivoo' ); ?>: </label>

				<div class="tr-pb-option-container">
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

					<p class="description"><?php _e( 'CSS Animation for the Module', 'Trivoo' )?></p>

					<h3 class="animation-preview">Animate</h3>
				</div>
			</div>
		</script>

		<script type="text/template" id="tr-pb-form-admin-label">
			<div class="tr-pb-option">
				<label for="admin_label"><?php _e( 'Admin Label', 'Trivoo' ); ?>: </label>

				<div class="tr-pb-option-container">
					<input name="admin_label" class="regular-text"  type="text" value="<%= admin_label %>" />

					<p class="description"><?php _e( 'Admin label for the module, this is the label/title you will see in the Module title, it lets you name your modules and keep track of them', 'Trivoo' )?></p>
				</div>
			</div>
		</script>

		<!--End partial Tmeplates -->

		<script type="text/template" id="tr-pb-section-template">
			<div class="tr-pb-header">
				<h3><?php _e( 'Section', 'Trivoo' ); ?></h3>
				<div class="tr-pb-controls">
					<a href="#" class="tr-pb-settings tr-pb-settings-section" title="<?php _e( 'Edit Section', 'Trivoo' ); ?>"><i class="fa fa-cog"></i></a>
					<a href="#" class="tr-pb-clone tr-pb-clone-section" title="<?php _e( 'Clone Section', 'Trivoo' ); ?>"><i class="fa fa-copy"></i></a>
					<a href="#" class="tr-pb-remove" title="<?php _e( 'Delete Section', 'Trivoo' ); ?>"><i class="fa fa-remove"></i></a>
				</div>
				<a href="#" class="tr-pb-section-toggle" title="<?php _e( 'Click to toggle', 'Trivoo' ); ?>"><div class="handlediv"><br></div></a>
			</div>
			<div class="tr-pb-content-wrap">
				<div class="tr-pb-column-edit <%=  (_.isArray(content) || content.attributes !== undefined) ? 'hidden' : ''  %>"><a href="#" class="edit-columns" title="<?php _e( 'Edit Columns', 'Trivoo' ); ?>"><i class="fa fa-columns"></i></a></div>
				<div class="tr-pb-content clearfix">
					<a href="#" class="section-type tr-pb-insert-column"><i class="fa fa-columns"></i> <?php _e( 'Columns', 'Trivoo' ); ?></a>
					<a href="#" class="section-type tr-pb-insert-slider"><i class="dashicons dashicons-images-alt"></i> <?php _e( 'Image Slider', 'Trivoo' ); ?></a>
					<a href="#" class="section-type tr-pb-insert-gallery"><i class="dashicons dashicons-format-gallery"></i> <?php _e( 'Gallery', 'Trivoo' ); ?></a>
				</div>
			</div>
		</script>

		<script type="text/template" id="tr-pb-section-edit-template">
			<h2><?php _e( 'Edit Section', 'Trivoo' ); ?></h2>
			<div class="edit-content">
				<form action="#">

					<div class="tr-pb-option">
						<label for="bg_image"><?php _e( 'Background Image', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="bg_image" type="text" class="regular-text tr-pb-upload-field" value="<%= bg_image %>">
							<input type="button" class="button tr-pb-upload-button" value="Upload" data-type="image" data-choose="<?php _e( 'Select Background Image', 'Trivoo' ); ?>" data-update="<?php _e( 'Select Image', 'Trivoo' ); ?>">
							<input type="button" class="button tr-pb-remove-upload-button" value="Remove" data-type="image">

							<p class="description"><?php _e( 'If defined, this image will be used as the background for this section. To remove a background image, simply delete the URL from the settings field.', 'Trivoo' ); ?></p>
							<div class="screenshot"></div>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="bg_color"><?php _e( 'Background Color', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="bg_color" class="tr-pb-color"  type="text" value="<%= bg_color %>" />

							<p class="description"><?php _e( 'Background Color for the section, leave it blank to set a transparent color', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="text_color"><?php _e( 'Text Color', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="text_color" class="tr-pb-color"  type="text" value="<%= text_color %>" />

							<p class="description"><?php _e( 'Text Color for the section', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="padding_top"><?php _e( 'Padding Top', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="padding_top" class="regular-text"  type="text" value="<%= padding_top %>" />

							<p class="description"><?php _e( 'Padding (Spacing) at the top', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="padding_bottom"><?php _e( 'Padding Bottom', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="padding_bottom" class="regular-text"  type="text" value="<%= padding_bottom %>" />

							<p class="description"><?php _e( 'Padding (Spacing) at the Bottom', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="border_top_width"><?php _e( 'Border Top Width', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="border_top_width" class="regular-text"  type="text" value="<%= border_top_width %>" />

							<p class="description"><?php _e( 'Border width for the section top', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="border_bottom_width"><?php _e( 'Border Bottom Width', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="border_bottom_width" class="regular-text"  type="text" value="<%= border_bottom_width %>" />

							<p class="description"><?php _e( 'Border width for the section bottom', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="border_top_color"><?php _e( 'Border Top Color', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="border_top_color" class="tr-pb-color"  type="text" value="<%= border_top_color %>" />

							<p class="description"><?php _e( 'Border color for the section top', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="border_bottom_color"><?php _e( 'Border Bottom Color', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="border_bottom_color" class="tr-pb-color"  type="text" value="<%= border_bottom_color %>" />

							<p class="description"><?php _e( 'Border color for the section bottom', 'Trivoo' )?></p>
						</div>
					</div>

					<%= partial('tr-pb-form-css-class', { css_class: css_class }) %>

				</form>
			</div>
			<div class="edit-bottom">
				<input type="button" class="button button-primary save-section" value="Save" />
				<input type="button" class="button close-model" value="Close" />
			</div>
		</script>

		<script type="text/template" id="tr-pb-column-template">
			<div title="Drag-and-drop this column into place" class="tr-pb-column-header tr-pb-column-sortable ui-sortable-handle">
				<div class="sortable-background column-sortable-background"></div>
			</div>
			<div class="tr-pb-column-content">
				<a href="#" class="tr-pb-insert-module"><span><?php _e( 'Insert Module', 'Trivoo' ) ?></span></a>
			</div>
		</script>

		<script type="text/template" id="tr-pb-column-edit-template">
			<a href="#" class="tr-pb-insert-module"><span><?php _e( 'Insert Module', 'Trivoo' ) ?></span></a>
		</script>

		<script type="text/template" id="tr-pb-insert-column-template">
			<h2><?php _e( 'Select Layout', 'Trivoo' ); ?></h2>
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

		<script type="text/template" id="tr-pb-module-slider-template">
			<div title="Drag-and-drop this column into place" class="tr-pb-column-header tr-pb-column-sortable ui-sortable-handle">
				<div class="sortable-background column-sortable-background"></div>
			</div>
			<div class="tr-pb-column-content">
				<%= partial('tr-pb-module-header-template', { admin_label: admin_label, module: 'slider' }) %>
				<div class="content-preview clearfix">

					<div class="tr-pb-add-slide">
						<a href="#" class="tr-pb-insert-slide tr-pb-btn"><i class="fa fa-image"></i> <?php _e( 'New Slide', 'Trivoo' ) ?></a>
					</div>

				</div>
			</div>
			<div>

			</div>
		</script>

		<script type="text/template" id="tr-pb-module-slider-edit-template" data-title="<?php _e( 'Slider Settings', 'Trivoo' ); ?>">
			<h2><?php _e( 'Edit Image', 'Trivoo' ); ?></h2>
			<div class="edit-content">
				<form>

					<div class="tr-pb-option">
						<label for="autoplay"><?php _e( 'Slider AutoPlay', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<select name="autoplay">
								<option value="true" <%= autoplay == 'true' ? 'selected' : void 0  %> ><?php _e( 'Yes', 'Trivoo' ); ?></option>
								<option value="false" <%= autoplay == 'false' ? 'selected' : void 0  %> ><?php _e( 'No', 'Trivoo' ); ?></option>
							</select>

							<p class="description"><?php _e( 'Do you want to enable AutoPlay for this slider ? If autoplay is turned on, you can control the interval below', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="interval"><?php _e( 'AutoPlay Interval', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="interval" class="regular-text"  type="text" value="<%= interval %>" />

							<p class="description"><?php _e( 'Interval between playing the next slide, specify the time in milliseconds ( 1 second = 1000 milliseconds. You already knew this, didn\'t you :) )', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="speed"><?php _e( 'Transition Speed', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="speed" class="regular-text"  type="text" value="<%= speed %>" />

							<p class="description"><?php _e( 'Speed of the CSS3 slide transitions, specify the time in milliseconds ( 1 second = 1000 milliseconds. You already knew this, didn\'t you :) )', 'Trivoo' )?></p>
						</div>
					</div>

					<%= partial('tr-pb-form-css-class', { css_class: css_class }) %>
					<%= partial('tr-pb-form-admin-label', { admin_label: admin_label }) %>

				</form>
			</div>
			<div class="edit-bottom">
				<input type="button" class="button button-primary save-slider" value="Save" />
				<input type="button" class="button close-model" value="Close" />
			</div>
		</script>

		<script type="text/template" id="tr-pb-module-slide-template">
			<div title="Drag-and-drop this column into place" class="tr-pb-column-header tr-pb-column-sortable ui-sortable-handle">
				<div class="sortable-background column-sortable-background"></div>
			</div>
			<div class="tr-pb-column-content">
				<%= partial('tr-pb-module-header-template', { admin_label: admin_label, module: 'slide' }) %>
				<div class="slide-content-preview" <%= bg_image != '' ? 'style="background-image:url(' + bg_image + ');"' : void 0  %>>
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

		<script type="text/template" id="tr-pb-module-slide-edit-template" data-title="<?php _e( 'Edit Slider', 'Trivoo' ); ?>">
			<h2><?php _e( 'Edit Image', 'Trivoo' ); ?></h2>
			<div class="edit-content">
				<form>

					<div class="tr-pb-option">
						<label for="bg_image"><?php _e( 'Select Image', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="bg_image" type="text" class="regular-text tr-pb-upload-field" value="<%= bg_image %>">
							<input type="button" class="button tr-pb-upload-button" value="Upload" data-type="image" data-choose="<?php _e( 'Select Image', 'Trivoo' ); ?>" data-update="<?php _e( 'Select Image', 'Trivoo' ); ?>">
							<input type="button" class="button tr-pb-remove-upload-button" value="Remove" data-type="image">

							<p class="description"><?php _e( 'Select the slide image', 'Trivoo' ); ?></p>
							<div class="screenshot"></div>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="heading"><?php _e( 'Slide Heading', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="heading" class="regular-text"  type="text" value="<%= heading %>" />

							<p class="description"><?php _e( 'The heading for the slide, this will be the main heading/title displayed in the slide frontend', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="heading_color"><?php _e( 'Slide Heading Text Color', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="heading_color" class="tr-pb-color"  type="text" value="<%= heading_color %>" />

							<p class="description"><?php _e( 'Text Color for the heading', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="text"><?php _e( 'Slide Text', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<textarea name="text" class="regular-text"><%= text %></textarea>

							<p class="description"><?php _e( 'Content for the slide, this will be displayed in teh front end below the heading', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="text_color"><?php _e( 'Slide Text Color', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="text_color" class="tr-pb-color"  type="text" value="<%= text_color %>" />

							<p class="description"><?php _e( 'Text Color for the text', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="orientation"><?php _e( 'Slice Orientation', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<select name="orientation">
								<option value="vertical" <%= orientation == 'vertical' ? 'selected' : void 0  %> ><?php _e( 'Vertical', 'Trivoo' ); ?></option>
								<option value="horizontal" <%= orientation == 'false' ? 'selected' : void 0  %> ><?php _e( 'Horizontal', 'Trivoo' ); ?></option>
							</select>

							<p class="description"><?php _e( 'Should the slices split vertically or horizontally ?', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="slice1_rotation"><?php _e( 'Slice 1 Rotation', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="slice1_rotation" class="regular-text"  type="text" value="<%= slice1_rotation %>" />

							<p class="description"><?php _e( 'Amount of rotation in degrees for the first slice', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="slice2_rotation"><?php _e( 'Slice 2 Rotation', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="slice2_rotation" class="regular-text"  type="text" value="<%= slice2_rotation %>" />

							<p class="description"><?php _e( 'Amount of rotation in degrees for the second slice', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="slice1_scale"><?php _e( 'Slice 1 Scale', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="slice1_scale" class="regular-text"  type="text" value="<%= slice1_scale %>" />

							<p class="description"><?php _e( 'How big should the slice 1 scale ?', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="slice2_scale"><?php _e( 'Slice 2 Scale', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="slice2_scale" class="regular-text"  type="text" value="<%= slice2_scale %>" />

							<p class="description"><?php _e( 'How big should the slice 2 scale ?', 'Trivoo' )?></p>
						</div>
					</div>

					<%= partial('tr-pb-form-css-class', { css_class: css_class }) %>
					<%= partial('tr-pb-form-admin-label', { admin_label: admin_label }) %>

				</form>
			</div>
			<div class="edit-bottom">
				<input type="button" class="button button-primary save-slide" value="Save" />
				<input type="button" class="button close-model" value="Close" />
			</div>
		</script>

		<script type="text/template" id="tr-pb-insert-module-template">
			<h2><?php _e( 'Select Module', 'Trivoo' ); ?></h2>
			<div class="edit-content">
				<ul class="column-modules">
				<% _.each(modules, function(module){ %>
		            <li data-module="<%= module.toLowerCase() %>">
			            <div class="column-module">
							<a href="#" data-module="<%= module.toLowerCase() %>"><%= module %></a>
						</div>
					</li>
		        <% }); %>
				</ul>
			</div>
		</script>


		<script type="text/template" id="tr-pb-module-image-template">
			<%= partial('tr-pb-module-header-template', { admin_label: admin_label}) %>
			<div class="content-preview" style="text-align:<%= align %>;"><img src="<%= src %>" /></div>
		</script>

		<script type="text/template" id="tr-pb-module-image-edit-template" data-title="<?php _e( 'Edit Image', 'Trivoo' ); ?>">
			<h2><?php _e( 'Edit Image', 'Trivoo' ); ?></h2>
			<div class="edit-content">
				<form>
					<div class="tr-pb-option">
						<label for="src"><?php _e( 'Select Image', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="src" type="text" class="regular-text tr-pb-upload-field" value="<%= src %>">
							<input type="button" class="button tr-pb-upload-button" value="Upload" data-type="image" data-choose="<?php _e( 'Select Image', 'Trivoo' ); ?>" data-update="<?php _e( 'Select Image', 'Trivoo' ); ?>">
							<input type="button" class="button tr-pb-remove-upload-button" value="Remove" data-type="image">

							<p class="description"><?php _e( 'Select the Image you want to insert', 'Trivoo' ); ?></p>
							<div class="screenshot"></div>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="align"><?php _e( 'Alignment', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<select name="align">
								<option value="left" <%= align === 'left' ? 'selected' : void 0  %> ><?php _e( 'Left', 'Trivoo' ); ?></option>
								<option value="center" <%= align === 'center' ? 'selected' : void 0  %> ><?php _e( 'Center', 'Trivoo' ); ?></option>
								<option value="right" <%= align === 'right' ? 'selected' : void 0  %> ><?php _e( 'Right', 'Trivoo' ); ?></option>
							</select>

							<p class="description"><?php _e( 'The alignment of the image', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="alt"><?php _e( 'Alt', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="alt" class="regular-text"  type="text" value="<%= alt %>" />

							<p class="description"><?php _e( 'HTML alt attribute for the image', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="title"><?php _e( 'Title', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="title" class="regular-text"  type="text" value="<%= title %>" />

							<p class="description"><?php _e( 'HTML title attribute for the image', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="href"><?php _e( 'URL / Hyperlink', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<input name="href" class="regular-text"  type="text" value="<%= href %>" />

							<p class="description"><?php _e( 'If set the image will be wraped inside an anchor tag which will be opened if the user clicks on the image', 'Trivoo' )?></p>
						</div>
					</div>


					<div class="tr-pb-option">
						<label for="target"><?php _e( 'URL should open in New Tab ?', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<select name="target">
								<option value="_blank" <%= target === '_blank' ? 'selected' : void 0  %> ><?php _e( 'Yes', 'Trivoo' ); ?></option>
								<option value="_self" <%= target === '_self' ? 'selected' : void 0  %> ><?php _e( 'No', 'Trivoo' ); ?></option>
							</select>

							<p class="description"><?php _e( 'Do you want the URL to be opened in a new tab or the same tab ?', 'Trivoo' )?></p>
						</div>
					</div>

					<div class="tr-pb-option">
						<label for="lightbox"><?php _e( 'Image Lightbox', 'Trivoo' ); ?>: </label>

						<div class="tr-pb-option-container">
							<select name="lightbox">
								<option value="true" <%= lightbox === true ? 'selected' : void 0  %> ><?php _e( 'Yes', 'Trivoo' ); ?></option>
								<option value="false" <%= lightbox === false ? 'selected' : void 0  %> ><?php _e( 'No', 'Trivoo' ); ?></option>
							</select>

							<p class="description"><?php _e( 'Do you want to show a lightbox for the image ? If set to yes it will override the URL and the image will be displayed in a lightbox when the image is clicked', 'Trivoo' )?></p>
						</div>
					</div>

					<%= partial('tr-pb-form-animation', { animation: animation }) %>
					<%= partial('tr-pb-form-admin-label', { admin_label: admin_label }) %>

				</form>
			</div>
			<div class="edit-bottom">
				<input type="button" class="button button-primary save-image" value="Save" />
				<input type="button" class="button close-model" value="Close" />
			</div>
		</script>


		<script type="text/template" id="tr-pb-module-text-template">
			<%= partial('tr-pb-module-header-template', { admin_label: admin_label}) %>
			<div class="content-preview"><%= content %></div>
		</script>

		<div id="tr_pb_editor_modal" class="reveal-modal">
			<h2><?php _e( 'Edit Content', 'Trivoo' ); ?></h2>
			<div class="edit-content">
				<div class="tr-pb-option">
					<label for="tr_pb_editor"><?php _e( 'Content', 'Trivoo' ); ?>: </label>
					<div class="tr-pb-option-container">
						<?php
	wp_editor( '', 'tr_pb_editor', array(
			'tinymce'       => array(
				'wp_autoresize_on' => false,
				'resize'           => false
			),
			'editor_height' => 260
		) );
?>
					</div>
				</div>
				<div class="tr-pb-option">

					<label for="animation">CSS3 Animation: </label>

					<div class="tr-pb-option-container">
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

				<div class="tr-pb-option">
					<label for="admin_label"><?php _e( 'Admin Label', 'Trivoo' ); ?>: </label>

					<div class="tr-pb-option-container">
						<input name="admin_label" class="regular-text"  type="text" value="" />

						<p class="description"><?php _e( 'Admin label for the module, this is the label/title you will see in the Module title, it lets you name your modules and keep track of them', 'Trivoo' )?></p>
					</div>
				</div>

			</div>
			<div class="edit-bottom">
				<input type="button" class="button button-primary save-content" value="Save" />
				<input type="button" class="button close-model" value="Close" />
			</div>
		</div>


	<?php
}

function tr_pb_admin_scripts_styles( $hook ) {
	global $typenow;

	// if ( $hook === 'widgets.php' ) {
	//  wp_enqueue_script( 'tr_pb_widgets_js', TR_PB_URI . '/js/widgets.js', array( 'jquery' ), TR_PB_VERSION, true );

	//  wp_localize_script( 'tr_pb_widgets_js', 'tr_pb_options', array(
	//   'ajaxurl'       => admin_url( 'admin-ajax.php' ),
	//   'et_load_nonce' => wp_create_nonce( 'et_load_nonce' ),
	//  ) );

	//  wp_enqueue_style( 'tr_pb_widgets_css', TR_PB_URI . '/css/widgets.css', array(), TR_PB_VERSION );

	//  return;
	// }

	if ( ! in_array( $hook, array( 'post-new.php', 'post.php' ) ) ) return;

	$post_types = apply_filters( 'tr_pb_builder_post_types', array(
			'page'
		) );

	/*
	 * Load the builder javascript and css files for custom post types
	 * custom post types can be added using tr_pb_builder_post_types filter
	*/
	if ( isset( $typenow ) && in_array( $typenow, $post_types ) )
		tr_pb_add_builder_page_js_css();
}
add_action( 'admin_enqueue_scripts', 'tr_pb_admin_scripts_styles', 10, 1 );


function tr_pb_add_builder_page_js_css() {
	global $post_id;
	wp_enqueue_script( 'jquery-ui-core' );

	wp_enqueue_script( 'jquery-ui-dialog' );
	wp_enqueue_style (  'wp-jquery-ui-dialog' );

	wp_enqueue_script( 'underscore' );
	wp_enqueue_script( 'backbone' );

	//wp_enqueue_script( 'google-maps-api', add_query_arg( array( 'v' => 3, 'sensor' => 'false' ), is_ssl() ? 'https://maps-api-ssl.google.com/maps/api/js' : 'http://maps.google.com/maps/api/js' ), array(), '3', true );
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_style( 'wp-color-picker' );

	//wp_enqueue_script( 'jquery-modal', get_template_directory_uri().'/assets/plugins/jquery-modal/jquery.modal.min.js' );
	//wp_enqueue_style( 'jquery-modal', get_template_directory_uri().'/assets/plugins/jquery-modal/jquery.modal.css' );


	wp_enqueue_style( 'animate-css', get_template_directory_uri().'/assets/plugins/animate/animate.css' );

	wp_enqueue_script( 'jquery-reveal', get_template_directory_uri().'/assets/plugins/reveal/jquery.reveal.js' );
	wp_enqueue_style( 'jquery-reveal', get_template_directory_uri().'/assets/plugins/reveal	/reveal.css' );


	wp_enqueue_script( 'tr_pb_models_js', TR_PB_URI . '/assets/js/models.js', array( 'jquery', 'jquery-ui-core', 'underscore', 'backbone' ), TR_PB_VERSION, true );
	wp_enqueue_script( 'tr_pb_collections_js', TR_PB_URI . '/assets/js/collections.js', array( 'jquery', 'jquery-ui-core', 'underscore', 'backbone' ), TR_PB_VERSION, true );
	wp_enqueue_script( 'tr_pb_views_js', TR_PB_URI . '/assets/js/views.js', array( 'jquery', 'jquery-ui-core', 'underscore', 'backbone' ), TR_PB_VERSION, true );
	wp_enqueue_script( 'tr_pb_admin_js', TR_PB_URI . '/assets/js/app.js', array( 'jquery', 'jquery-ui-core', 'underscore', 'backbone' ), TR_PB_VERSION, true );
	// wp_enqueue_script( 'tr_pb_admin_date_js', TR_PB_URI . '/js/jquery-ui-1.10.4.custom.min.js', array( 'jquery' ), TR_PB_VERSION, true );
	// wp_enqueue_script( 'tr_pb_admin_date_addon_js', TR_PB_URI . '/js/jquery-ui-timepicker-addon.js', array( 'tr_pb_admin_date_js' ), TR_PB_VERSION, true );

	// wp_localize_script( 'tr_pb_admin_js', 'tr_pb_options', array(
	//  'ajaxurl'                       => admin_url( 'admin-ajax.php' ),
	//  'et_load_nonce'                 => wp_create_nonce( 'et_load_nonce' ),
	//  'images_uri'                    => get_template_directory_uri() . '/images',
	//  'section_only_row_dragged_away' => __( 'The section should have at least one row.', 'Divi' ),
	//  'fullwidth_module_dragged_away' => __( 'Fullwidth module can\'t be used outside of the Fullwidth Section.', 'Divi' ),
	//  'stop_dropping_3_col_row'       => __( '3 column row can\'t be used in this column.', 'Divi' ),
	//  'preview_image'                 => __( 'Preview', 'Divi' ),
	//  'empty_admin_label'             => __( 'Module', 'Divi' ),
	// ) );

	wp_localize_script( 'tr_pb_admin_js', 'trPbAppSections', get_post_meta( $post_id, 'tr_pb_sections' ) );

	wp_enqueue_style( 'tr_pb_admin_css', TR_PB_URI . '/assets//css/style.css', array(), TR_PB_VERSION );
	// wp_enqueue_style( 'tr_pb_admin_date_css', TR_PB_URI . '/css/jquery-ui-1.10.4.custom.css', array(), TR_PB_VERSION );
}


?>
