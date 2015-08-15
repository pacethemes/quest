<?php
/**
 * @package Quest
 */


/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since Quest 1.0
 */
class Quest_Customize_Typography {

	public static function register( $wp_customize ) {

		$wp_customize->remove_section( 'colors' );

		$panel_id = 'typography';

		$wp_customize->add_panel( $panel_id, array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'Typography',
			'description'    => '',
		) );

		/******************
		 * // Subsets Section
		 *******************/

		$section_id = 'typography_options';

		$setting_id = $section_id . '_subsets';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Font Options', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);

		$wp_customize->add_setting(
	        $setting_id,
	        array(
	            'default'           =>  quest_get_default( $setting_id ),
	            'sanitize_callback' => 'quest_sanitize_font_subsets'
	        )
	    );

	    $wp_customize->add_control(
	        new Quest_Customize_Control_Checkbox_Multiple(
	            $wp_customize,
	            $setting_id,
	            array(
	                'section' => $section_id,
	                'label'   => __( 'Choose Font Subsets', 'quest' ),
	                'choices' => quest_get_choices( $setting_id )
	            )
	        )
	    );

		/******************
		 * // Global Section
		 *******************/

		$section_id = 'typography_global';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Global', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);

		/* Global */
		quest_generate_font_control( $wp_customize, $section_id, __( 'Text', 'quest' ), '', true );


		/******************
		 * // Headings Section
		 *******************/

		$section_id = 'typography_heading';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Text Headings', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);

		/* H1 */
		quest_generate_font_control( $wp_customize, $section_id, __( 'H1', 'quest' ), 'h1' );

		/* H2 */
		quest_generate_font_control( $wp_customize, $section_id, __( 'H2', 'quest' ), 'h2' );

		/* H3 */
		quest_generate_font_control( $wp_customize, $section_id, __( 'H3', 'quest' ), 'h3' );

		/* H4 */
		quest_generate_font_control( $wp_customize, $section_id, __( 'H4', 'quest' ), 'h4' );

		/* H5 */
		quest_generate_font_control( $wp_customize, $section_id, __( 'H5', 'quest' ), 'h5' );

		/* H6 */
		quest_generate_font_control( $wp_customize, $section_id, __( 'H6', 'quest' ), 'h6' );


		/******************
		 * // Main Menu Section
		 *******************/

		$section_id = 'typography_menu';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Main Menu', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);

		/* Menu Items */
		quest_generate_font_control( $wp_customize, $section_id, __( 'Menu Items', 'quest' ), '', true, array( 'line_height' ) );


		/* Sub Menu Items */
		quest_generate_font_control( $wp_customize, $section_id, __( 'Sub Menu Items', 'quest' ), 'sub' );


		/******************************
		 * // Site Title & Tagline Section
		 *******************************/

		$section_id = 'typography_site';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Site Title & Tagline', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);

		/* Site Title */
		quest_generate_font_control( $wp_customize, $section_id, __( 'Site Title', 'quest' ), 'title' );

		/* Site Tagline */
		quest_generate_font_control( $wp_customize, $section_id, __( 'Site Tagline', 'quest' ), 'tagline' );


		/******************************
		 * // Sidebar
		 *******************************/

		$section_id = 'typography_sidebar';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Sidebar', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);

		/* Site Title */
		quest_generate_font_control( $wp_customize, $section_id, __( 'Widget Title', 'quest' ), 'title' );

		/* Site Tagline */
		quest_generate_font_control( $wp_customize, $section_id, __( 'Widget Body', 'quest' ), 'body' );


		/******************************
		 * // Footer
		 *******************************/

		$section_id = 'typography_footer';

		$wp_customize->add_section( $section_id,
			array(
				'title'      => __( 'Footer', 'quest' ),
				'priority'   => 35,
				'capability' => 'edit_theme_options',
				'panel'      => $panel_id
			)
		);

		/* Widget Title */
		quest_generate_font_control( $wp_customize, $section_id, __( 'Widget Title', 'quest' ), 'title' );

		/* Widget Body */
		quest_generate_font_control( $wp_customize, $section_id, __( 'Widget Body', 'quest' ), 'body' );

		/* Secondary Footer */
		quest_generate_font_control( $wp_customize, $section_id, __( 'Footer Text', 'quest' ), 'text' );


	}
}
