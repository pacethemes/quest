<?php

/**
 * Contains methods for adding Colors Customization Panel and all settings under it
 *
 * @since Quest 1.0
 */
class Quest_Customize_Colors {

  public static function register( $wp_customize ) {

    $wp_customize->remove_section( 'colors' );

    $panel_id = 'colors';

    $wp_customize->add_panel( $panel_id , array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Colors',
        'description'    => '',
      ) );

    /******************
    // Global Section
    *******************/

    $section_id = 'colors_global';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Global', 'Quest' ),
        'priority' => 35, 
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_accent';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Accent Color', 'Quest' ),
          'description'    => __( 'Used for Links & Buttons', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_accent_shade';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Accent Shade Color', 'Quest' ),
          'description'    => __( 'Used for Links & Buttons hover state', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_alt';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Alt Color', 'Quest' ),
          'description'    => __( 'Used for Form Elements', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_border';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Border Color', 'Quest' ),
          'description'    => __( 'Used for Borders for all content elements', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_heading';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Heading Color', 'Quest' ),
          'description'    => __( 'Used for headings - h1 to h6', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_text';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Color', 'Quest' ),
          'description'    => __( 'Used for content text', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_text_alt';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Alt Color', 'Quest' ),
          'description'    => __( 'Used for post meta & icons', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_site_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Site Background Color', 'Quest' ),
          'description'    => __( 'Used for background color of the site', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_content_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Content Background Color', 'Quest' ),
          'description'    => __( 'Used for background color of the site content', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    /******************
    // Header Section
    *******************/

    $section_id = 'colors_header';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Header', 'Quest' ),
        'priority' => 35, 
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Background Color', 'Quest' ),
          'description'    => __( 'Header background color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_text';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Color', 'Quest' ),
          'description'    => __( 'Header Text Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_border';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Border Color', 'Quest' ),
          'description'    => __( 'Header Bottom Border Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    /******************
    // Main Menu Section
    *******************/

    $section_id = 'colors_menu';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Main Menu', 'Quest' ),
        'priority' => 35, 
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );


    $setting_id = $section_id . '_menu_h';

    $wp_customize->add_control(
      new Quest_Customize_Misc_Control(
        $wp_customize,
        $setting_id,
        array(
          'section'     => $section_id ,
          'type'        => 'heading',
          'label' => __( 'Menu Items', 'Quest' )
        )
      )
    );


    $setting_id = $section_id . '_text';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Color', 'Quest' ),
          // 'description'    => __( 'Header Text Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_hover';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Hover/Focus Color', 'Quest' ),
          // 'description'    => __( 'Header Text Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_menu_sub_h';

    $wp_customize->add_control(
      new Quest_Customize_Misc_Control(
        $wp_customize,
        $setting_id,
        array(
          'section'     => $section_id ,
          'type'        => 'heading',
          'label' => __( 'Sub Menu Items', 'Quest' )
        )
      )
    );

    $setting_id = $section_id . '_sub_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Background Color', 'Quest' ),
          // 'description'    => __( 'Header Text Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_sub_border';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Border Color', 'Quest' ),
          // 'description'    => __( 'Header Text Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_sub_text';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Color', 'Quest' ),
          // 'description'    => __( 'Header Text Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_sub_hover';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Hover/Focus Text Color', 'Quest' ),
          // 'description'    => __( 'Header Text Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_sub_hover_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Hover/Focus Background Color', 'Quest' ),
          // 'description'    => __( 'Header Text Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    /******************
    // Title Container Section
    *******************/

    $section_id = 'colors_title';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Title Container', 'Quest' ),
        'priority' => 35, 
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Background Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_text';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_border';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Border Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    /******************
    // Footer Section
    *******************/

    $section_id = 'colors_footer';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Footer', 'Quest' ),
        'priority' => 35, 
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );



    $setting_id = $section_id . '_main';

    $wp_customize->add_control(
      new Quest_Customize_Misc_Control(
        $wp_customize,
        $setting_id,
        array(
          'section'     => $section_id ,
          'type'        => 'heading',
          'label' => __( 'Main Footer', 'Quest' )
        )
      )
    );

    $setting_id = $section_id . '_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Background Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_heading';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Heading Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_text';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_border';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Border Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_second';

    $wp_customize->add_control(
      new Quest_Customize_Misc_Control(
        $wp_customize,
        $setting_id,
        array(
          'section'     => $section_id ,
          'type'        => 'heading',
          'label' => __( 'Secondary Footer', 'Quest' )
        )
      )
    );

    $setting_id = $section_id . '_sc_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Background Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_sc_text';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_sc_si';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Social Icon Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_sc_si_hover';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Social Icon Hover Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_sc_si_hover_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => quest_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'maybe_hash_hex_color',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Social Icon Hover background Color', 'Quest' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


  }
}

?>