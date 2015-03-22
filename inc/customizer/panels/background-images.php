<?php

/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since Trivoo 1.0
 */
class Trivoo_Customize_Background_Images {

  public static function register( $wp_customize ) {


    // Change panel for Site Title & Tagline Section
    $wp_customize->remove_section( 'background_image' );

    $panel_id = 'bgimages';

    $wp_customize->add_panel( $panel_id , array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Background Images',
        'description'    => '',
      ) );

    /******************
    // Background Images Section
    *******************/

    $section_id = 'bgimages';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Site', 'Trivoo' ), //Visible title of section
        'priority' => 35, //Determines what order this appears in
        'capability' => 'edit_theme_options', //Capability needed to tweak
        //'description' => __( 'Allows you to customize some example settings for Trivoo.', 'Trivoo' ), //Descriptive tooltip
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_site';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Background Image', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Title Container', 'Trivoo' ), //Visible title of section
        'priority' => 35, //Determines what order this appears in
        'capability' => 'edit_theme_options', //Capability needed to tweak
        //'description' => __( 'Allows you to customize some example settings for Trivoo.', 'Trivoo' ), //Descriptive tooltip
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_title_container';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Background Image', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );



  }

}
?>
