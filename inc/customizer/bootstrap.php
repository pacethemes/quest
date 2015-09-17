<?php
/**
 * @package Quest
 */

$quest_customizer_path = trailingslashit( get_template_directory() ) . 'inc/customizer/';

require $quest_customizer_path . "defaults.php";
require $quest_customizer_path . "helpers.php";
require $quest_customizer_path . "google-fonts.php";

if ( ! class_exists( 'Quest_Customize' ) ):

	/**
	 * Contains methods for customizing the theme customization screen.
	 *
	 * @link http://codex.wordpress.org/Theme_Customization_API
	 * @since MyTheme 1.0
	 */
	class Quest_Customize {

		// Hold an instance of the class
		private static $instance;

		public function __construct() {

			// Setup the Theme Customizer settings and controls...
			add_action( 'customize_register', array( $this, 'Register' ) );

			// Output custom CSS to live site
			add_action( 'wp_head', array( $this, 'HeaderOutput' ) );

			//enqueue required fonts
			add_action( 'wp_enqueue_scripts', array( $this, 'EnqueueFonts' ) );

			// Enqueue live preview javascript in Theme Customizer admin screen
			add_action( 'customize_preview_init', array( $this, 'LivePreview' ) );

			add_action( 'customize_controls_enqueue_scripts', array( $this, 'EnqueueScripts' ) );
		}

		/**
		 * Returns an instance of the Quest_Customize class, creates one if an instance doesn't exist. Implements Singleton pattern
		 *
		 * @return Quest_Customize
		 */
		public static function getInstance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self ();
			}

			return self::$instance;
		}

		/**
		 * This hooks into 'customize_register' (available as of WP 3.4) and allows
		 * you to add new sections and controls to the Theme Customize screen.
		 *
		 * Note: To enable instant preview, we have to actually write a bit of custom
		 * javascript. See live_preview() for more.
		 *
		 * @see add_action('customize_register',$func)
		 *
		 * @param \WP_Customize_Manager $wp_customize
		 *
		 * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
		 * @since MyTheme 1.0
		 */
		public static function Register( $wp_customize ) {
			$quest_customizer_path = trailingslashit( get_template_directory() ) . 'inc/customizer/';

			// Load all custom controls
			require $quest_customizer_path . "custom-controls/google-fonts-control.php";
			require $quest_customizer_path . "custom-controls/text-area-control.php";
			require $quest_customizer_path . "custom-controls/misc-control.php";
			require $quest_customizer_path . "custom-controls/multiple-checkbox-control.php";

			// Load all Customizer Panels
			require $quest_customizer_path . "panels/general.php";
			require $quest_customizer_path . "panels/layout.php";
			require $quest_customizer_path . "panels/background-images.php";
			require $quest_customizer_path . "panels/colors.php";
			require $quest_customizer_path . "panels/typography.php";

			Quest_Customize_General::register( $wp_customize );
			Quest_Customize_Layout::register( $wp_customize );
			Quest_Customize_Background_Images::register( $wp_customize );
			Quest_Customize_Colors::register( $wp_customize );
			Quest_Customize_Typography::register( $wp_customize );
		}

		/**
		 * This will output the custom WordPress settings to the live theme's WP head.
		 *
		 * Used by hook: 'wp_head'
		 *
		 * @see add_action('wp_head',$func)
		 * @since MyTheme 1.0
		 */
		public static function HeaderOutput() {
			?>
			<!--Customizer CSS-->
			<style type="text/css">
				<?php
			self::PrintCss(); ?>
				<?php
			self::PrintPBCss(); ?>
			</style>
			<!--/Customizer CSS-->
		<?php
		}

		/**
		 * This outputs the javascript needed to automate the live settings preview.
		 * Also keep in mind that this function isn't necessary unless your settings
		 * are using 'transport'=>'postMessage' instead of the default 'transport'
		 * => 'refresh'
		 *
		 * Used by hook: 'customize_preview_init'
		 *
		 * @see add_action('customize_preview_init',$func)
		 * @since MyTheme 1.0
		 */
		public static function LivePreview() {

			/*TO DO - Implement Live Preview using Javascript and postMessage Transport*/

			//wp_enqueue_script( 'quest-customizer-preview', get_template_directory_uri() . '/inc/customizer/assets/js/customizer-preview.js', array(  'jquery' ), '', true );


		}

		public static function PrintPBCss() {
			global $post;

			if ( null === $post || get_page_template_slug( $post->ID ) !== 'page-builder.php' ) {
				return;
			}

			$css      = "\n/* Hover Icons */\n";
			$sections = PT_PageBuilder_Helper::decode_pb_section_metadata( get_post_meta( $post->ID, 'pt_pb_sections', true ) );

			foreach ( $sections as $key => $section ) {
				$css .= self::BuildSectionCss( $section );
				if ( ! is_numeric( $key ) || ! array_key_exists( 'row', $section ) || empty( $section['row'] ) ) {
					continue;
				}

				foreach ( $section['row'] as $j => $row ) {

					if ( ! is_numeric( $j ) || ! array_key_exists( 'col', $row ) || empty( $row['col'] ) ) {
						continue;
					}

					foreach ( $row['col'] as $k => $col ) {
						if ( ! is_numeric( $k ) || ! array_key_exists( 'module', $col ) || empty( $col['module'] ) ) {
							continue;
						}

						if ( is_array( $col['module'] ) && ! array_key_exists( 'id', $col['module'] ) ) {
							foreach ( $col['module'] as $l => $module ) {
								if ( $module['type'] === 'hovericon' ) {
									$css .= self::BuildHoverIconCss( $module );
								}
								$css .= apply_filters( "pt_pb_css_module_{$module['type']}", '', $module );
							}
						} elseif ( isset( $col['module']['type'] ) ) {
							if ( $col['module']['type'] === 'hovericon' ) {
								$css .= self::BuildHoverIconCss( $col['module'] );
							}

							$css .= apply_filters( "pt_pb_css_module_{$col['module']['type']}", '', $col['module'] );
						}
					}
				}

			}

			echo $css;
		}

		private static function BuildHoverIconCss( $module ) {
			$output = "#{$module['id']}.hover-icon .fa { background-color : {$module['hover_color']}; color: {$module['color']} ; box-shadow: 0 0 0 4px {$module['color']}; } \n";
			$output .= "#{$module['id']}.hover-icon .fa:hover { background-color : {$module['color']}; color: {$module['hover_color']} ; box-shadow: 0 0 0 8px {$module['color']}; } \n";

			return $output;
		}

		private static function BuildSectionCss( $section ) {

			return "#{$section['id']} h1, #{$section['id']}  h2, #{$section['id']}  h3, #{$section['id']}  h4, #{$section['id']}  h5, #{$section['id']} h6, #{$section['id']} p { color: {$section['text_color']}; } ";
		}

		public function EnqueueScripts() {

			wp_enqueue_script( 'chosen', get_template_directory_uri() . '/assets/plugins/chosen/chosen.jquery.js', array(
				'jquery',
				'wp-color-picker'
			), '', true );

			wp_enqueue_script( 'quest-customizer', get_template_directory_uri() . '/inc/customizer/assets/js/customizer.js', array(), '', true );

			wp_localize_script( 'quest-customizer', 'questCustomizerFontsL10n', quest_get_all_fonts() );

			wp_enqueue_style( 'chosen', get_template_directory_uri() . '/assets/plugins/chosen/chosen.min.css' );
		}

		public function EnqueueFonts() {

			$fonts = array(
				'typography_global_font_family'         => quest_get_mod( 'typography_global_font_family' ),
				'typography_global_font_variant'        => quest_get_mod( 'typography_global_font_variant' ),
				'typography_heading_h1_font_family'     => quest_get_mod( 'typography_heading_h1_font_family' ),
				'typography_heading_h1_font_variant'    => quest_get_mod( 'typography_heading_h1_font_variant' ),
				'typography_heading_h2_font_family'     => quest_get_mod( 'typography_heading_h2_font_family' ),
				'typography_heading_h2_font_variant'    => quest_get_mod( 'typography_heading_h2_font_variant' ),
				'typography_heading_h3_font_family'     => quest_get_mod( 'typography_heading_h3_font_family' ),
				'typography_heading_h3_font_variant'    => quest_get_mod( 'typography_heading_h3_font_variant' ),
				'typography_heading_h4_font_family'     => quest_get_mod( 'typography_heading_h4_font_family' ),
				'typography_heading_h4_font_variant'    => quest_get_mod( 'typography_heading_h4_font_variant' ),
				'typography_heading_h5_font_family'     => quest_get_mod( 'typography_heading_h5_font_family' ),
				'typography_heading_h5_font_variant'    => quest_get_mod( 'typography_heading_h5_font_variant' ),
				'typography_heading_h6_font_family'     => quest_get_mod( 'typography_heading_h6_font_family' ),
				'typography_heading_h6_font_variant'    => quest_get_mod( 'typography_heading_h6_font_variant' ),
				'typography_menu_font_family'           => quest_get_mod( 'typography_menu_font_family' ),
				'typography_menu_font_variant'          => quest_get_mod( 'typography_menu_font_variant' ),
				'typography_menu_sub_font_family'       => quest_get_mod( 'typography_menu_sub_font_family' ),
				'typography_menu_sub_font_variant'      => quest_get_mod( 'typography_menu_sub_font_variant' ),
				'typography_site_title_font_family'     => quest_get_mod( 'typography_site_title_font_family' ),
				'typography_site_title_font_variant'    => quest_get_mod( 'typography_site_title_font_variant' ),
				'typography_site_tagline_font_family'   => quest_get_mod( 'typography_site_tagline_font_family' ),
				'typography_site_tagline_font_variant'  => quest_get_mod( 'typography_site_tagline_font_variant' ),
				'typography_sidebar_title_font_family'  => quest_get_mod( 'typography_sidebar_title_font_family' ),
				'typography_sidebar_title_font_variant' => quest_get_mod( 'typography_sidebar_title_font_variant' ),
				'typography_sidebar_body_font_family'   => quest_get_mod( 'typography_sidebar_body_font_family' ),
				'typography_sidebar_body_font_variant'  => quest_get_mod( 'typography_sidebar_body_font_variant' ),
				'typography_footer_title_font_family'   => quest_get_mod( 'typography_footer_title_font_family' ),
				'typography_footer_title_font_variant'  => quest_get_mod( 'typography_footer_title_font_variant' ),
				'typography_footer_body_font_family'    => quest_get_mod( 'typography_footer_body_font_family' ),
				'typography_footer_body_font_variant'   => quest_get_mod( 'typography_footer_body_font_variant' ),
				'typography_footer_text_font_family'    => quest_get_mod( 'typography_footer_text_font_family' ),
				'typography_footer_text_font_variant'   => quest_get_mod( 'typography_footer_text_font_variant' )
			);

			$used_fonts = array();
			$defaults   = array_keys( quest_get_standard_fonts() );

			foreach ( $fonts as $key => $value ) {
				if ( quest_string_ends_with( $key, '_family' ) && trim( $value ) !== "" && ! in_array( $value, $defaults ) ) {
					$variant              = quest_get_default_mod( str_replace( '_family', '_variant', $key ), $fonts );
					$used_fonts[ $value ] = array_key_exists( $value, $used_fonts ) ? ( strpos( $used_fonts[ $value ], $variant ) !== false ) ? $used_fonts[ $value ] : "$used_fonts[$value],$variant" : "$value:$variant";
				}
			}

			$protocol = is_ssl() ? 'https' : 'http';

			$query_args = array(
				'family' => str_replace( " ", "+", implode( '|', array_values( $used_fonts ) ) ),
				'subset' => implode( ',', quest_get_mod( 'typography_options_subsets' ) )
			);

			wp_enqueue_style( 'google-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );

		}

		public static function PrintCss() {
			global $post;
			$is_pagebuilder = false;
			if ( null !== $post && get_page_template_slug( $post->ID ) === 'page-builder.php' ) {
				$is_pagebuilder = true;
			}

			$accent_color       = quest_get_mod( 'colors_global_accent' );
			$accent_shade_color = quest_get_mod( 'colors_global_accent_shade' );
			$border_color       = quest_get_mod( 'colors_global_border' );

			$title_text = quest_get_mod( 'colors_title_text' );

			$footer_text = quest_get_mod( 'colors_footer_text' );
			?>
			/* Theme/Text Colors */
			.entry-content blockquote,.action-icon.normal,.action, .pagination>.active>a, .pagination .current, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus, .main-navigation .nav > li.current-menu-item, .main-navigation .nav > li.current-menu-parent { border-color: <?php
			echo $accent_color; ?> ; }
			.button, input[type="submit"],#submit,.wpcf7-submit,.action-icon.normal:after,.action-icon.normal:hover,.social-icon-container .social-icon:hover,.main-footer a.tag:hover,.pagination .current,.pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus, .quest-gallery .quest-gallery-thumb .fa, .sticky-post-label,.cd-top  { background-color: <?php
			echo $accent_color; ?> ; }
			span a, p a,a,a.tag,.pagination a,.action-icon.normal, .pagination>li>a, .pagination>li>span, .main-navigation .nav > li.current-menu-item > a, .main-navigation .nav > li.current-menu-parent > a { color: <?php
			echo $accent_color; ?> ; }
			span a:hover,h1 a:hover,h2 a:hover,h3 a:hover,h4 a:hover,h5 a:hover,h6 a:hover,p a:hover,a:hover,a.tag:hover,.pagination a,.pagination.post-pagination a:hover,.action-icon.normal, .pagination>li>a:hover, .pagination>li>span:hover, .pagination>li>a:focus, .pagination>li>span:focus { color: <?php
			echo $accent_shade_color; ?> ; }
			.button:hover, input[type="submit"]:hover, input[type="submit"]:active, #submit:hover, .wpcf7-submit:hover, #submit:active, .wpcf7-submit:active, .button-:active  { -webkit-box-shadow: 0 0 5px <?php
			echo $accent_shade_color; ?>; box-shadow: 0 0 5px <?php
			echo $accent_shade_color; ?>; background: <?php
			echo $accent_shade_color; ?> ; }

			#content textarea, .wpcf7 textarea, #content select, .wpcf7 select, #content input[type="text"], .wpcf7 input[type="text"], #content input[type="password"], .wpcf7 input[type="password"], #content input[type="datetime"], .wpcf7 input[type="datetime"], #content input[type="datetime-local"], .wpcf7 input[type="datetime-local"], #content input[type="date"], .wpcf7 input[type="date"], #content input[type="month"], .wpcf7 input[type="month"], #content input[type="time"], .wpcf7 input[type="time"], #content input[type="week"], .wpcf7 input[type="week"], #content input[type="number"], .wpcf7 input[type="number"], #content input[type="email"], .wpcf7 input[type="email"], #content input[type="url"], .wpcf7 input[type="url"], #content input[type="search"], .wpcf7 input[type="search"], #content input[type="tel"], .wpcf7 input[type="tel"], #content input[type="color"], .wpcf7 input[type="color"], .entry-content blockquote, .action, a .action-icon, .action-icon, .post-grid, .recent-post, #comments .post-comments-form textarea, #comments .post-comments-form input[type=text], #comments #post-comments-form textarea, #comments #post-comments-form input[type=text], #content article.error404 .search input, #menu-item-search form input, .main-sidebar .search input {  background-color: <?php
			echo quest_get_mod( 'colors_global_alt' ); ?> ;  }
			#content textarea, .wpcf7 textarea, #content select, .wpcf7 select, #content input[type="text"], .wpcf7 input[type="text"], #content input[type="password"], .wpcf7 input[type="password"], #content input[type="datetime"], .wpcf7 input[type="datetime"], #content input[type="datetime-local"], .wpcf7 input[type="datetime-local"], #content input[type="date"], .wpcf7 input[type="date"], #content input[type="month"], .wpcf7 input[type="month"], #content input[type="time"], .wpcf7 input[type="time"], #content input[type="week"], .wpcf7 input[type="week"], #content input[type="number"], .wpcf7 input[type="number"], #content input[type="email"], .wpcf7 input[type="email"], #content input[type="url"], .wpcf7 input[type="url"], #content input[type="search"], .wpcf7 input[type="search"], #content input[type="tel"], .wpcf7 input[type="tel"], #content input[type="color"], .wpcf7 input[type="color"],article.post-normal .post-image-dummy, article.page .post-image-dummy, .post .post-image-dummy, .post-half .post-image-dummy,.post-grid, .recent-post,#comments .post-comments-form textarea, #comments .post-comments-form input[type=text], #comments #post-comments-form textarea, #comments #post-comments-form input[type=text],.entry-content table,h2.section-head,article.post-normal,hr.fancy,#content article.error404 .search input,.main-header,.main-header.mobile .main-navigation .nav li:hover a,.main-header.mobile .main-navigation .nav a,.main-header.mobile .main-navigation .navbar-collapse.collapse,.main-navigation ul > li ul,#menu-item-search .dropdown-menu,#title-container,.post-image .empty-image,.pagination.post-pagination,#comments #reply-title,#comments li,#comments li li,#comments .post-comments-heading h3,#about-author,.main-sidebar .widget_nav_menu li,.main-sidebar .widget_nav_menu li ul.children,.main-sidebar .widget_categories li,.main-sidebar .widget_archive li,.main-sidebar .widget_archive li ul.children,.main-sidebar .widget_pages li,.main-sidebar .widget_pages li ul.children,.main-sidebar .widget_meta li,.main-sidebar .widget_meta li ul.children,.main-sidebar .widget_recent_comments li,.main-sidebar .widget_recent_comments li ul.children,.main-sidebar .widget_rss li,.main-sidebar .widget_rss li ul.children,.main-sidebar .widget_recent_entries li,.main-sidebar .widget_recent_entries li ul.children,.portfolio-grid-alt-bg,.pagination.post-pagination .previous,.gallery-container .gallery-item, #menu-item-search form input{  border-color: <?php
			echo $border_color; ?> ;}
			#menu-item-search form .arrow-up:before { border-bottom-color: <?php
			echo $border_color;; ?> }
			.fancy{ background-image: linear-gradient(left, white, <?php
			echo $border_color; ?> , white); }
			@media (max-width: 767px) { .main-navigation .nav{    border-color: <?php
			echo $accent_color; ?> ;  }}

			h1,h2,h3,h4,h5,h6, h1 a,h2 a,h3 a,h4 a,h5 a,h6 a, .pagination.post-pagination a { color: <?php
			echo quest_get_mod( 'colors_global_heading' ); ?> ; }
			body {color: <?php
			echo quest_get_mod( 'colors_global_text' ); ?> ; }
			.post-categories:before, .post-tags:before, article.post-normal .entry-meta, article.page .entry-meta, .post .entry-meta, .post-half .entry-meta, .post-date, .main-sidebar .widget_nav_menu li:before, .main-sidebar .widget_categories li:before, .main-sidebar .widget_archive li:before, .main-sidebar .widget_pages li:before, .main-sidebar .widget_meta li:before, .main-sidebar .widget_recent_comments li:before, .main-sidebar .widget_rss li:before, .main-sidebar .widget_recent_entries li:before, .comment-meta .fa { color: <?php
			echo quest_get_mod( 'colors_global_text_alt' ); ?> ; }

			.boxed { background-color: <?php
			echo quest_get_mod( 'colors_global_site_bg' ); ?> ; }
			#content { background-color: <?php
			echo quest_get_mod( 'colors_global_content_bg' ); ?> ; }

			.main-header{ background-color: <?php
			echo quest_get_mod( 'colors_header_bg' ); ?> ; border-color: <?php
			echo quest_get_mod( 'colors_header_border' ); ?> ; }
			.main-header, .main-header a{ color: <?php
			echo quest_get_mod( 'colors_header_text' ); ?> ; }
			.secondary-header{
			color: <?php echo quest_get_mod( 'colors_header2_text' ) ?>;
			background-color: <?php echo quest_get_mod( 'colors_header2_bg' ) ?>;
			border-top-color: <?php echo quest_get_mod( 'colors_header2_border_top' ) ?>;
			border-bottom-color: <?php echo quest_get_mod( 'colors_header2_border_bottom' ) ?>;
			}
			.secondary-header .social-icon-container .social-icon { color: <?php
			echo quest_get_mod( 'colors_header2_sc_si' ) ?>; }
			.secondary-header .social-icon-container .social-icon:hover { color: <?php
			echo quest_get_mod( 'colors_header2_sc_si_hover' ); ?>; background-color: <?php
			echo quest_get_mod( 'colors_header2_sc_si_hover_bg' ); ?>;}
			.main-navigation .nav > li > a, .main-navigation .navbar-toggle { color: <?php
			echo quest_get_mod( 'colors_menu_text' ); ?> ; }
			.main-navigation .nav > li:hover > a { color: <?php
			echo quest_get_mod( 'colors_menu_hover' ); ?> ; }
			.main-navigation .nav .dropdown-menu a { color: <?php
			echo quest_get_mod( 'colors_menu_sub_text' ); ?> ; }
			.main-navigation .nav .dropdown-menu li:hover > a { color: <?php
			echo quest_get_mod( 'colors_menu_sub_hover' ); ?> ; }
			.main-navigation .nav .dropdown-menu { border-color: <?php
			echo quest_get_mod( 'colors_menu_sub_border' ); ?>  ; background-color: <?php
			echo quest_get_mod( 'colors_menu_sub_bg' ); ?> ; }
			.main-navigation .nav .dropdown-menu li:hover > a, .main-navigation .nav .dropdown-menu li:focus > a, .main-navigation .nav .dropdown-menu li.current-menu-item a, .main-navigation .nav .dropdown-menu li.current-menu-ancestor > a { background-color: <?php
			echo quest_get_mod( 'colors_menu_sub_hover_bg' ); ?> ; color: <?php
			echo quest_get_mod( 'colors_menu_sub_hover' ); ?> ; }

			@media (max-width: 767px) {
			.main-header .main-navigation .navbar-collapse{
			background-color: <?php echo quest_get_mod( 'colors_menu_mob_bg' ); ?> !important;
			}
			.main-header .main-navigation .nav li a {
			color: <?php echo quest_get_mod( 'colors_menu_mob' ); ?> !important;
			}
			.main-header .main-navigation .nav li a:hover, .main-navigation .nav .dropdown-menu li:hover > a, .main-navigation .nav .dropdown-menu li:focus > a, .main-navigation .nav .dropdown-menu li.current-menu-item a, .main-navigation .nav .dropdown-menu li.current-menu-ancestor > a {
			color: <?php echo quest_get_mod( 'colors_menu_mob_hover' ); ?> !important;
			background-color: transparent !important;
			}
			.main-navigation .nav > li.current-menu-item, .main-navigation .nav > li.current-menu-parent{
			border-color: transparent !important;
			}
			.main-navigation .nav .dropdown-menu{
			background-color: transparent !important;
			}
			}


			#title-container { background-color: <?php
			echo quest_get_mod( 'colors_title_bg' ); ?> ; color: <?php
			echo $title_text; ?> ; border-color: <?php
			echo quest_get_mod( 'colors_title_border' ); ?> ; }
			#title-container h3 { color: <?php
			echo $title_text; ?> ; }

			.main-footer{ background-color: <?php
			echo quest_get_mod( 'colors_footer_bg' ); ?> ; color: <?php
			echo $footer_text; ?> ; }
			.main-footer h1 { color: <?php
			echo quest_get_mod( 'colors_footer_heading' ); ?> ;}
			.main-footer p, .main-footer li { color: <?php
			echo $footer_text; ?> ; }
			.main-footer, .main-footer li, .main-footer li:last-child { border-color: <?php
			echo quest_get_mod( 'colors_footer_border' ); ?> ; }
			.copyright{ background-color: <?php
			echo quest_get_mod( 'colors_footer_sc_bg' ); ?> ; color: <?php
			echo quest_get_mod( 'colors_footer_sc_text' ); ?> ; }
			.copyright .social-icon-container .social-icon { color: <?php
			echo quest_get_mod( 'colors_footer_sc_si' ) ?>; }
			.copyright .social-icon-container .social-icon:hover { color: <?php
			echo quest_get_mod( 'colors_footer_sc_si_hover' ); ?>; background-color: <?php
			echo quest_get_mod( 'colors_footer_sc_si_hover_bg' ); ?>;}


			/* Typography */
			body, .tooltip { <?php
			quest_font_settings( 'typography_global' ) ?> }
			h1 { <?php
			quest_font_settings( 'typography_heading_h1' ) ?> }
			h2 {  <?php
			quest_font_settings( 'typography_heading_h2' ) ?> }
			h3 { <?php
			quest_font_settings( 'typography_heading_h3' ) ?> }
			h4 {  <?php
			quest_font_settings( 'typography_heading_h4' ) ?> }
			h5 { <?php
			quest_font_settings( 'typography_heading_h5' ) ?> }
			h6 {  <?php
			quest_font_settings( 'typography_heading_h6' ) ?> }
			.main-navigation .nav > li > a  {  <?php
			quest_font_settings( 'typography_menu' ) ?> }
			.main-navigation .nav .dropdown-menu li a {  <?php
			quest_font_settings( 'typography_menu_sub' ) ?> }
			.site-title { <?php
			quest_font_settings( 'typography_site_title' ) ?> }
			.site-description { <?php
			quest_font_settings( 'typography_site_tagline' ) ?> }
			#title-container ul li{ line-height: <?php
			echo quest_get_mod( 'typography_heading_h3_font_size' ) * quest_get_mod( 'typography_heading_h3_line_height' ) ?>px; }
			.main-sidebar .sidebar-widget { <?php
			quest_font_settings( 'typography_sidebar_body' ) ?> }
			.main-sidebar .sidebar-widget .widget-title { <?php
			quest_font_settings( 'typography_sidebar_title' ) ?> }
			.main-sidebar { <?php
			quest_font_settings( 'typography_footer_body' ) ?> }
			.main-footer h1, .main-footer h2, .main-footer h3 { <?php
			quest_font_settings( 'typography_footer_title' ) ?> }
			.copyright { <?php
			quest_font_settings( 'typography_footer_text' ) ?> }

			/* Background Images */
			<?php
			$site_bg  = esc_url( quest_get_mod( 'bgimages_global_site' ) );
			$title_bg = esc_url( quest_get_mod( 'bgimages_global_title_container' ) );
			if ( $site_bg !== '' ): ?>
				.boxed{ background-image: url(<?php
				echo $site_bg; ?>); }
			<?php
			endif; ?>

			<?php
			if ( $title_bg !== '' ): ?>
				#title-container{ background-image: url(<?php
				echo $title_bg; ?>); }
			<?php
			endif;


			$single_post_align = quest_get_mod( 'layout_post_content_align' );

			if ( $single_post_align === 'center' ) : ?>

				.single-post .post-normal,.single-post .post-normal h1,.single-post .post-normal h2,.single-post .post-normal h3,.single-post .post-normal h4,.single-post .post-normal h5,.single-post .post-normal h6{
				text-align: center;
				}
				.single-post .post-normal .post-image{
				margin-left: auto;
				margin-right: auto;
				}
				.single-post .post-normal #about-author .avatar{
				float: none;
				}
			<?php elseif ( $single_post_align === 'right' ) : ?>

				.single-post .post-normal,.single-post .post-normal h1,.single-post .post-normal h2,.single-post .post-normal h3,.single-post .post-normal h4,.single-post .post-normal h5,.single-post .post-normal h6{
				text-align: right;
				}

				.single-post .post-normal .entry-header:after{
				content: "";
				display: table;
				clear: both;
				}
				.single-post .post-normal .entry-header > *{
				float: right;
				clear: both;
				}
				.single-post .post-normal #about-author .avatar{
				float: right;
				}
				.single-post .post-normal #about-author  .author-content{
				margin-left: 0;
				margin-right: 85px;
				}
			<?php
			endif;

			$single_page_align = quest_get_mod( 'layout_page_content_align' );
			if ( ! $is_pagebuilder && $single_page_align === 'center' ) : ?>

				.page .type-page,.page .type-page h1,.page .type-page h2,.page .type-page h3,.page .type-page h4,.page .type-page h5,.page .type-page h6{
				text-align: center;
				}
				.page .type-page .post-image{
				margin-left: auto;
				margin-right: auto;
				}

			<?php elseif ( ! $is_pagebuilder && $single_page_align === 'right' ) : ?>

				.page .type-page,.page .type-page h1,.page .type-page h2,.page .type-page h3,.page .type-page h4,.page .type-page h5,.page .type-page h6{
				text-align: right;
				}

				.page .type-page .entry-header:after{
				content: "";
				display: table;
				clear: both;
				}
				.page .type-page .entry-header > *{
				float: right;
				clear: both;
				}

			<?php
			endif;
		}
	}
endif;

Quest_Customize::getInstance();
