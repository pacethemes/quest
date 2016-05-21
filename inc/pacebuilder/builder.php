<?php

require trailingslashit( dirname( __FILE__ ) ) . 'save.php';

/**
 *
 */
class PT_PageBuilder {

	private static $PT_PB_VERSION;
	private static $PT_PB_DIR;
	private static $PT_PB_URI;
	private static $QUEST_PLUS_URI;

	// Hold an instance of the class
	private static $instance;

	public function __construct() {

		//set the Page Builder specific variables
		self::$PT_PB_VERSION  = wp_get_theme()->Version;
		self::$PT_PB_DIR      = trailingslashit( dirname( __FILE__ ) );
		self::$PT_PB_URI      = get_template_directory_uri() . '/inc/pacebuilder';
		self::$QUEST_PLUS_URI = "http://pacethemes.com/quest-download-pricing";

		//setup required Hooks and Filters
		add_action( 'after_setup_theme', array( $this, 'initialize_meta_box' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ), 10, 1 );

		if ( in_array( $GLOBALS['pagenow'], array( 'edit.php', 'post.php', 'post-new.php' ) ) ) {
			add_action( 'admin_footer', array( $this, 'pagebuilder_tour' ) );
			add_action( 'admin_footer', array( $this, 'icon_picker' ) );
		}
	}

