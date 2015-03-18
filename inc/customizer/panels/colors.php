<?php

// include "defaults.php";
// include "helpers.php";

/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since Trivoo 1.0
 */
class Trivoo_Customize_Colors {

  public static function register( $wp_customize ) {

    $wp_customize->remove_section('colors');

    $panel_id = 'colors';

    $wp_customize->add_panel( $panel_id , array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Colors',
        'description'    => '',
      ) );

    /******************
    // Title & Tagline Section
    *******************/

    $section_id = 'colors_global';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Global', 'Trivoo' ), //Visible title of section
        'priority' => 35, //Determines what order this appears in
        'capability' => 'edit_theme_options', //Capability needed to tweak
        //'description' => __( 'Allows you to customize some example settings for Trivoo.', 'Trivoo' ), //Descriptive tooltip
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_accent';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Accent Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'checkbox',
          'priority'       => 16
        )
      )
    );



  }
}

?>