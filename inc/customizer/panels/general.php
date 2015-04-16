<?php

/**
 * Contains methods for adding General Customization Panel and all settings under it
 *
 * @since Quest 1.0
 */
class Quest_Customize_General {

  public static function register( $wp_customize ) {

    $panel_id = 'general';

    $wp_customize->add_panel( $panel_id , array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'General',
        'description'    => '',
      ) );

    /******************************
    // Title & Tagline Section
    *******************************/

    $section_id = 'title_tagline';

    // Change panel for Site Title & Tagline Section
    $site_title           = $wp_customize->get_section( $section_id );
    $site_title->panel = $panel_id;


    // Change priority for Site Title 
    $site_title           = $wp_customize->get_control( 'blogname' );
    $site_title->priority = 15;

    // Change priority for Site Tagline 
    $site_title           = $wp_customize->get_control( 'blogdescription' );
    $site_title->priority = 17;


    $setting_id = $section_id . '_hide_title';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'absint'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Hide Title', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'checkbox',
          'priority'       => 16
        )
      )
    );

    $setting_id = $section_id . '_hide_tagline';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'absint'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Hide Tagline', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'checkbox',
          'priority'       => 18
        )
      )
    );

    // Change panel for Static Front Page Section
    $site_title           = $wp_customize->get_section( 'static_front_page' );
    $site_title->panel = $panel_id;


    /******************
    // Logo Section
    *******************/

    $section_id = 'logo';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Logo', 'Quest' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );


    $setting_id = $section_id . '_logo';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Logo', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_favicon';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Favicon', 'Quest' ),
          'description'    => __( '<b>.png</b> or <b>.ico</b> format. Recommended dimensions 32 x 32 pixels', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    /******************************
    // Social Profiles Section
    *******************************/

    $section_id = 'social';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Social Profiles', 'Quest' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_facebook';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Facebook URL', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_twitter';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Twitter URL', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_google-plus';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Google+ URL', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_linkedin';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'LinkedIn URL', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_youtube';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Youtube URL', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_vimeo-square';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Vimeo URL', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_instagram';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Instagram URL', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_flickr';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Flickr URL', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_pinterest';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Pinterest URL', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_dribbble';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Dribbble URL', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_digg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Digg URL', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    /******************************
    // Sticky Posts Section
    *******************************/

    $section_id = 'sticky';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Sticky Posts', 'Quest' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_label';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Sticky Label', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

  }
}

?>