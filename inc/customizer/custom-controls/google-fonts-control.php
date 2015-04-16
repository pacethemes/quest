<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;


if ( ! class_exists( 'Google_Fonts_Custom_Control' ) ) :
    /**
     * A class to create a dropdown for all google fonts
     */
    class Google_Fonts_Custom_Control extends WP_Customize_Control
    {
        private $fonts = false;

        public function __construct( $manager, $id, $args = array(), $options = array() ) {
            parent::__construct( $manager, $id, $args );
        }

        /**
         * Render the content of the category dropdown
         *
         * @return HTML
         */
        public function render_content() {
        ?>
                <label>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <select class="chosen-select" <?php $this->link(); ?>>
                    </select>
                </label>
            <?php
        }

    }
endif;

if ( ! function_exists( 'quest_generate_font_control' ) ) :
    /**
     * Adds all the required Font Controls (Family, variant, size etc) to the WP_Customize object
     *
     */
    function quest_generate_font_control( &$wp_customize, $section_id, $group_label, $group_id, $use_section_id = false, $exclude = array() ) {

        $font_setting_id = ( !$use_section_id ) ?  $section_id . '_' . $group_id : $section_id ;

        $wp_customize->add_control(
            new Quest_Customize_Misc_Control(
                $wp_customize,
                $font_setting_id,
                array(
                    'section'     => $section_id ,
                    'type'        => 'heading',
                    'label'       => $group_label
                )
            )
        );


        if ( !in_array( 'family', $exclude ) ) :

            $setting_id = $font_setting_id . '_font_family';

        $wp_customize->add_setting(
            $setting_id ,
            array(
                'default'        => quest_get_default( $setting_id ),
                'type'           => 'theme_mod',
                'sanitize_callback'       => 'quest_sanitize_font_family'
            ) );

        $wp_customize->add_control( new Google_Fonts_Custom_Control( $wp_customize, $setting_id , array(
                    'label'   => 'Font Family',
                    'section' => $section_id,
                    'settings'   => $setting_id
                ) ) );

        endif;


        if ( !in_array( 'variant', $exclude ) ) :

            $setting_id = $font_setting_id . '_font_variant';

        $wp_customize->add_setting(
            $setting_id,
            array(
                'default'           => quest_get_default( $setting_id ),
                'type'              => 'theme_mod',
                'sanitize_callback'       => 'quest_sanitize_font_variant'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                $setting_id,
                array(
                    'label'          => __( 'Font Variant', 'Quest' ),
                    'description'    => __( 'Different variants of the font, provides control over font-weight and italics', 'Quest' ),
                    'section'        => $section_id,
                    'settings'       => $setting_id,
                    'type'           => 'select',
                    'choices'        => array(
                        'regular' => 'Regular'
                    )
                )
            )
        );

        endif;

        if ( !in_array( 'size', $exclude ) ) :

            $setting_id = $font_setting_id . '_font_size';

        $wp_customize->add_setting(
            $setting_id,
            array(
                'default'           => quest_get_default( $setting_id ),
                'type'              => 'theme_mod',
                'sanitize_callback'       => 'absint'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                $setting_id,
                array(
                    'label'          => __( 'Font Size (px)', 'Quest' ),
                    'section'        => $section_id,
                    'settings'       => $setting_id
                )
            )
        );

        endif;

        if ( !in_array( 'line_height', $exclude ) ) :

            $setting_id = $font_setting_id . '_line_height';

        $wp_customize->add_setting(
            $setting_id,
            array(
                'default'           => quest_get_default( $setting_id ),
                'type'              => 'theme_mod',
                'sanitize_callback'       => 'quest_sanitize_float'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                $setting_id,
                array(
                    'label'          => __( 'Line Height (em)', 'Quest' ),
                    'section'        => $section_id,
                    'settings'       => $setting_id
                )
            )
        );

        endif;

        if ( !in_array( 'text_transform', $exclude ) ) :

            $setting_id = $font_setting_id . '_text_transform';

        $wp_customize->add_setting(
            $setting_id,
            array(
                'default'           => quest_get_default( $setting_id ),
                'type'              => 'theme_mod',
                'sanitize_callback'       => 'quest_sanitize_font_text_transform'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                $setting_id,
                array(
                    'label'          => __( 'Text Transform', 'Quest' ),
                    'section'        => $section_id,
                    'settings'       => $setting_id,
                    'type'           => 'select',
                    'choices'        => array(
                        'none' => __( 'None', 'Quest' ),
                        'uppercase' => __( 'Uppercase', 'Quest' ),
                        'lowercase' => __( 'Lowercase', 'Quest' ),
                    )
                )
            )
        );

        endif;

        if ( !in_array( 'letter_spacing', $exclude ) ) :

            $setting_id = $font_setting_id . '_letter_spacing';

        $wp_customize->add_setting(
            $setting_id,
            array(
                'default'           => quest_get_default( $setting_id ),
                'type'              => 'theme_mod',
                'sanitize_callback'       => 'quest_sanitize_float'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                $setting_id,
                array(
                    'label'          => __( 'Letter Spacing (px)', 'Quest' ),
                    'section'        => $section_id,
                    'settings'       => $setting_id
                )
            )
        );

        endif;

        if ( !in_array( 'word_spacing', $exclude ) ) :

            $setting_id = $font_setting_id . '_word_spacing';

        $wp_customize->add_setting(
            $setting_id,
            array(
                'default'           => quest_get_default( $setting_id ),
                'type'              => 'theme_mod',
                'sanitize_callback'       => 'quest_sanitize_float'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                $setting_id,
                array(
                    'label'          => __( 'Word Spacing (px)', 'Quest' ),
                    'section'        => $section_id,
                    'settings'       => $setting_id
                )
            )
        );

        endif;
    }
endif;

?>