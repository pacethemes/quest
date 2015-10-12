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

		$wp_customize->add_panel( $panel_id, array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'Colors',
			'description'    => '',
		) );

		/******************
		 * // Global Section
		 *******************/

		$section_id = 'colors_global';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Global', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
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
					'label'       => __( 'Accent Color', 'quest' ),
					'description' => __( 'Used for Links & Buttons', 'quest' ),
					'section'     => $section_id,
					'settings'    => $setting_id
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
					'label'       => __( 'Accent Shade Color', 'quest' ),
					'description' => __( 'Used for Links & Buttons hover state', 'quest' ),
					'section'     => $section_id,
					'settings'    => $setting_id
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
					'label'       => __( 'Form Elements Background Color', 'quest' ),
					'description' => __( 'Used for Form Elements', 'quest' ),
					'section'     => $section_id,
					'settings'    => $setting_id
				)
			)
		);

		$setting_id = $section_id . '_alt_text';

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
					'label'       => __( 'Form Elements Text Color', 'quest' ),
					'description' => __( 'Used for Form Elements', 'quest' ),
					'section'     => $section_id,
					'settings'    => $setting_id
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
					'label'       => __( 'Border Color', 'quest' ),
					'description' => __( 'Used for Borders for all content elements', 'quest' ),
					'section'     => $section_id,
					'settings'    => $setting_id
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
					'label'       => __( 'Heading Color', 'quest' ),
					'description' => __( 'Used for headings - h1 to h6', 'quest' ),
					'section'     => $section_id,
					'settings'    => $setting_id
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
					'label'       => __( 'Text Color', 'quest' ),
					'description' => __( 'Used for content text', 'quest' ),
					'section'     => $section_id,
					'settings'    => $setting_id
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
					'label'       => __( 'Text Alt Color', 'quest' ),
					'description' => __( 'Used for post meta & icons', 'quest' ),
					'section'     => $section_id,
					'settings'    => $setting_id
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
					'label'       => __( 'Site Background Color', 'quest' ),
					'description' => __( 'Used for background color of the site', 'quest' ),
					'section'     => $section_id,
					'settings'    => $setting_id
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
					'label'       => __( 'Content Background Color', 'quest' ),
					'description' => __( 'Used for background color of the site content', 'quest' ),
					'section'     => $section_id,
					'settings'    => $setting_id
				)
			)
		);


		/******************
		 * // Header Section
		 *******************/

		$section_id = 'colors_header';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Header', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
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
					'label'       => __( 'Background Color', 'quest' ),
					'description' => __( 'Header background color', 'quest' ),
					'section'     => $section_id,
					'settings'    => $setting_id
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
					'label'       => __( 'Text Color', 'quest' ),
					'description' => __( 'Header Text Color', 'quest' ),
					'section'     => $section_id,
					'settings'    => $setting_id
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
					'label'       => __( 'Border Color', 'quest' ),
					'description' => __( 'Header Bottom Border Color', 'quest' ),
					'section'     => $section_id,
					'settings'    => $setting_id
				)
			)
		);


		/********************************
		 * // Secondary Header Section
		 *********************************/

		$head_section_id = 'colors_header2';

		// $wp_customize->add_section( $section_id,
		// 	array(
		// 		'title'      => __( 'Secondary Header', 'quest' ),
		// 		'priority'   => 35,
		// 		'capability' => 'edit_theme_options',
		// 		'panel'      => $panel_id
		// 	)
		// );

		$setting_id = $section_id . '_second';

		$wp_customize->add_control(
			new Quest_Customize_Misc_Control(
				$wp_customize,
				$setting_id,
				array(
					'section' => $section_id,
					'type'    => 'heading',
					'label'   => __( 'Secondary Header', 'quest' )
				)
			)
		);

		$setting_id = $head_section_id . '_bg';

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
					'label'    => __( 'Background Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);


		$setting_id = $head_section_id . '_text';

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
					'label'    => __( 'Text Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);


		$setting_id = $head_section_id . '_border_top';

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
					'label'    => __( 'Top Border Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);

		$setting_id = $head_section_id . '_border_bottom';

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
					'label'    => __( 'Bottom Border Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);

		$setting_id = $head_section_id . '_sc_si';

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
					'label'    => __( 'Social Icon Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);

		$setting_id = $head_section_id . '_sc_si_hover';

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
					'label'    => __( 'Social Icon Hover Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);

		$setting_id = $head_section_id . '_sc_si_hover_bg';

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
					'label'    => __( 'Social Icon Hover background Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);


		/******************
		 * // Main Menu Section
		 *******************/

		$section_id = 'colors_menu';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Main Menu', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);


		$setting_id = $section_id . '_menu_h';

		$wp_customize->add_control(
			new Quest_Customize_Misc_Control(
				$wp_customize,
				$setting_id,
				array(
					'section' => $section_id,
					'type'    => 'heading',
					'label'   => __( 'Menu Items', 'quest' )
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
					'label'    => __( 'Text Color', 'quest' ),
					// 'description'    => __( 'Header Text Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
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
					'label'    => __( 'Text Hover/Focus Color', 'quest' ),
					// 'description'    => __( 'Header Text Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);

		$setting_id = $section_id . '_menu_sub_h';

		$wp_customize->add_control(
			new Quest_Customize_Misc_Control(
				$wp_customize,
				$setting_id,
				array(
					'section' => $section_id,
					'type'    => 'heading',
					'label'   => __( 'Sub Menu Items', 'quest' )
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
					'label'    => __( 'Background Color', 'quest' ),
					// 'description'    => __( 'Header Text Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
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
					'label'    => __( 'Border Color', 'quest' ),
					// 'description'    => __( 'Header Text Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
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
					'label'    => __( 'Text Color', 'quest' ),
					// 'description'    => __( 'Header Text Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
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
					'label'    => __( 'Hover/Focus Text Color', 'quest' ),
					// 'description'    => __( 'Header Text Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
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
					'label'    => __( 'Hover/Focus Background Color', 'quest' ),
					// 'description'    => __( 'Header Text Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);

		$setting_id = $section_id . '_mob_bg';

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
					'label'    => __( 'Mobile Menu Background Color', 'quest-plus' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);

		$setting_id = $section_id . '_mob';

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
					'label'    => __( 'Mobile Menu Item Color', 'quest-plus' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);

		$setting_id = $section_id . '_mob_hover';

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
					'label'    => __( 'Mobile Menu Item Hover Color', 'quest-plus' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);


		/******************
		 * // Title Container Section
		 *******************/

		$section_id = 'colors_title';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Title Container', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
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
					'label'    => __( 'Background Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
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
					'label'    => __( 'Text Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
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
					'label'    => __( 'Border Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);


		/******************
		 * // Footer Section
		 *******************/

		$section_id = 'colors_footer';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Footer', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);


		$setting_id = $section_id . '_main';

		$wp_customize->add_control(
			new Quest_Customize_Misc_Control(
				$wp_customize,
				$setting_id,
				array(
					'section' => $section_id,
					'type'    => 'heading',
					'label'   => __( 'Main Footer', 'quest' )
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
					'label'    => __( 'Background Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
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
					'label'    => __( 'Heading Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
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
					'label'    => __( 'Text Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
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
					'label'    => __( 'Border Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);


		$setting_id = $section_id . '_second';

		$wp_customize->add_control(
			new Quest_Customize_Misc_Control(
				$wp_customize,
				$setting_id,
				array(
					'section' => $section_id,
					'type'    => 'heading',
					'label'   => __( 'Secondary Footer', 'quest' )
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
					'label'    => __( 'Background Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
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
					'label'    => __( 'Text Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
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
					'label'    => __( 'Social Icon Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
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
					'label'    => __( 'Social Icon Hover Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
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
					'label'    => __( 'Social Icon Hover background Color', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);


	}
}

?>