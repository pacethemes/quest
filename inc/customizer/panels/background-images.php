<?php

/**
 * Contains methods for adding Background Images Customization Panel and all settings under it
 *
 * @since Quest 1.0
 */
class Quest_Customize_Background_Images {

	public static function register( $wp_customize ) {


		// Change panel for Site Title & Tagline Section
		$wp_customize->remove_section( 'background_image' );

		$panel_id = 'bgimages';

		$wp_customize->add_panel( $panel_id, array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'Background Images',
			'description'    => '',
		) );

		/********************************
		 * // Background Images Section
		 *********************************/

		$section_id = 'bgimages_global';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Global', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);

		$setting_id = $section_id . '_h1';

		$wp_customize->add_control(
			new Quest_Customize_Misc_Control(
				$wp_customize,
				$setting_id,
				array(
					'section' => $section_id,
					'type'    => 'heading',
					'label'   => __( 'Site', 'quest' )
				)
			)
		);

		$setting_id = $section_id . '_site';

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
					'label'    => __( 'Background Image', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);

		$setting_id = $section_id . '_h2';

		$wp_customize->add_control(
			new Quest_Customize_Misc_Control(
				$wp_customize,
				$setting_id,
				array(
					'section' => $section_id,
					'type'    => 'heading',
					'label'   => __( 'Title Container', 'quest' )
				)
			)
		);

		$setting_id = $section_id . '_title_container';

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
					'label'    => __( 'Background Image', 'quest' ),
					'section'  => $section_id,
					'settings' => $setting_id
				)
			)
		);


	}

}

?>