<?php
require 'custom-controls/google-fonts.php';
require 'controls.php';
require "defaults.php";
require "helpers.php";
require 'panels/general.php';
require 'panels/layout.php';
require 'panels/background-images.php';
require 'panels/colors.php';
require 'panels/typography.php';

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
    Trivoo_Customize_Background_Images::register ( $wp_customize );
    Trivoo_Customize_Colors::register ( $wp_customize );
    Trivoo_Customize_Typography::register ( $wp_customize );

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
    // wp_enqueue_script(
    //   'mytheme-themecustomizer', // Give the script a unique ID
    //   get_template_directory_uri() . '/assets/js/theme-customizer.js', // Define the path to the JS file
    //   array(  'jquery', 'customize-preview' ), // Define dependencies
    //   '', // Define a version (optional)
    //   true // Specify whether to put in footer (leave this true)
    // );

    wp_enqueue_script( 'trivoo-customizer-preview', get_template_directory_uri() . '/assets/js/customizer-preview.js', array(  'jquery' ), '', true );
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

    $accent_color = trivoo_get_default_mods( 'colors_global_accent', $colors );
    $accent_shade_color = trivoo_get_default_mods( 'colors_global_accent_shade', $colors );
    $alt_color = trivoo_get_default_mods( 'colors_global_alt', $colors );
    $border_color =  trivoo_get_default_mods( 'colors_global_border', $colors );
    $heading_color =  trivoo_get_default_mods( 'colors_global_heading', $colors );
    $text_color =  trivoo_get_default_mods( 'colors_global_text', $colors );
    $text_alt_color =  trivoo_get_default_mods( 'colors_global_text_alt', $colors );
    $site_bg_color = trivoo_get_default_mods( 'colors_global_site_bg', $colors );
    $content_bg_color = trivoo_get_default_mods( 'colors_global_content_bg', $colors );

    $head_bg = trivoo_get_default_mods( 'colors_header_bg', $colors );
    $head_text = trivoo_get_default_mods( 'colors_header_text', $colors );
    $head_border = trivoo_get_default_mods( 'colors_header_border', $colors );

    $menu_text = trivoo_get_default_mods( 'colors_menu_text', $colors );
    $menu_hover = trivoo_get_default_mods( 'colors_menu_hover', $colors );

    $menu_sub_text = trivoo_get_default_mods( 'colors_menu_sub_text', $colors );
    $menu_sub_hover = trivoo_get_default_mods( 'colors_menu_sub_hover', $colors );
    $menu_sub_hover_bg = trivoo_get_default_mods( 'colors_menu_sub_hover_bg', $colors );
    $menu_sub_bg = trivoo_get_default_mods( 'colors_menu_sub_bg', $colors );
    $menu_sub_border = trivoo_get_default_mods( 'colors_menu_sub_border', $colors );

    $title_bg = trivoo_get_default_mods( 'colors_title_bg', $colors );
    $title_text = trivoo_get_default_mods( 'colors_title_text', $colors );
    $title_border = trivoo_get_default_mods( 'colors_title_border', $colors );

    $footer_bg = trivoo_get_default_mods( 'colors_footer_bg', $colors );
    $footer_heading = trivoo_get_default_mods( 'colors_footer_heading', $colors );
    $footer_text = trivoo_get_default_mods( 'colors_footer_text', $colors );
    $footer_border = trivoo_get_default_mods( 'colors_footer_border', $colors );

    $footer_sc_bg = trivoo_get_default_mods( 'colors_footer_sc_bg', $colors );
    $footer_sc_text = trivoo_get_default_mods( 'colors_footer_sc_text', $colors );

    $footer_sc_si = trivoo_get_default_mods( 'colors_footer_sc_si', $colors );
    $footer_sc_si_hover = trivoo_get_default_mods( 'colors_footer_sc_si_hover', $colors );
    $footer_sc_si_hover_bg = trivoo_get_default_mods( 'colors_footer_sc_si_hover_bg', $colors );


    $return = <<<EOT

    /* Theme/Text Colors */
    .post-content blockquote,.action-icon.normal,.action, .pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus { border-color: $accent_color ; }
    .button,#submit,.wpcf7-submit,.action-icon.normal:after,.action-icon.normal:hover,.social-icon-container .social-icon:hover,.main-footer a.tag:hover,.pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus { background-color: $accent_color ; }
    span a, p a,a,a.tag,.post-content strong,.pagination a,.action-icon.normal, .pagination>li>a, .pagination>li>span { color: $accent_color ; }
    span a:hover,h1 a:hover,h2 a:hover,h3 a:hover,h4 a:hover,h5 a:hover,h6 a:hover,p a:hover,a:hover,a.tag:hover,.post-content strong,.pagination a,.pagination.post-pagination a:hover,.action-icon.normal, .pagination>li>a:hover, .pagination>li>span:hover, .pagination>li>a:focus, .pagination>li>span:focus { color: $accent_shade_color ; }
    .button:hover, #submit:hover, .wpcf7-submit:hover, #submit:active, .wpcf7-submit:active, .button-:active  { -webkit-box-shadow: 0 0 5px $accent_shade_color; box-shadow: 0 0 5px $accent_shade_color; background: $accent_shade_color; }

    #content textarea, #content select, #content input[type="text"], #content input[type="password"], #content input[type="datetime"], #content input[type="datetime-local"], #content input[type="date"], #content input[type="month"], #content input[type="time"], #content input[type="week"], #content input[type="number"], #content input[type="email"], #content input[type="url"], #content input[type="search"], #content input[type="tel"], #content input[type="color"], .post-content blockquote, .action, a .action-icon, .action-icon, .post-grid, .recent-post, #comments .post-comments-form textarea, #comments .post-comments-form input[type=text], #comments #post-comments-form textarea, #comments #post-comments-form input[type=text], #content article.error404 .search input, #menu-item-search form input, .main-sidebar .search input {  background-color: $alt_color;  }

    #content textarea, #content select, #content input[type="text"], #content input[type="password"], #content input[type="datetime"], #content input[type="datetime-local"], #content input[type="date"], #content input[type="month"], #content input[type="time"], #content input[type="week"], #content input[type="number"], #content input[type="email"], #content input[type="url"], #content input[type="search"], #content input[type="tel"], #content input[type="color"],article.post-normal .post-image-dummy, article.page .post-image-dummy, .post .post-image-dummy, .post-half .post-image-dummy,.post-grid, .recent-post,#comments .post-comments-form textarea, #comments .post-comments-form input[type=text], #comments #post-comments-form textarea, #comments #post-comments-form input[type=text],.post-content table,h2.section-head,article.post-normal,hr.fancy,#content article.error404 .search input,.main-header,.main-header.mobile .main-navigation .nav li:hover a,.main-header.mobile .main-navigation .nav a,.main-header.mobile .main-navigation .navbar-collapse.collapse,.main-navigation .navbar-toggle,.main-navigation ul > li ul,#menu-item-search .dropdown-menu,#title-container,.post-image .empty-image,.pagination.post-pagination,#comments #reply-title,#comments li,#comments li li,#comments .post-comments-heading h3,#about-author,.main-sidebar .widget_nav_menu li,.main-sidebar .widget_nav_menu li ul.children,.main-sidebar .widget_categories li,.main-sidebar .widget_archive li,.main-sidebar .widget_archive li ul.children,.main-sidebar .widget_pages li,.main-sidebar .widget_pages li ul.children,.main-sidebar .widget_meta li,.main-sidebar .widget_meta li ul.children,.main-sidebar .widget_recent_comments li,.main-sidebar .widget_recent_comments li ul.children,.main-sidebar .widget_rss li,.main-sidebar .widget_rss li ul.children,.main-sidebar .widget_recent_entries li,.main-sidebar .widget_recent_entries li ul.children,.portfolio-grid-alt-bg,.pagination.post-pagination .previous,.gallery-container .gallery-item, #menu-item-search form input{  border-color: $border_color;}
    #menu-item-search form .arrow-up:before { border-bottom-color: $border_color;}
    .fancy{ background-image: linear-gradient(left, white, $border_color, white); }
    @media (max-width: 767px) { .main-navigation .nav{    border-color: $border_color;  }}

    h1,h2,h3,h4,h5,h6, h1 a,h2 a,h3 a,h4 a,h5 a,h6 a, .pagination.post-pagination a { color: $heading_color; }
    body {color: $text_color; }
    .post-categories:before, .post-tags:before, article.post-normal .post-meta, article.page .post-meta, .post .post-meta, .post-half .post-meta, .post-date, .main-sidebar .widget_nav_menu li:before, .main-sidebar .widget_categories li:before, .main-sidebar .widget_archive li:before, .main-sidebar .widget_pages li:before, .main-sidebar .widget_meta li:before, .main-sidebar .widget_recent_comments li:before, .main-sidebar .widget_rss li:before, .main-sidebar .widget_recent_entries li:before, .comment-meta .fa { color: $text_alt_color; }

    .boxed { background-color: $site_bg_color; }
    #content { background-color: $content_bg_color; }

    .main-header{ background-color: $head_bg ; border-color: $head_border; }
    .main-header, .main-header a{ color: $head_text ; }
    .main-navigation .nav > li > a { color: $menu_text ; }
    .main-navigation .nav > li:hover > a { color: $menu_hover ; }
    .main-navigation .nav .dropdown-menu a { color: $menu_sub_text ; }
    .main-navigation .nav .dropdown-menu li:hover > a { color: $menu_sub_hover ; }
    .main-navigation .nav .dropdown-menu { border-color: $menu_sub_border ; background-color: $menu_sub_bg ; }
    .main-navigation .nav .dropdown-menu li:hover > a, .main-navigation .nav .dropdown-menu li:focus > a, .main-navigation .nav .dropdown-menu li.current-menu-item a, .main-navigation .nav .dropdown-menu li.current-menu-ancestor > a { background-color: $menu_sub_hover_bg; color: $menu_sub_hover; }

    #title-container { background-color: $title_bg; color: $title_text; border-color: $title_border; }
    #title-container h3 { color: $title_text; }

    .main-footer{ background-color: $footer_bg ; color: $footer_text; }
    .main-footer h1 { color: $footer_heading;}
    .main-footer p, .main-footer li { color: $footer_text; }
    .main-footer, .main-footer li, .main-footer li:last-child { border-color: $footer_border; }
    .copyright{ background-color: $footer_sc_bg ; color: $footer_sc_text ; }
    .social-icon-container .social-icon { color: $footer_sc_si; }
    .social-icon-container .social-icon:hover { color: $footer_sc_si_hover; background-color: $footer_sc_si_hover_bg;}

