<?php

/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since Trivoo 1.0
 */
class Trivoo_Customize_Layout {

  public static function register( $wp_customize ) {

    $panel_id = 'layout';

    $wp_customize->add_panel( $panel_id , array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Layout',
        'description'    => '',
      ) );

    /******************
    // Global Section
    *******************/

    $section_id = 'layout_global';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Global', 'Trivoo' ), //Visible title of section
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
      new WP_Customize_Control(
        $wp_customize,
        $setting_id,
        array(
          'label'          => __( 'Site Layout', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            'wide'   => __( 'Wide', 'Trivoo' ),
            'boxed'  => __( 'Boxed', 'Trivoo' )
          )
        )
      )
    );


    /******************
    // Header Section
    *******************/

    $section_id = 'layout_header';

    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Header', 'Trivoo' ), //Visible title of section
        'priority' => 35, //Determines what order this appears in
        'capability' => 'edit_theme_options', //Capability needed to tweak
        //'description' => __( 'Allows you to customize some example settings for Trivoo.', 'Trivoo' ), //Descriptive tooltip
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
        'title' => __( 'Footer', 'Trivoo' ), //Visible title of section
        'priority' => 35, //Determines what order this appears in
        'capability' => 'edit_theme_options', //Capability needed to tweak
        //'description' => __( 'Allows you to customize some example settings for Trivoo.', 'Trivoo' ), //Descriptive tooltip
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_widgets';

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
          'label'          => __( 'Number of Widgets', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            '1'   => 1,
            '2'  => 2,
            '3'  => 3,
            '4'  => 4,
          )
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

    //1. Define a new section (if desired) to the Theme Customizer
    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Blog (Posts Page)', 'Trivoo' ), //Visible title of section
        'priority' => 35, //Determines what order this appears in
        'capability' => 'edit_theme_options', //Capability needed to tweak
        'panel' => $panel_id
      )
    );


    $setting_id = $section_id . '_sidebar';

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
          'label'          => __( 'Sidebar Position', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            'left'   => __( 'Left', 'Trivoo' ),
            'right'  => __( 'Right', 'Trivoo' ),
            'none'  => __( 'None', 'Trivoo' )
          )
        )
      )
    );


    $setting_id = $section_id . '_style';

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
          'label'          => __( 'Style', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            'normal'   => __( 'Normal', 'Trivoo' ),
            'medium'   => __( 'Medium', 'Trivoo' ),
            'grid'  => __( 'Grid', 'Trivoo' )
          )
        )
      )
    );

    $setting_id = $section_id . '_title-bar';

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
          'label'          => __( 'Show Title Bar ?', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            '1'   => __( 'Yes', 'Trivoo' ),
            '0'   => __( 'No', 'Trivoo' )
          )
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
        'type'              => 'theme_mod'
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
        'type'              => 'theme_mod'
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

    //1. Define a new section (if desired) to the Theme Customizer
    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Archives', 'Trivoo' ), //Visible title of section
        'priority' => 35, //Determines what order this appears in
        'capability' => 'edit_theme_options', //Capability needed to tweak
        'panel' => $panel_id
      )
    );


    $setting_id = $section_id . '_sidebar';

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
          'label'          => __( 'Sidebar Position', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            'left'   => __( 'Left', 'Trivoo' ),
            'right'  => __( 'Right', 'Trivoo' ),
            'none'  => __( 'None', 'Trivoo' )
          )
        )
      )
    );


    $setting_id = $section_id . '_style';

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
          'label'          => __( 'Style', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            'normal'   => __( 'Normal', 'Trivoo' ),
            'medium'   => __( 'Medium', 'Trivoo' ),
            'grid'  => __( 'Grid', 'Trivoo' )
          )
        )
      )
    );

    $setting_id = $section_id . '_title-bar';

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
          'label'          => __( 'Show Title Bar ?', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            '1'   => __( 'Yes', 'Trivoo' ),
            '0'   => __( 'No', 'Trivoo' )
          )
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
        'type'              => 'theme_mod'
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
        'type'              => 'theme_mod'
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

    //1. Define a new section (if desired) to the Theme Customizer
    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Search Results', 'Trivoo' ), //Visible title of section
        'priority' => 35, //Determines what order this appears in
        'capability' => 'edit_theme_options', //Capability needed to tweak
        //'description' => __( 'Allows you to customize some example settings for Trivoo.', 'Trivoo' ), //Descriptive tooltip
        'panel' => $panel_id
      )
    );


    $setting_id = $section_id . '_sidebar';

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
          'label'          => __( 'Sidebar Position', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            'left'   => __( 'Left', 'Trivoo' ),
            'right'  => __( 'Right', 'Trivoo' ),
            'none'  => __( 'None', 'Trivoo' )
          )
        )
      )
    );


    $setting_id = $section_id . '_style';

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
          'label'          => __( 'Style', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            'normal'   => __( 'Normal', 'Trivoo' ),
            'medium'   => __( 'Medium', 'Trivoo' ),
            'grid'  => __( 'Grid', 'Trivoo' )
          )
        )
      )
    );

    $setting_id = $section_id . '_title-bar';

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
          'label'          => __( 'Show Title Bar ?', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            '1'   => __( 'Yes', 'Trivoo' ),
            '0'   => __( 'No', 'Trivoo' )
          )
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
        'type'              => 'theme_mod'
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
        'type'              => 'theme_mod'
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

    //1. Define a new section (if desired) to the Theme Customizer
    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Single Post', 'Trivoo' ), //Visible title of section
        'priority' => 35, //Determines what order this appears in
        'capability' => 'edit_theme_options', //Capability needed to tweak
        //'description' => __( 'Allows you to customize some example settings for Trivoo.', 'Trivoo' ), //Descriptive tooltip
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_related';

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
          'label'          => __( 'Show Related Posts ?', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            '1'   => __( 'Yes', 'Trivoo' ),
            '0'  => __( 'No', 'Trivoo' )
          )
        )
      )
    );


    $setting_id = $section_id . '_sidebar';

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
          'label'          => __( 'Sidebar Position', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            'left'   => __( 'Left', 'Trivoo' ),
            'right'  => __( 'Right', 'Trivoo' ),
            'none'  => __( 'None', 'Trivoo' )
          )
        )
      )
    );

    $setting_id = $section_id . '_title-bar';

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
          'label'          => __( 'Show Title Bar ?', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            '1'   => __( 'Yes', 'Trivoo' ),
            '0'   => __( 'No', 'Trivoo' )
          )
        )
      )
    );

    $setting_id = $section_id . '_title';

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
          'label'          => __( 'Show Post Title ?', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            '1'   => __( 'Yes', 'Trivoo' ),
            '0'   => __( 'No', 'Trivoo' )
          )
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
        'type'              => 'theme_mod'
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
        'type'              => 'theme_mod'
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

    //1. Define a new section (if desired) to the Theme Customizer
    $wp_customize->add_section( $section_id ,
      array(
        'title' => __( 'Single Page', 'Trivoo' ), //Visible title of section
        'priority' => 35, //Determines what order this appears in
        'capability' => 'edit_theme_options', //Capability needed to tweak
        //'description' => __( 'Allows you to customize some example settings for Trivoo.', 'Trivoo' ), //Descriptive tooltip
        'panel' => $panel_id
      )
    );

    $setting_id = $section_id . '_sidebar';

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
          'label'          => __( 'Sidebar Position', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            'left'   => __( 'Left', 'Trivoo' ),
            'right'  => __( 'Right', 'Trivoo' ),
            'none'  => __( 'None', 'Trivoo' )
          )
        )
      )
    );


    $setting_id = $section_id . '_title-bar';

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
          'label'          => __( 'Show Title Bar ?', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            '1'   => __( 'Yes', 'Trivoo' ),
            '0'   => __( 'No', 'Trivoo' )
          )
        )
      )
    );

    $setting_id = $section_id . '_title';

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
          'label'          => __( 'Show Page Title ?', 'Trivoo' ),
          'section'        => $section_id,
          'settings'       => $setting_id,
          'type'           => 'select',
          'choices'        => array(
            '1'   => __( 'Yes', 'Trivoo' ),
            '0'   => __( 'No', 'Trivoo' )
          )
        )
      )
    );


  }

}
?>
