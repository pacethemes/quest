<?php

require_once dirname( __FILE__ ) . "/../custom-controls/google-fonts-control.php";

/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since Trivoo 1.0
 */
class Trivoo_Customize_Typography {

  public static function register( $wp_customize ) {

    $wp_customize->remove_section( 'colors' );

    $panel_id = 'typography';

    $wp_customize->add_panel( $panel_id , array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Typography',
        'description'    => '',
      ) );

    /******************
    // Global Section
    *******************/

    $section_id = 'typography_global';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Global', 'Trivoo' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    /* Global */
    trivoo_generate_font_control ( $wp_customize, $section_id ,  __( 'Text', 'Trivoo' ), '', true ) ;


    /******************
    // Headings Section
    *******************/

    $section_id = 'typography_heading';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Text Headings', 'Trivoo' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    /* H1 */
    trivoo_generate_font_control ( $wp_customize, $section_id,  __( 'H1', 'Trivoo' ), 'h1' ) ;

    /* H2 */
    trivoo_generate_font_control ( $wp_customize, $section_id,  __( 'H2', 'Trivoo' ), 'h2' ) ;

    /* H3 */
    trivoo_generate_font_control ( $wp_customize, $section_id,  __( 'H3', 'Trivoo' ), 'h3' ) ;

    /* H4 */
    trivoo_generate_font_control ( $wp_customize, $section_id,  __( 'H4', 'Trivoo' ), 'h4' ) ;

    /* H5 */
    trivoo_generate_font_control ( $wp_customize, $section_id,  __( 'H5', 'Trivoo' ), 'h5' ) ;

    /* H6 */
    trivoo_generate_font_control ( $wp_customize, $section_id,  __( 'H6', 'Trivoo' ), 'h6' ) ;


    /******************
    // Main Menu Section
    *******************/

    $section_id = 'typography_menu';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Main Menu', 'Trivoo' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    /* Menu Items */
    trivoo_generate_font_control ( $wp_customize, $section_id  ,  __( 'Menu Items', 'Trivoo' ), '', true, array( 'line_height' ) ) ;


    /* Sub Menu Items */
    trivoo_generate_font_control ( $wp_customize, $section_id  ,  __( 'Sub Menu Items', 'Trivoo' ), 'sub' ) ;


    /******************************
    // Site Title & Tagline Section
    *******************************/

    $section_id = 'typography_site';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Site Title & Tagline', 'Trivoo' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    /* Site Title */
    trivoo_generate_font_control ( $wp_customize, $section_id  ,  __( 'Site Title', 'Trivoo' ), 'title' ) ;

    /* Site Tagline */
    trivoo_generate_font_control ( $wp_customize, $section_id  ,  __( 'Site Tagline', 'Trivoo' ), 'tagline' ) ;


    /******************************
    // Sidebar
    *******************************/

    $section_id = 'typography_sidebar';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Sidebar', 'Trivoo' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    /* Site Title */
    trivoo_generate_font_control ( $wp_customize, $section_id  ,  __( 'Widget Title', 'Trivoo' ), 'title' ) ;

    /* Site Tagline */
    trivoo_generate_font_control ( $wp_customize, $section_id  ,  __( 'Widget Body', 'Trivoo' ), 'body' ) ;


    /******************************
    // Footer
    *******************************/

    $section_id = 'typography_footer';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Footer', 'Trivoo' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    /* Widget Title */
    trivoo_generate_font_control ( $wp_customize, $section_id  ,  __( 'Widget Title', 'Trivoo' ), 'title' ) ;

    /* Widget Body */
    trivoo_generate_font_control ( $wp_customize, $section_id  ,  __( 'Widget Body', 'Trivoo' ), 'body' ) ;

    /* Secondary Footer */
    trivoo_generate_font_control ( $wp_customize, $section_id  ,  __( 'Footer Text', 'Trivoo' ), 'text' ) ;


  }
}

?>
