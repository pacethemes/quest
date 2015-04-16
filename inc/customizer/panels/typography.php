<?php

require_once dirname( __FILE__ ) . "/../custom-controls/google-fonts-control.php";

/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since Quest 1.0
 */
class Quest_Customize_Typography {

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
        'title' => __( 'Global', 'Quest' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    /* Global */
    quest_generate_font_control ( $wp_customize, $section_id ,  __( 'Text', 'Quest' ), '', true ) ;


    /******************
    // Headings Section
    *******************/

    $section_id = 'typography_heading';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Text Headings', 'Quest' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    /* H1 */
    quest_generate_font_control ( $wp_customize, $section_id,  __( 'H1', 'Quest' ), 'h1' ) ;

    /* H2 */
    quest_generate_font_control ( $wp_customize, $section_id,  __( 'H2', 'Quest' ), 'h2' ) ;

    /* H3 */
    quest_generate_font_control ( $wp_customize, $section_id,  __( 'H3', 'Quest' ), 'h3' ) ;

    /* H4 */
    quest_generate_font_control ( $wp_customize, $section_id,  __( 'H4', 'Quest' ), 'h4' ) ;

    /* H5 */
    quest_generate_font_control ( $wp_customize, $section_id,  __( 'H5', 'Quest' ), 'h5' ) ;

    /* H6 */
    quest_generate_font_control ( $wp_customize, $section_id,  __( 'H6', 'Quest' ), 'h6' ) ;


    /******************
    // Main Menu Section
    *******************/

    $section_id = 'typography_menu';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Main Menu', 'Quest' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    /* Menu Items */
    quest_generate_font_control ( $wp_customize, $section_id  ,  __( 'Menu Items', 'Quest' ), '', true, array( 'line_height' ) ) ;


    /* Sub Menu Items */
    quest_generate_font_control ( $wp_customize, $section_id  ,  __( 'Sub Menu Items', 'Quest' ), 'sub' ) ;


    /******************************
    // Site Title & Tagline Section
    *******************************/

    $section_id = 'typography_site';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Site Title & Tagline', 'Quest' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    /* Site Title */
    quest_generate_font_control ( $wp_customize, $section_id  ,  __( 'Site Title', 'Quest' ), 'title' ) ;

    /* Site Tagline */
    quest_generate_font_control ( $wp_customize, $section_id  ,  __( 'Site Tagline', 'Quest' ), 'tagline' ) ;


    /******************************
    // Sidebar
    *******************************/

    $section_id = 'typography_sidebar';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Sidebar', 'Quest' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    /* Site Title */
    quest_generate_font_control ( $wp_customize, $section_id  ,  __( 'Widget Title', 'Quest' ), 'title' ) ;

    /* Site Tagline */
    quest_generate_font_control ( $wp_customize, $section_id  ,  __( 'Widget Body', 'Quest' ), 'body' ) ;


    /******************************
    // Footer
    *******************************/

    $section_id = 'typography_footer';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Footer', 'Quest' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    /* Widget Title */
    quest_generate_font_control ( $wp_customize, $section_id  ,  __( 'Widget Title', 'Quest' ), 'title' ) ;

    /* Widget Body */
    quest_generate_font_control ( $wp_customize, $section_id  ,  __( 'Widget Body', 'Quest' ), 'body' ) ;

    /* Secondary Footer */
    quest_generate_font_control ( $wp_customize, $section_id  ,  __( 'Footer Text', 'Quest' ), 'text' ) ;


  }
}

?>