EOT;

    echo $return;
?>

    /* Typography */
    body { <?php trivoo_font_settings( 'typography_global', $mods ) ?> }
    h1 { <?php trivoo_font_settings( 'typography_heading_h1', $mods ) ?> }
    h2 {  <?php trivoo_font_settings( 'typography_heading_h2', $mods ) ?> }
    h3 { <?php trivoo_font_settings( 'typography_heading_h3', $mods ) ?> }
    h4 {  <?php trivoo_font_settings( 'typography_heading_h4', $mods ) ?> }
    h5 { <?php trivoo_font_settings( 'typography_heading_h5', $mods ) ?> }
    h6 {  <?php trivoo_font_settings( 'typography_heading_h6', $mods ) ?> }
    .main-navigation .nav > li > a  {  <?php trivoo_font_settings( 'typography_menu', $mods ) ?> }
    .main-navigation .nav .dropdown-menu li a {  <?php trivoo_font_settings( 'typography_menu_sub', $mods ) ?> }
    .site-title { <?php trivoo_font_settings( 'typography_site_title', $mods ) ?> }
    .site-description { <?php trivoo_font_settings( 'typography_site_tagline', $mods ) ?> }
    #title-container ul li{ line-height: <?php echo trivoo_get_default_mods( 'typography_heading_h3_font_size', $mods ) * trivoo_get_default_mods( 'typography_heading_h3_line_height', $mods ) ?>px; }
    .main-sidebar .sidebar-widget { <?php trivoo_font_settings( 'typography_sidebar_body', $mods ) ?> }
    .main-sidebar .sidebar-widget .widget-title { <?php trivoo_font_settings( 'typography_sidebar_title', $mods ) ?> }
    .main-sidebar { <?php trivoo_font_settings( 'typography_footer_body', $mods ) ?> }
    .main-footer h1, .main-footer h2, .main-footer h3 { <?php trivoo_font_settings( 'typography_footer_title', $mods ) ?> }
    .copyright { <?php trivoo_font_settings( 'typography_footer_text', $mods ) ?> }
    <?php
    $site_bg = esc_url( trivoo_get_default_mods( 'bgimages_site', $mods ) );
    $title_bg = esc_url( trivoo_get_default_mods( 'bgimages_title_container', $mods ) );
    if ( $site_bg !== '' ) : ?>
    .boxed{ background-image: url(<?php echo $site_bg; ?>); }
    <?php endif; ?>

    <?php if ( $title_bg !== '' ) : ?>
    #title-container{ background-image: url(<?php echo $title_bg; ?>); }
    <?php endif; ?>

    <?php

  }
}

