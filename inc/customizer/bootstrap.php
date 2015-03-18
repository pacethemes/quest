<?php
require 'controls.php';
require "defaults.php";
require "helpers.php";
require 'panels/layout.php';
require 'panels/general.php';
require 'panels/colors.php';

/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since MyTheme 1.0
 */
class Trivoo_Customize {
  /**
   * This hooks into 'customize_register' (available as of WP 3.4) and allows
   * you to add new sections and controls to the Theme Customize screen.
   *
   * Note: To enable instant preview, we have to actually write a bit of custom
   * javascript. See live_preview() for more.
   *
   * @see add_action('customize_register',$func)
   * @param \WP_Customize_Manager $wp_customize
   * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
   * @since MyTheme 1.0
   */
  public static function register( $wp_customize ) {

    Trivoo_Customize_General::register ( $wp_customize );
    Trivoo_Customize_Layout::register ( $wp_customize );
    Trivoo_Customize_Colors::register ( $wp_customize );

    // //4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
    // $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    // $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    // $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    // $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
  }

  /**
   * This will output the custom WordPress settings to the live theme's WP head.
   *
   * Used by hook: 'wp_head'
   *
   * @see add_action('wp_head',$func)
   * @since MyTheme 1.0
   */
  public static function header_output() {
?>
      <!--Customizer CSS-->
      <style type="text/css">
           <?php self::build_css(); ?>
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
  public static function live_preview() {
    wp_enqueue_script(
      'mytheme-themecustomizer', // Give the script a unique ID
      get_template_directory_uri() . '/assets/js/theme-customizer.js', // Define the path to the JS file
      array(  'jquery', 'customize-preview' ), // Define dependencies
      '', // Define a version (optional)
      true // Specify whether to put in footer (leave this true)
    );
  }

  /**
   * This will generate a line of CSS for use in header output. If the setting
   * ($mod_name) has no defined value, the CSS will not be output.
   *
   * @uses get_theme_mod()
   * @param string  $selector CSS selector
   * @param string  $style    The name of the CSS *property* to modify
   * @param string  $mod_name The name of the 'theme_mod' option to fetch
   * @param string  $prefix   Optional. Anything that needs to be output before the CSS property
   * @param string  $postfix  Optional. Anything that needs to be output after the CSS property
   * @param bool    $echo     Optional. Whether to print directly to the page (default: true).
   * @return string Returns a single line of CSS with selectors and a property.
   * @since MyTheme 1.0
   */
  public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
    $return = '';
    $mod = get_theme_mod( $mod_name );
    if ( ! empty( $mod ) ) {
      $return = sprintf( '%s { %s:%s; }',
        $selector,
        $style,
        $prefix.$mod.$postfix
      );
      if ( $echo ) {
        echo $return;
      }
    }
    return $return;
  }


  public static function build_css() {
    $return = '';
    $mods = get_theme_mods();
    $colors = array_intersect_key( $mods, array_flip( array_filter( array_keys( $mods ), "get_color_mods" ) ) );
    
    $accent_color = trivoo_get_default_mods('colors_global_accent', $colors);
    $alt_color = trivoo_get_default_mods('colors_global_alt', $colors);
    $border_color =  trivoo_get_default_mods('colors_global_border', $colors);
    $site_bg_color = trivoo_get_default_mods('colors_global_site_bg', $colors);
    $content_bg_color = trivoo_get_default_mods('colors_global_content_bg', $colors);

    $return = <<<EOT
    
    .post-content blockquote,.action-icon.normal,.action { border-color: $accent_color ; }
    .button,#submit,.wpcf7-submit,.action-icon.normal:after,.action-icon.normal:hover,.social-icon-container .social-icon:hover,.main-footer a.tag:hover { background-color: $accent_color ; }
    span a:hover,h1 a:hover,h2 a:hover,h3 a:hover,h4 a:hover,h5 a:hover,h6 a:hover,p a:hover,a:hover,a.tag:hover,.post-content strong,.pagination a,.pagination.post-pagination a:hover,.action-icon.normal { color: $accent_color ; }
  
    #content textarea, #content select, #content input[type="text"], #content input[type="password"], #content input[type="datetime"], #content input[type="datetime-local"], #content input[type="date"], #content input[type="month"], #content input[type="time"], #content input[type="week"], #content input[type="number"], #content input[type="email"], #content input[type="url"], #content input[type="search"], #content input[type="tel"], #content input[type="color"], .post-content blockquote, .action, a .action-icon, .action-icon, .post-grid, .recent-post, #comments .post-comments-form textarea, #comments .post-comments-form input[type=text], #comments #post-comments-form textarea, #comments #post-comments-form input[type=text], #content article.error404 .search input, #menu-item-search form input, .main-sidebar .search input {  background-color: $alt_color;  }

    #content textarea, #content select, #content input[type="text"], #content input[type="password"], #content input[type="datetime"], #content input[type="datetime-local"], #content input[type="date"], #content input[type="month"], #content input[type="time"], #content input[type="week"], #content input[type="number"], #content input[type="email"], #content input[type="url"], #content input[type="search"], #content input[type="tel"], #content input[type="color"],article.post-normal .post-image-dummy, article.page .post-image-dummy, .post .post-image-dummy, .post-half .post-image-dummy,.post-grid, .recent-post,#comments .post-comments-form textarea, #comments .post-comments-form input[type=text], #comments #post-comments-form textarea, #comments #post-comments-form input[type=text],.post-content table,h2.section-head,article.post-normal,hr.fancy,#content article.error404 .search input,.main-header,.main-header.mobile .main-navigation .nav li:hover a,.main-header.mobile .main-navigation .nav a,.main-header.mobile .main-navigation .navbar-collapse.collapse,.main-navigation .navbar-toggle,.main-navigation ul > li ul,#menu-item-search .dropdown-menu,#title-container,.post-image .empty-image,.pagination.post-pagination,#comments #reply-title,#comments li,#comments li li,#comments .post-comments-heading h2,#about-author,.main-sidebar .widget_nav_menu li,.main-sidebar .widget_nav_menu li ul.children,.main-sidebar .widget_categories li,.main-sidebar .widget_archive li,.main-sidebar .widget_archive li ul.children,.main-sidebar .widget_pages li,.main-sidebar .widget_pages li ul.children,.main-sidebar .widget_meta li,.main-sidebar .widget_meta li ul.children,.main-sidebar .widget_recent_comments li,.main-sidebar .widget_recent_comments li ul.children,.main-sidebar .widget_rss li,.main-sidebar .widget_rss li ul.children,.main-sidebar .widget_recent_entries li,.main-sidebar .widget_recent_entries li ul.children,.portfolio-grid-alt-bg,.pagination.post-pagination .previous,.gallery-container .gallery-item{  border-color: $border_color;}
    #menu-item-search form .arrow-up:before { border-bottom-color: $border_color;} 
    .fancy{ background-image: linear-gradient(left, white, $border_color, white); }} 
    @media (max-width: 767px) { .main-navigation .nav{    border-color: $border_color;  }}

    .boxed { background-color: $site_bg_color; }
    #content { background-color: $content_bg_color; }

EOT;

    echo $return;
  }
}

function get_color_mods( $mod ) {
  return 0 === strpos( $mod, 'colors_' );
}


// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'Trivoo_Customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'Trivoo_Customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'Trivoo_Customize' , 'live_preview' ) );
