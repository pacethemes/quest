<?php

/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since Trivoo 1.0
 */
class Trivoo_Customize_Colors {

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
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Accent Color', 'Trivoo' ),
          'description'    => __( 'Used for Links & Buttons', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_accent_shade';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Accent Shade Color', 'Trivoo' ),
          'description'    => __( 'Used for Links & Buttons hover state', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_alt';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Alt Color', 'Trivoo' ),
          'description'    => __( 'Used for Form Elements', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_border';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Border Color', 'Trivoo' ),
          'description'    => __( 'Used for Borders for all content elements', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_heading';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Heading Color', 'Trivoo' ),
          'description'    => __( 'Used for headings - h1 to h6', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_text';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Color', 'Trivoo' ),
          'description'    => __( 'Used for content text', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_text_alt';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Alt Color', 'Trivoo' ),
          'description'    => __( 'Used for post meta & icons', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_site_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Site Background Color', 'Trivoo' ),
          'description'    => __( 'Used for background color of the site', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_content_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Content Background Color', 'Trivoo' ),
          'description'    => __( 'Used for background color of the site content', 'Trivoo' ),
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
        'title' => __( 'Header', 'Trivoo' ), //Visible title of section
        'priority' => 35, //Determines what order this appears in
        'capability' => 'edit_theme_options', //Capability needed to tweak
        //'description' => __( 'Allows you to customize some example settings for Trivoo.', 'Trivoo' ), //Descriptive tooltip
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Background Color', 'Trivoo' ),
          'description'    => __( 'Header background color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_text';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Color', 'Trivoo' ),
          'description'    => __( 'Header Text Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_border';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Border Color', 'Trivoo' ),
          'description'    => __( 'Header Bottom Border Color', 'Trivoo' ),
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
        'title' => __( 'Main Menu', 'Trivoo' ), //Visible title of section
        'priority' => 35, //Determines what order this appears in
        'capability' => 'edit_theme_options', //Capability needed to tweak
        //'description' => __( 'Allows you to customize some example settings for Trivoo.', 'Trivoo' ), //Descriptive tooltip
        'panel' => $panel_id
      )
    );


    $setting_id = $section_id . '_menu_h';

    $wp_customize->add_control(
      new Trivoo_Customize_Misc_Control(
        $wp_customize,
        $setting_id,
        array(
          'section'     => $section_id ,
          'type'        => 'heading',
          'label' => __( 'Menu Items', 'Trivoo' )
        )
      )
    );


    $setting_id = $section_id . '_text';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Color', 'Trivoo' ),
          // 'description'    => __( 'Header Text Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_hover';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Hover/Focus Color', 'Trivoo' ),
          // 'description'    => __( 'Header Text Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_menu_sub_h';

    $wp_customize->add_control(
      new Trivoo_Customize_Misc_Control(
        $wp_customize,
        $setting_id,
        array(
          'section'     => $section_id ,
          'type'        => 'heading',
          'label' => __( 'Sub Menu Items', 'Trivoo' )
        )
      )
    );

    $setting_id = $section_id . '_sub_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Background Color', 'Trivoo' ),
          // 'description'    => __( 'Header Text Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_sub_border';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Border Color', 'Trivoo' ),
          // 'description'    => __( 'Header Text Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_sub_text';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Color', 'Trivoo' ),
          // 'description'    => __( 'Header Text Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_sub_hover';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Hover/Focus Text Color', 'Trivoo' ),
          // 'description'    => __( 'Header Text Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_sub_hover_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Hover/Focus Background Color', 'Trivoo' ),
          // 'description'    => __( 'Header Text Color', 'Trivoo' ),
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
        'title' => __( 'Title Container', 'Trivoo' ), //Visible title of section
        'priority' => 35, //Determines what order this appears in
        'capability' => 'edit_theme_options', //Capability needed to tweak
        //'description' => __( 'Allows you to customize some example settings for Trivoo.', 'Trivoo' ), //Descriptive tooltip
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Background Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_text';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_border';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Border Color', 'Trivoo' ),
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
        'title' => __( 'Footer', 'Trivoo' ), //Visible title of section
        'priority' => 35, //Determines what order this appears in
        'capability' => 'edit_theme_options', //Capability needed to tweak
        //'description' => __( 'Allows you to customize some example settings for Trivoo.', 'Trivoo' ), //Descriptive tooltip
        'panel' => $panel_id
      )
    );



    $setting_id = $section_id . '_main';

    $wp_customize->add_control(
      new Trivoo_Customize_Misc_Control(
        $wp_customize,
        $setting_id,
        array(
          'section'     => $section_id ,
          'type'        => 'heading',
          'label' => __( 'Main Footer', 'Trivoo' )
        )
      )
    );

    $setting_id = $section_id . '_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Background Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_heading';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Heading Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_text';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_border';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Border Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_second';

    $wp_customize->add_control(
      new Trivoo_Customize_Misc_Control(
        $wp_customize,
        $setting_id,
        array(
          'section'     => $section_id ,
          'type'        => 'heading',
          'label' => __( 'Secondary Footer', 'Trivoo' )
        )
      )
    );

    $setting_id = $section_id . '_sc_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Background Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_sc_text';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Text Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


    $setting_id = $section_id . '_sc_si';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Social Icon Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_sc_si_hover';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Social Icon Hover Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );

    $setting_id = $section_id . '_sc_si_hover_bg';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Social Icon Hover background Color', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id
        )
      )
    );


  }
}

?>