function get_color_mods( $mod ) {
  return 0 === strpos( $mod, 'colors_' );
}

function get_font_mods( $mod ) {
  return 0 === strpos( $mod, 'typography_' );
}

function stringEndsWith( $whole, $end ) {
  return strpos( $whole, $end, strlen( $whole ) - strlen( $end ) ) !== false;
}

function trivoo_font_settings( $section, $options ) {
?>
  font: <?php printf( "%spx '%s'",
    trivoo_get_default_mods( $section . '_font_size', $options ) ,
    trivoo_get_default_mods( $section . '_font_family', $options ) ) ?>;
            line-height: <?php echo trivoo_get_default_mods( $section . '_line_height', $options ) === false ? 'inherit' : trivoo_get_default_mods( $section . '_line_height', $options ) . 'em' ?>;
            font-weight: <?php $v = trivoo_get_default_mods( $section . '_font_variant', $options );
  echo $v === 'regular' ? 'normal' : preg_replace( '/[^0-9]/', '', $v ); ?>;
            font-style: <?php $v = trivoo_get_default_mods( $section . '_font_variant', $options );
  echo strpos( $v, 'italic' ) !== false ? 'italic' : 'normal'; ?>;
            text-transform: <?php echo trivoo_get_default_mods( $section . '_text_transform', $options ) ?> ;
            letter-spacing: <?php echo trivoo_get_default_mods( $section . '_letter_spacing', $options ) ?>px;
            word-spacing: <?php echo trivoo_get_default_mods( $section . '_word_spacing', $options ) ?>px;
  <?php
}


// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'Trivoo_Customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'Trivoo_Customize' , 'header_output' ) );

//enqueue required fonts
add_action( 'wp_enqueue_scripts', 'trivoo_enqueue_fonts' );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'Trivoo_Customize' , 'live_preview' ) );

add_action( 'customize_controls_enqueue_scripts', 'trivoo_customizer_scripts' );


function trivoo_customizer_scripts() {


  wp_enqueue_script( 'chosen', get_template_directory_uri() . '/assets/plugins/chosen/chosen.jquery.js', array( 'jquery', 'wp-color-picker' ), '', true );
  wp_enqueue_script( 'trivoo-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array(), '', true  );

  wp_localize_script( 'trivoo-customizer', 'trivooCustomizerFontsL10n', trivoo_get_all_fonts() );

  wp_enqueue_style( 'chosen', get_template_directory_uri() . '/assets/plugins/chosen/chosen.min.css' );

}


function trivoo_enqueue_fonts() {

  $mods = get_theme_mods();

  $fonts = array_intersect_key( $mods, array_flip( array_filter( array_keys( $mods ), "get_font_mods" ) ) );
  $used_fonts = array();

  foreach ( $fonts as $key => $value ) {
    if ( stringEndsWith( $key, '_family' ) ) {
      $variant = trivoo_get_default_mods( str_replace( '_family', '_variant', $key ) , $fonts );
      $used_fonts[$value] = array_key_exists( $value, $used_fonts )
        ? ( in_array( $variant , $used_fonts[$value] ) ) ? $used_fonts[$value] : array_merge( $used_fonts[$value], array( $variant ) )
        : array( $variant );
    }
  }

  $font_string = '';

  foreach ( $used_fonts as $font => $variants ) {
    $font_string .= "$font:" . implode( ',', $variants ) . "|" ;
  }

  $protocol = is_ssl() ? 'https' : 'http';
  wp_enqueue_style( 'google-fonts', "$protocol://fonts.googleapis.com/css?family=" . $font_string );
}

?>
