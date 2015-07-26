<?php
require 'custom-controls/google-fonts.php';
require 'custom-controls/text-area-control.php';
require 'controls.php';
require 'defaults.php';
require 'helpers.php';
require 'panels/general.php';
require 'panels/layout.php';
require 'panels/background-images.php';
require 'panels/colors.php';
require 'panels/typography.php';

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
			$sections = get_post_meta( $post->ID, 'pt_pb_sections', true );

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

						if ( $col['module']['type'] === 'hovericon' ) {
							$css .= self::BuildHoverIconCss( $col['module'] );
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
			$mods = quest_get_mods();

			$fonts      = array_intersect_key( $mods, array_flip( array_filter( array_keys( $mods ), 'quest_is_font_family' ) ) );
			$used_fonts = array();
			$defaults   = array_keys( quest_get_standard_fonts() );

			foreach ( $fonts as $key => $value ) {
				if ( quest_string_ends_with( $key, '_family' ) && trim( $value ) !== "" && ! in_array( $value, $defaults ) ) {
					$variant              = quest_get_default_mod( str_replace( '_family', '_variant', $key ), $fonts );
					$used_fonts[ $value ] = array_key_exists( $value, $used_fonts ) ? ( strpos( $used_fonts[ $value ], $variant ) !== false ) ? $used_fonts[ $value ] : "$used_fonts[$value],$variant" : "$value:$variant";
				}
			}

			$protocol = is_ssl() ? 'https' : 'http';
			wp_enqueue_style( 'google-fonts', "$protocol://fonts.googleapis.com/css?family=" . implode( '|', array_values( $used_fonts ) ), false, false );
		}

		public static function PrintCss() {

			$mods   = quest_get_mods();
			$colors = array_intersect_key( $mods, array_flip( array_filter( array_keys( $mods ), 'quest_get_color_mods' ) ) );

			$accent_color       = quest_get_default_mod( 'colors_global_accent', $colors );
			$accent_shade_color = quest_get_default_mod( 'colors_global_accent_shade', $colors );
			$border_color       = quest_get_default_mod( 'colors_global_border', $colors );

			$title_text = quest_get_default_mod( 'colors_title_text', $colors );

			$footer_text = quest_get_default_mod( 'colors_footer_text', $colors );
			?>

			/* Theme/Text Colors */
			.entry-content blockquote,.action-icon.normal,.action, .pagination>.active>a, .pagination .current, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus, .main-navigation .navbar-toggle, .main-navigation .nav > li.current-menu-item, .main-navigation .nav > li.current-menu-parent { border-color: <?php
			echo $accent_color; ?> ; }
			.button, input[type="submit"],#submit,.wpcf7-submit,.action-icon.normal:after,.action-icon.normal:hover,.social-icon-container .social-icon:hover,.main-footer a.tag:hover,.pagination .current,.pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus, .main-navigation .navbar-toggle,.quest-gallery .quest-gallery-thumb .fa, .sticky-post-label,.cd-top  { background-color: <?php
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
			echo quest_get_default_mod( 'colors_global_alt', $colors ); ?> ;  }
			#content textarea, .wpcf7 textarea, #content select, .wpcf7 select, #content input[type="text"], .wpcf7 input[type="text"], #content input[type="password"], .wpcf7 input[type="password"], #content input[type="datetime"], .wpcf7 input[type="datetime"], #content input[type="datetime-local"], .wpcf7 input[type="datetime-local"], #content input[type="date"], .wpcf7 input[type="date"], #content input[type="month"], .wpcf7 input[type="month"], #content input[type="time"], .wpcf7 input[type="time"], #content input[type="week"], .wpcf7 input[type="week"], #content input[type="number"], .wpcf7 input[type="number"], #content input[type="email"], .wpcf7 input[type="email"], #content input[type="url"], .wpcf7 input[type="url"], #content input[type="search"], .wpcf7 input[type="search"], #content input[type="tel"], .wpcf7 input[type="tel"], #content input[type="color"], .wpcf7 input[type="color"],article.post-normal .post-image-dummy, article.page .post-image-dummy, .post .post-image-dummy, .post-half .post-image-dummy,.post-grid, .recent-post,#comments .post-comments-form textarea, #comments .post-comments-form input[type=text], #comments #post-comments-form textarea, #comments #post-comments-form input[type=text],.entry-content table,h2.section-head,article.post-normal,hr.fancy,#content article.error404 .search input,.main-header,.main-header.mobile .main-navigation .nav li:hover a,.main-header.mobile .main-navigation .nav a,.main-header.mobile .main-navigation .navbar-collapse.collapse,.main-navigation ul > li ul,#menu-item-search .dropdown-menu,#title-container,.post-image .empty-image,.pagination.post-pagination,#comments #reply-title,#comments li,#comments li li,#comments .post-comments-heading h3,#about-author,.main-sidebar .widget_nav_menu li,.main-sidebar .widget_nav_menu li ul.children,.main-sidebar .widget_categories li,.main-sidebar .widget_archive li,.main-sidebar .widget_archive li ul.children,.main-sidebar .widget_pages li,.main-sidebar .widget_pages li ul.children,.main-sidebar .widget_meta li,.main-sidebar .widget_meta li ul.children,.main-sidebar .widget_recent_comments li,.main-sidebar .widget_recent_comments li ul.children,.main-sidebar .widget_rss li,.main-sidebar .widget_rss li ul.children,.main-sidebar .widget_recent_entries li,.main-sidebar .widget_recent_entries li ul.children,.portfolio-grid-alt-bg,.pagination.post-pagination .previous,.gallery-container .gallery-item, #menu-item-search form input{  border-color: <?php
			echo $border_color; ?> ;}
			#menu-item-search form .arrow-up:before { border-bottom-color: <?php
			echo $border_color;; ?> }
			.fancy{ background-image: linear-gradient(left, white, <?php
			echo $border_color; ?> , white); }
			@media (max-width: 767px) { .main-navigation .nav{    border-color: <?php
			echo $accent_color; ?> ;  }}

			h1,h2,h3,h4,h5,h6, h1 a,h2 a,h3 a,h4 a,h5 a,h6 a, .pagination.post-pagination a { color: <?php
			echo quest_get_default_mod( 'colors_global_heading', $colors ); ?> ; }
			body {color: <?php
			echo quest_get_default_mod( 'colors_global_text', $colors ); ?> ; }
			.post-categories:before, .post-tags:before, article.post-normal .entry-meta, article.page .entry-meta, .post .entry-meta, .post-half .entry-meta, .post-date, .main-sidebar .widget_nav_menu li:before, .main-sidebar .widget_categories li:before, .main-sidebar .widget_archive li:before, .main-sidebar .widget_pages li:before, .main-sidebar .widget_meta li:before, .main-sidebar .widget_recent_comments li:before, .main-sidebar .widget_rss li:before, .main-sidebar .widget_recent_entries li:before, .comment-meta .fa { color: <?php
			echo quest_get_default_mod( 'colors_global_text_alt', $colors ); ?> ; }

			.boxed { background-color: <?php
			echo quest_get_default_mod( 'colors_global_site_bg', $colors ); ?> ; }
			#content { background-color: <?php
			echo quest_get_default_mod( 'colors_global_content_bg', $colors ); ?> ; }

			.main-header{ background-color: <?php
			echo quest_get_default_mod( 'colors_header_bg', $colors ); ?> ; border-color: <?php
			echo quest_get_default_mod( 'colors_header_border', $colors ); ?> ; }
			.main-header, .main-header a{ color: <?php
			echo quest_get_default_mod( 'colors_header_text', $colors ); ?> ; }
			.secondary-header{
			color: <?php echo quest_get_default_mod( 'colors_header2_text', $colors ) ?>;
			background-color: <?php echo quest_get_default_mod( 'colors_header2_bg', $colors ) ?>;
			border-top-color: <?php echo quest_get_default_mod( 'colors_header2_border_top', $colors ) ?>;
			border-bottom-color: <?php echo quest_get_default_mod( 'colors_header2_border_bottom', $colors ) ?>;
			}
			.secondary-header .social-icon-container .social-icon { color: <?php
			echo quest_get_default_mod( 'colors_header2_sc_si', $colors ) ?>; }
			.secondary-header .social-icon-container .social-icon:hover { color: <?php
			echo quest_get_default_mod( 'colors_header2_sc_si_hover', $colors ); ?>; background-color: <?php
			echo quest_get_default_mod( 'colors_header2_sc_si_hover_bg', $colors ); ?>;}
			.main-navigation .nav > li > a { color: <?php
			echo quest_get_default_mod( 'colors_menu_text', $colors ); ?> ; }
			.main-navigation .nav > li:hover > a { color: <?php
			echo quest_get_default_mod( 'colors_menu_hover', $colors ); ?> ; }
			.main-navigation .nav .dropdown-menu a { color: <?php
			echo quest_get_default_mod( 'colors_menu_sub_text', $colors ); ?> ; }
			.main-navigation .nav .dropdown-menu li:hover > a { color: <?php
			echo quest_get_default_mod( 'colors_menu_sub_hover', $colors ); ?> ; }
			.main-navigation .nav .dropdown-menu { border-color: <?php
			echo quest_get_default_mod( 'colors_menu_sub_border', $colors ); ?>  ; background-color: <?php
			echo quest_get_default_mod( 'colors_menu_sub_bg', $colors ); ?> ; }
			.main-navigation .nav .dropdown-menu li:hover > a, .main-navigation .nav .dropdown-menu li:focus > a, .main-navigation .nav .dropdown-menu li.current-menu-item a, .main-navigation .nav .dropdown-menu li.current-menu-ancestor > a { background-color: <?php
			echo quest_get_default_mod( 'colors_menu_sub_hover_bg', $colors ); ?> ; color: <?php
			echo quest_get_default_mod( 'colors_menu_sub_hover', $colors ); ?> ; }

			#title-container { background-color: <?php
			echo quest_get_default_mod( 'colors_title_bg', $colors ); ?> ; color: <?php
			echo $title_text; ?> ; border-color: <?php
			echo quest_get_default_mod( 'colors_title_border', $colors ); ?> ; }
			#title-container h3 { color: <?php
			echo $title_text; ?> ; }

			.main-footer{ background-color: <?php
			echo quest_get_default_mod( 'colors_footer_bg', $colors ); ?> ; color: <?php
			echo $footer_text; ?> ; }
			.main-footer h1 { color: <?php
			echo quest_get_default_mod( 'colors_footer_heading', $colors ); ?> ;}
			.main-footer p, .main-footer li { color: <?php
			echo $footer_text; ?> ; }
			.main-footer, .main-footer li, .main-footer li:last-child { border-color: <?php
			echo quest_get_default_mod( 'colors_footer_border', $colors ); ?> ; }
			.copyright{ background-color: <?php
			echo quest_get_default_mod( 'colors_footer_sc_bg', $colors ); ?> ; color: <?php
			echo quest_get_default_mod( 'colors_footer_sc_text', $colors ); ?> ; }
			.copyright .social-icon-container .social-icon { color: <?php
			echo quest_get_default_mod( 'colors_footer_sc_si', $colors ) ?>; }
			.copyright .social-icon-container .social-icon:hover { color: <?php
			echo quest_get_default_mod( 'colors_footer_sc_si_hover', $colors ); ?>; background-color: <?php
			echo quest_get_default_mod( 'colors_footer_sc_si_hover_bg', $colors ); ?>;}


			/* Typography */
			body, .tooltip { <?php
			quest_font_settings( 'typography_global', $mods ) ?> }
			h1 { <?php
			quest_font_settings( 'typography_heading_h1', $mods ) ?> }
			h2 {  <?php
			quest_font_settings( 'typography_heading_h2', $mods ) ?> }
			h3 { <?php
			quest_font_settings( 'typography_heading_h3', $mods ) ?> }
			h4 {  <?php
			quest_font_settings( 'typography_heading_h4', $mods ) ?> }
			h5 { <?php
			quest_font_settings( 'typography_heading_h5', $mods ) ?> }
			h6 {  <?php
			quest_font_settings( 'typography_heading_h6', $mods ) ?> }
			.main-navigation .nav > li > a  {  <?php
			quest_font_settings( 'typography_menu', $mods ) ?> }
			.main-navigation .nav .dropdown-menu li a {  <?php
			quest_font_settings( 'typography_menu_sub', $mods ) ?> }
			.site-title { <?php
			quest_font_settings( 'typography_site_title', $mods ) ?> }
			.site-description { <?php
			quest_font_settings( 'typography_site_tagline', $mods ) ?> }
			#title-container ul li{ line-height: <?php
			echo quest_get_default_mod( 'typography_heading_h3_font_size', $mods ) * quest_get_default_mod( 'typography_heading_h3_line_height', $mods ) ?>px; }
			.main-sidebar .sidebar-widget { <?php
			quest_font_settings( 'typography_sidebar_body', $mods ) ?> }
			.main-sidebar .sidebar-widget .widget-title { <?php
			quest_font_settings( 'typography_sidebar_title', $mods ) ?> }
			.main-sidebar { <?php
			quest_font_settings( 'typography_footer_body', $mods ) ?> }
			.main-footer h1, .main-footer h2, .main-footer h3 { <?php
			quest_font_settings( 'typography_footer_title', $mods ) ?> }
			.copyright { <?php
			quest_font_settings( 'typography_footer_text', $mods ) ?> }
			<?php
			$site_bg  = esc_url( quest_get_default_mod( 'bgimages_global_site', $mods ) );
			$title_bg = esc_url( quest_get_default_mod( 'bgimages_global_title_container', $mods ) );
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
		}
	}
endif;

Quest_Customize::getInstance();
?>