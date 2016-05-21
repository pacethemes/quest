<?php
/**
 * @package Quest
 */

/**
 * Contains methods for adding Layout Customization Panel and all settings under it
 *
 * @since Quest 1.0
 */
class Quest_Customize_Layout {

	public static function register( $wp_customize ) {

		$panel_id = 'layout';

		$wp_customize->add_panel( $panel_id, array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'Layout'
		) );

		/******************
		 * // Global Section
		 *******************/

		$section_id = 'layout_global';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Global', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);

		$setting_id = $section_id . '_site';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Site Layout', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);


		/******************
		 * // Header Section
		 *******************/

		$section_id = 'layout_header';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Header', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);

		$setting_id = $section_id . '_height';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				// 'sanitize_callback' => 'intval',
			)
		);

		$wp_customize->add_control(
			new Quest_Customizer_Range_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Header Height', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);


		$setting_id = $section_id . '_menu_height';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				// 'sanitize_callback' => 'intval',
			)
		);

		$wp_customize->add_control(
			new Quest_Customizer_Range_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Main Menu Height', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);

		$setting_id = $section_id . '_search';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Show Search Icon', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'checkbox'
				)
			)
		);

		$setting_id = $section_id . '_secondary';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Show Secondary Header', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'checkbox'
				)
			)
		);

		$setting_id = $section_id . '_secondary-layout';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Secondary Header Layout', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);

		$setting_id = $section_id . '_callout';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_html'
			)
		);

		$wp_customize->add_control(
			new Textarea_Custom_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Secondary Header Callout Text', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);


		/******************
		 * // Footer Section
		 *******************/

		$section_id = 'layout_footer';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Footer', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);

		$setting_id = $section_id . '_widgets';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Number of Widgets', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);


		$setting_id = $section_id . '_social';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Show Social Icons', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'checkbox'
				)
			)
		);


		/******************************************
		 * // Blog (Posts Page) Section
		 *******************************************/

		$section_id = 'layout_blog';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Blog (Posts Page)', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);


		$setting_id = $section_id . '_sidebar';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Sidebar Position', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);


		$setting_id = $section_id . '_style';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Style', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);

		$setting_id = $section_id . '_title-bar';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Show Title Bar ?', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);


		$setting_id = $section_id . '_meta';

		$wp_customize->add_control(
			new Quest_Customize_Misc_Control(
				$wp_customize,
				$setting_id,
				array(
					'section' => $section_id,
					'type'    => 'heading',
					'label'   => __( 'Post Meta', 'quest' )
				)
			)
		);


		$setting_id = $section_id . '_meta-cats';

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
					'label'    => __( 'Show Categories', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'checkbox'
				)
			)
		);

		$setting_id = $section_id . '_meta-tags';

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
					'label'    => __( 'Show Tags', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'checkbox'
				)
			)
		);


		/******************************************
		 * // Archives Section
		 *******************************************/

		$section_id = 'layout_archive';


		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Archives', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);


		$setting_id = $section_id . '_sidebar';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Sidebar Position', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);


		$setting_id = $section_id . '_style';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Style', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);

		$setting_id = $section_id . '_title-bar';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Show Title Bar ?', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);

		$setting_id = $section_id . '_meta';

		$wp_customize->add_control(
			new Quest_Customize_Misc_Control(
				$wp_customize,
				$setting_id,
				array(
					'section' => $section_id,
					'type'    => 'heading',
					'label'   => __( 'Post Meta', 'quest' )
				)
			)
		);


		$setting_id = $section_id . '_meta-cats';

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
					'label'    => __( 'Show Categories', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'checkbox'
				)
			)
		);

		$setting_id = $section_id . '_meta-tags';

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
					'label'    => __( 'Show Tags', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'checkbox'
				)
			)
		);


		/******************************************
		 * // Search Results Section
		 *******************************************/

		$section_id = 'layout_search';


		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Search Results', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);


		$setting_id = $section_id . '_sidebar';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Sidebar Position', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);


		$setting_id = $section_id . '_style';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Style', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);

		$setting_id = $section_id . '_title-bar';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Show Title Bar ?', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);


		$setting_id = $section_id . '_meta';

		$wp_customize->add_control(
			new Quest_Customize_Misc_Control(
				$wp_customize,
				$setting_id,
				array(
					'section' => $section_id,
					'type'    => 'heading',
					'label'   => __( 'Post Meta', 'quest' )
				)
			)
		);


		$setting_id = $section_id . '_meta-cats';

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
					'label'    => __( 'Show Categories', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'checkbox'
				)
			)
		);

		$setting_id = $section_id . '_meta-tags';

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
					'label'    => __( 'Show Tags', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'checkbox'
				)
			)
		);


		/******************************************
		 * // Single Post
		 *******************************************/

		$section_id = 'layout_post';


		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Single Post', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);

		$setting_id = $section_id . '_sidebar';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Sidebar Position', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);

		$setting_id = $section_id . '_title-bar';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Show Title Bar ?', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);

		$setting_id = $section_id . '_ft-img-hide';

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
					'label'    => __( 'Hide Featured Image', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'checkbox'
				)
			)
		);


		$setting_id = $section_id . '_ft-img-enlarge';

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
					'label'       => __( 'Enlarge Featured Image', 'quest' ),
					'section'     => $section_id,
					'settings'    => $setting_id,
					'type'        => 'checkbox',
					'description' => __( 'Enalrge the featured image width to the 100% width of the view port/window', 'quest' )
				)
			)
		);

		$setting_id = $section_id . '_content_align';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Content Alignment', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);

		$setting_id = $section_id . '_title';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Show Post Title ?', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);

		$setting_id = $section_id . '_meta';

		$wp_customize->add_control(
			new Quest_Customize_Misc_Control(
				$wp_customize,
				$setting_id,
				array(
					'section' => $section_id,
					'type'    => 'heading',
					'label'   => __( 'Post Meta', 'quest' )
				)
			)
		);


		$setting_id = $section_id . '_meta-cats';

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
					'label'    => __( 'Show Categories', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'checkbox'
				)
			)
		);

		$setting_id = $section_id . '_meta-tags';

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
					'label'    => __( 'Show Tags', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'checkbox'
				)
			)
		);


		/******************************************
		 * // Single Page
		 *******************************************/

		$section_id = 'layout_page';


		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Single Page', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);

		$setting_id = $section_id . '_sidebar';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Sidebar Position', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);


		$setting_id = $section_id . '_title-bar';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Show Title Bar ?', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);

		$setting_id = $section_id . '_ft-img-hide';

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
					'label'    => __( 'Hide Featured Image', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'checkbox'
				)
			)
		);


		$setting_id = $section_id . '_ft-img-enlarge';

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
					'label'       => __( 'Enlarge Featured Image', 'quest' ),
					'section'     => $section_id,
					'settings'    => $setting_id,
					'type'        => 'checkbox',
					'description' => __( 'Enalrge the featured image width to the 100% width of the view port/window', 'quest' )
				)
			)
		);

		$setting_id = $section_id . '_content_align';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Content Alignment', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);

		$setting_id = $section_id . '_title';

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => quest_get_default( $setting_id ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'quest_sanitize_choice'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => __( 'Show Page Title ?', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id,
					'type'     => 'select',
					'choices'  => quest_get_choices( $setting_id )
				)
			)
		);


	}

}

?>