	/**
	 * Returns an instance of the PT_PageBuilder class, creates one if an instance doesn't exist. Implements Singleton pattern
	 *
	 * @return PT_PageBuilder
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
		
	// Temporary fix to prevent fatal errors
	public static function getInstance(){
		return self::get_instance();
	}
		
	/**
	 * calls add_action on 'add_meta_boxes' hook and attaches the 'add_meta_box' function
	 *
	 * @return void
	 */
	public function initialize_meta_box() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
	}

	/**
	 * Adds the Page Builder Metabox to allowed post types, Post types can be modified using the 'pt_pb_builder_post_types' filter
	 *
	 * @return void
	 */
	public function add_meta_box() {
		$post_types = apply_filters( 'pt_pb_builder_post_types', array(
			'page'
		) );

		foreach ( $post_types as $post_type ) {
			add_meta_box( 'pt-pb-layout', __( 'Quest Page Builder', 'quest' ), array(
				$this,
				'pagebuilder_html'
			), $post_type, 'normal', 'high' );
		}
	}

	/**
	 * Enqueues required js and css for the pagebuilder
	 *
	 * @return void
	 */
	public function enqueue_assets( $hook ) {
		global $typenow, $post;

		if ( ! in_array( $hook, array( 'post-new.php', 'post.php' ) ) ) {
			return;
		}

		$post_types = apply_filters( 'pt_pb_builder_post_types', array(
			'page'
		) );

		/*
		 * Load the builder javascript and css files for custom post types
		 * custom post types can be added using pt_pb_builder_post_types filter
		*/
		if ( isset( $typenow ) && in_array( $typenow, $post_types ) ) {

			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-draggable' );
			wp_enqueue_script( 'jquery-ui-droppable' );

			wp_enqueue_script( 'underscore' );
			wp_enqueue_script( 'backbone' );

			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker-alpha', get_template_directory_uri() . '/assets/plugins/wp-color-picker-alpha/wp-color-picker-alpha.min.js', array( 'wp-color-picker' ), '1.1' );


			wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/plugins/animate/animate.css' );

			wp_enqueue_script( 'pt_pb_tour', self::$PT_PB_URI . '/assets/js/jquery-tourbus.js', array( 'jquery' ), self::$PT_PB_VERSION, true );

			wp_enqueue_script( 'pt_pb_util_js', self::$PT_PB_URI . '/assets/js/util.js', array(
				'jquery',
				'jquery-ui-core',
				'underscore',
				'backbone'
			), self::$PT_PB_VERSION, true );

			wp_enqueue_script( 'pt_pb_models_js', self::$PT_PB_URI . '/assets/js/models.js', array(
				'pt_pb_util_js'
			), self::$PT_PB_VERSION, true );
			wp_enqueue_script( 'pt_pb_collections_js', self::$PT_PB_URI . '/assets/js/collections.js', array(
				'pt_pb_models_js'
			), self::$PT_PB_VERSION, true );
			wp_enqueue_script( 'pt_pb_views_js', self::$PT_PB_URI . '/assets/js/views.js', array(
				'pt_pb_collections_js'
			), self::$PT_PB_VERSION, true );
			wp_enqueue_script( 'pt_pb_admin_js', self::$PT_PB_URI . '/assets/js/app.js', array(
				'pt_pb_collections_js'
			), self::$PT_PB_VERSION, true );
			
			wp_localize_script( 'pt_pb_admin_js', 'ptPbAppSections', PT_PageBuilder_Helper::decode_pb_metadata( get_post_meta( $post->ID, 'pt_pb_sections', true ) ) );
			wp_localize_script( 'pt_pb_views_js', 'ptPbAppSliders', 
					apply_filters( 'pt_pb_generic_sliders', array( 'meta' => array( 
						'exists' => class_exists( 'MetaSliderPlugin' ), 
						'icon' => "<img src=' " . plugins_url("ml-slider/assets/metaslider/matchalabs.png") . "' />",
						'sliders' => PT_PageBuilder::get_meta_sliders(),
						'name' => 'Meta Slider'
					) ) ) );

			wp_localize_script( 'pt_pb_models_js', 'ptPbAppPlugins', 
					apply_filters( 'pt_pb_wp_plugins', array( 'Contactform7' => class_exists( 'WPCF7' ) ? 1 : 0 ) ) 
					);
			

			wp_enqueue_style( 'pt_pb_tour_css', self::$PT_PB_URI . '/assets/css/jquery-tourbus.css', array(), self::$PT_PB_VERSION );
			wp_enqueue_style( 'pt_pb_admin_css', self::$PT_PB_URI . '/assets/css/style.css', array(), self::$PT_PB_VERSION );

			wp_localize_script( 'pt_pb_models_js', 'ptPbAppLocalization', array(
						'remove_section' => __( 'Are you sure you want to remove this Section ? This step cannot be undone.', 'quest' ),
						'remove_row' => __( 'Are you sure you want to remove this Row ? This step cannot be undone.', 'quest' ),
						'remove_slide' => __( 'Are you sure you want to remove this Slide ? This step cannot be undone.', 'quest' ),
						'remove_image' => __( 'Are you sure you want to remove this Image ? This step cannot be undone.', 'quest' ),
						'remove_module' => __( 'Are you sure you want to remove this Module ? This step cannot be undone.', 'quest' ),
						'resize_columns' => __( 'You are about to resize the columns to a lower size than the existing columns, it may remove the last columns and will result in data/module loss. Do you really want to do this ?', 'quest' )
					) );

		}
	}

	/**
	 * Prints all required HTML and '_' templates required by the Page Builder
	 *
	 * @return void
	 */
	public function pagebuilder_html() {
		wp_nonce_field( 'save', 'pt-pb-nonce' );
		?>

		<div id="pt_pb_loader">
			<div class="pt-pb-spinner"></div>
		</div>

		<?php
		/*
		* Action hook to add custom templates
		*/
		do_action( 'pt_pb_before_stage' );
		?>

		<div id="upgrade_message" class="quest-plus-message">
			<p>
				<strong> <?php _e( 'Need some Inspiration ?', 'quest' ); ?>  <span class="quest-plus">Quest Plus</span>
				</strong><br>
				<a href="<?php echo self::$QUEST_PLUS_URI; ?>"
				   target="_blank"><?php _e( 'Upgrade to Quest Plus', 'quest' ); ?></a> <?php _e( 'and get pre built layouts and the ability to save/load any layout.', 'quest' ); ?>
			</p>
		</div>

		<div id="pt_pb_stage">
			<div id="pt-pb-main-container">
			</div>

			<div class="pt-pb-add-section">
				<input name="pt_pb_section[]" type="hidden" value="">
				<a href="#" class="pt-pb-insert-section pt-pb-btn"><i
						class="dashicons dashicons-plus-alt"></i> <?php _e( 'Add New Section', 'quest' ); ?></a>
			</div>
		</div>

		<div id="pt-pb-editor-hidden">
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

		<?php
		/*
		* Action hook to add custom templates
		*/
		do_action( 'pt_pb_before_templates' );

		/* Partial Templates */
		self::load_pb_template( 'partial-module-header' );
		self::load_pb_template( 'partial-module-margin' );
		self::load_pb_template( 'partial-css-class' );
		self::load_pb_template( 'partial-admin-label' );
		self::load_pb_template( 'partial-form-animation' );

		/* Section Templates */
		self::load_pb_template( 'section' );

		/* Row Templates */
		self::load_pb_template( 'row' );

		/* Column Templates */
		self::load_pb_template( 'column' );

		/* Slider Templates */
		self::load_pb_template( 'module-slider' );
		self::load_pb_template( 'module-slide' );

		/* Meta Slider Templates */
		self::load_pb_template( 'module-generic-slider' );

		/* Gallery Templates */
		self::load_pb_template( 'module-gallery' );
		self::load_pb_template( 'module-gimage' );

		/* Image Module Templates */
		self::load_pb_template( 'module-image' );

		/* Text Module Templates */
		self::load_pb_template( 'module-text' );

		/* Hovericon Module Templates */
		self::load_pb_template( 'module-hovericon' );

		/* Feature Box Module Templates */
		self::load_pb_template( 'module-featurebox' );

		/* Contact Form 7 */
		self::load_pb_template( 'module-cf7' );

		/*
		* Action hook to add custom templates
		*/
		do_action( 'pt_pb_after_templates' );

	}

	/**
	 * Prints a page builder template
	 *
	 * @return void
	 */
	private static function load_pb_template( $name ) {

		ob_start(); // turn on output buffering
		include( self::$PT_PB_DIR . "/templates/$name.php" );
		$template = ob_get_clean(); // get the contents of the output buffer

		/*
		* Filter to overwrite any template
		*/
		echo apply_filters( "pt_pb_load_template_$name", $template );
	}

	public function pagebuilder_tour() {
		include( self::$PT_PB_DIR . 'tour.php' );
	}

	public function icon_picker() {
		include( self::$PT_PB_DIR . 'icon-picker.php' );
	}

	public static function get_meta_sliders(){
		$ml_sliders   = new WP_Query( array(
						'post_type' => 'ml-slider'
					) );
		ob_start();
		$ml_sliders = $ml_sliders->get_posts();
		foreach ($ml_sliders as $slider) {
		?>
			<option value="<?php echo $slider->ID ?>" {{{ <?php echo $slider->ID; ?> == slider_id ? 'selected' : void 0 }}} ><?php echo $slider->post_title; ?></option>
		<?php 
		}
		return ob_get_clean();
	}

}


PT_PageBuilder::get_instance();
