<?php

/**
 * Contains methods for adding Layout Customization Panel and all settings under it
 *
 * @since Trivoo 1.0
 */
class Trivoo_Customize_Layout {

  public static function register( $wp_customize ) {

    $panel_id = 'layout';

    $wp_customize->add_panel( $panel_id , array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Layout'
      ) );

    /******************
    // Global Section
    *******************/

    $section_id = 'layout_global';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Global', 'Trivoo' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_site';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Site Layout', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );


    /******************
    // Header Section
    *******************/

    $section_id = 'layout_header';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Header', 'Trivoo' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_search';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'absint',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Search Icon', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'checkbox'
        )
      )
    );


    /******************
    // Footer Section
    *******************/

    $section_id = 'layout_footer';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Footer', 'Trivoo' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_widgets';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Number of Widgets', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );


    $setting_id = $section_id . '_social';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'absint',
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Social Icons', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'checkbox'
        )
      )
    );



    /******************************************
    // Blog (Posts Page) Section
    *******************************************/

    $section_id = 'layout_blog';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Blog (Posts Page)', 'Trivoo' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );


    $setting_id = $section_id . '_sidebar';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Sidebar Position', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );


    $setting_id = $section_id . '_style';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Style', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );

    $setting_id = $section_id . '_title-bar';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Title Bar ?', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );


    $setting_id = $section_id . '_meta';

    $wp_customize->add_control(
      new Trivoo_Customize_Misc_Control(
        $wp_customize,
        $setting_id,
        array(
          'section'     => $section_id ,
          'type'        => 'heading',
          'label' => __( 'Post Meta', 'Trivoo' )
        )
      )
    );


    $setting_id = $section_id . '_meta-cats';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'absint'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Categories', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'checkbox'
        )
      )
    );

    $setting_id = $section_id . '_meta-tags';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'absint'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Tags', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'checkbox'
        )
      )
    );


    /******************************************
    // Archives Section
    *******************************************/

    $section_id = 'layout_archive';

    
    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Archives', 'Trivoo' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );


    $setting_id = $section_id . '_sidebar';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Sidebar Position', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );


    $setting_id = $section_id . '_style';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Style', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );

    $setting_id = $section_id . '_title-bar';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Title Bar ?', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );

    $setting_id = $section_id . '_meta';

    $wp_customize->add_control(
      new Trivoo_Customize_Misc_Control(
        $wp_customize,
        $setting_id,
        array(
          'section'     => $section_id ,
          'type'        => 'heading',
          'label' => __( 'Post Meta', 'Trivoo' )
        )
      )
    );


    $setting_id = $section_id . '_meta-cats';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'absint'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Categories', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'checkbox'
        )
      )
    );

    $setting_id = $section_id . '_meta-tags';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'absint'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Tags', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'checkbox'
        )
      )
    );


    /******************************************
    // Search Results Section
    *******************************************/

    $section_id = 'layout_search';

    
    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Search Results', 'Trivoo' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );


    $setting_id = $section_id . '_sidebar';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Sidebar Position', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );


    $setting_id = $section_id . '_style';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Style', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );

    $setting_id = $section_id . '_title-bar';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Title Bar ?', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );


    $setting_id = $section_id . '_meta';

    $wp_customize->add_control(
      new Trivoo_Customize_Misc_Control(
        $wp_customize,
        $setting_id,
        array(
          'section'     => $section_id ,
          'type'        => 'heading',
          'label' => __( 'Post Meta', 'Trivoo' )
        )
      )
    );


    $setting_id = $section_id . '_meta-cats';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'absint'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Categories', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'checkbox'
        )
      )
    );

    $setting_id = $section_id . '_meta-tags';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'absint'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Tags', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'checkbox'
        )
      )
    );


    /******************************************
    // Single Post
    *******************************************/

    $section_id = 'layout_post';

    
    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Single Post', 'Trivoo' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_sidebar';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Sidebar Position', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );

    $setting_id = $section_id . '_title-bar';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Title Bar ?', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );

    $setting_id = $section_id . '_title';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Post Title ?', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );

    $setting_id = $section_id . '_meta';

    $wp_customize->add_control(
      new Trivoo_Customize_Misc_Control(
        $wp_customize,
        $setting_id,
        array(
          'section'     => $section_id ,
          'type'        => 'heading',
          'label' => __( 'Post Meta', 'Trivoo' )
        )
      )
    );


    $setting_id = $section_id . '_meta-cats';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'absint'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Categories', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'checkbox'
        )
      )
    );

    $setting_id = $section_id . '_meta-tags';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'absint'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Tags', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'checkbox'
        )
      )
    );


    /******************************************
    // Single Page
    *******************************************/

    $section_id = 'layout_page';

    
    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Single Page', 'Trivoo' ),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_sidebar';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Sidebar Position', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );


    $setting_id = $section_id . '_title-bar';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Title Bar ?', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );

    $setting_id = $section_id . '_title';

    $wp_customize->add_setting(
      $setting_id,
      array(
        'default'           => trivoo_get_default( $setting_id ),
        'type'              => 'theme_mod',
        'sanitize_callback' => 'trivoo_sanitize_choice'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Show Page Title ?', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => trivoo_get_choices( $setting_id )
        )
      )
    );


  }

}
?>