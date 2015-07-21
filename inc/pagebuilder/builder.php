<?php

include 'save.php';

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
		self::$PT_PB_URI      = get_template_directory_uri() . '/inc/pagebuilder';
		self::$QUEST_PLUS_URI = "http://pacethemes.com/quest-download-pricing";

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
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
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
			add_meta_box( 'pt-pb-layout', __( 'Quest Page Builder', 'quest' ), array(
				$this,
				'PageBuilderHtml'
			), $post_type, 'normal', 'high' );
		}
	}

	/**
	 * Enqueues required js and css for the pagebuilder
	 *
	 * @return void
	 */
	public function EnqueueAssets( $hook ) {
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

			wp_enqueue_script( 'underscore' );
			wp_enqueue_script( 'backbone' );

			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_style( 'wp-color-picker' );


			wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/plugins/animate/animate.css' );

			wp_enqueue_script( 'pt_pb_models_js', self::$PT_PB_URI . '/assets/js/models.js', array(
				'jquery',
				'jquery-ui-core',
				'underscore',
				'backbone'
			), self::$PT_PB_VERSION, true );
			wp_enqueue_script( 'pt_pb_collections_js', self::$PT_PB_URI . '/assets/js/collections.js', array(
				'jquery',
				'jquery-ui-core',
				'underscore',
				'backbone',
				'pt_pb_models_js'
			), self::$PT_PB_VERSION, true );
			wp_enqueue_script( 'pt_pb_views_js', self::$PT_PB_URI . '/assets/js/views.js', array(
				'jquery',
				'jquery-ui-core',
				'underscore',
				'backbone',
				'pt_pb_collections_js'
			), self::$PT_PB_VERSION, true );
			wp_enqueue_script( 'pt_pb_admin_js', self::$PT_PB_URI . '/assets/js/app.js', array(
				'jquery',
				'jquery-ui-core',
				'underscore',
				'backbone',
				'pt_pb_collections_js'
			), self::$PT_PB_VERSION, true );

			wp_localize_script( 'pt_pb_admin_js', 'ptPbAppSections', get_post_meta( $post->ID, 'pt_pb_sections', true ) );

			wp_enqueue_style( 'pt_pb_admin_css', self::$PT_PB_URI . '/assets/css/style.css', array(), self::$PT_PB_VERSION );

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
		self::LoadPageBuilderTemplate( 'partial-module-header' );
		self::LoadPageBuilderTemplate( 'partial-css-class' );
		self::LoadPageBuilderTemplate( 'partial-admin-label' );
		self::LoadPageBuilderTemplate( 'partial-form-animation' );

		/* Section Templates */
		self::LoadPageBuilderTemplate( 'section' );
		self::LoadPageBuilderTemplate( 'section-edit' );

		/* Row Templates */
		self::LoadPageBuilderTemplate( 'row' );

		/* Column Templates */
		self::LoadPageBuilderTemplate( 'column' );
		self::LoadPageBuilderTemplate( 'column-edit' );
		self::LoadPageBuilderTemplate( 'column-insert' );

		/* Slider Templates */
		self::LoadPageBuilderTemplate( 'module-slider' );
		self::LoadPageBuilderTemplate( 'module-slider-edit' );
		self::LoadPageBuilderTemplate( 'module-slide' );
		self::LoadPageBuilderTemplate( 'module-slide-edit' );

		/* Gallery Templates */
		self::LoadPageBuilderTemplate( 'module-gallery' );
		self::LoadPageBuilderTemplate( 'module-gallery-edit' );
		self::LoadPageBuilderTemplate( 'module-gimage' );
		self::LoadPageBuilderTemplate( 'module-gimage-edit' );

		/* Module Templates */
		self::LoadPageBuilderTemplate( 'insert-module' );

		/* Image Module Templates */
		self::LoadPageBuilderTemplate( 'module-image' );
		self::LoadPageBuilderTemplate( 'module-image-edit' );

		/* Text Module Templates */
		self::LoadPageBuilderTemplate( 'module-text' );
		self::LoadPageBuilderTemplate( 'module-text-edit' );

		/* Hovericon Module Templates */
		self::LoadPageBuilderTemplate( 'module-hovericon' );
		self::LoadPageBuilderTemplate( 'module-hovericon-edit' );

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
	private static function LoadPageBuilderTemplate( $name ) {

		ob_start(); // turn on output buffering
		include( self::$PT_PB_DIR . "/templates/$name.php" );
		$template = ob_get_clean(); // get the contents of the output buffer

		/*
		* Filter to overwrite any template
		*/
		echo apply_filters( "pt_pb_load_template_$name", $template );
	}


}


PT_PageBuilder::getInstance();

?>