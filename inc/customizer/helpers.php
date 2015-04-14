<?php
if ( !function_exists( 'trivoo_get_default' ) ):

	/**
	 * Get default value for a theme option
	 *
	 * @return string    String with default value
	 */

	function trivoo_get_default( $name ) {
		global $trivoo_defaults;

		if ( array_key_exists( $name, $trivoo_defaults ) ) {
			return $trivoo_defaults[$name];
		}

		return '';
	}
endif;

if ( !function_exists( 'trivoo_get_choices' ) ):

	/**
	 * Get all Choices/Options for a dropdown
	 *
	 * @return array    Array with all options
	 */

	function trivoo_get_choices( $name ) {
		global $trivoo_defaults;

		if ( array_key_exists( $name, $trivoo_defaults['choices'] ) ) {
			return $trivoo_defaults['choices'][$name];
		}

		return array();
	}
endif;

if ( !function_exists( 'trivoo_get_default_mod' ) ):

	/**
	 * Get the mod value or default value if mod is not set
	 *
	 * @return string    Mod value
	 */

	function trivoo_get_default_mod( $name, $mods ) {
		global $trivoo_defaults;

		if ( array_key_exists( $name, $mods ) && $mods[$name] !== '' ) {
			return $mods[$name];
		}
		else if ( array_key_exists( $name, $trivoo_defaults ) ) {
				return $trivoo_defaults[$name];
			}

		return '';
	}
endif;

if ( !function_exists( 'trivoo_get_default_mods' ) ):

	/**
	 * Get all Default Trivoo Mod Options and Values
	 *
	 * @return array    Array with key as option names and value as option values
	 */

	function trivoo_get_default_mods() {
		global $trivoo_defaults;
		return $trivoo_defaults;
	}
endif;

if ( !function_exists( 'trivoo_get_mods' ) ):

	/**
	 * Returns all Trivoo mods set by the user, returns the default values if any mod is not set
	 *
	 * @return array
	 */

	function trivoo_get_mods() {
		$mods = get_theme_mods();
		return array_merge( trivoo_get_default_mods(), $mods ? $mods : array() );
	}
endif;

if ( !function_exists( 'trivoo_get_mod' ) ):

	/**
	 * Wrapper for wordpress 'get_theme_mod' function
	 *
	 * @return string    The string with the mod value.
	 */

	function trivoo_get_mod( $name ) {
		return get_theme_mod( $name, trivoo_get_default( $name ) );
	}
endif;

if ( !function_exists( 'trivoo_sanitize_float' ) ):

	/**
	 * Sanitize function for WP_Customize setting to sanitize float values
	 *
	 * @return float
	 */

	function trivoo_sanitize_float( $value ) {
		return floatval( $value );
	}
endif;

if ( !function_exists( 'trivoo_sanitize_choice' ) ):

	/**
	 * Sanitize function for WP_Customize setting to sanitize select
	 *
	 * @return string
	 */

	function trivoo_sanitize_choice( $value, $setting ) {
		if ( is_object( $setting ) ) {
			$setting = $setting->id;
		}

		$options = trivoo_get_choices( $setting );

		if ( !in_array( $value, array_keys( $options ) ) ) {
			$value = trivoo_get_default( $setting );
		}

		return $value;
	}
endif;

if ( !function_exists( 'trivoo_sanitize_font_family' ) ):

	/**
	 * Sanitize function for WP_Customize setting to sanitize Font Family
	 *
	 * @return string
	 */

	function trivoo_sanitize_font_family( $value, $setting ) {

		if ( is_object( $setting ) ) {
			$setting = $setting->id;
		}

		if ( !is_string( $value ) || $value === '' ) {
			return '';
		}
		else if ( !in_array( $value, array_keys( trivoo_get_all_fonts( false ) ) ) ) {
				$value = trivoo_get_default( $setting );
			}

		return $value;
	}
endif;

if ( !function_exists( 'trivoo_sanitize_font_variant' ) ):

	/**
	 * Sanitize function for WP_Customize setting to sanitize Font Family Variant
	 *
	 * @return string
	 */

	function trivoo_sanitize_font_variant( $value ) {

		$options = array( "100", "100italic", "200", "200italic", "300", "300italic", "500", "500italic", "600", "600italic", "700", "700italic", "800", "800italic", "900", "900italic", "italic", "regular" );

		if ( !is_string( $value ) || $value === '' ) {
			return 'regular';
		}
		else if ( in_array( $value, $options ) ) {
				return $value;
			}

		return 'regular';
	}
endif;

if ( !function_exists( 'trivoo_sanitize_font_text_transform' ) ):

	/**
	 * Sanitize function for WP_Customize setting to sanitize Font Text Transform
	 *
	 * @return string
	 */

	function trivoo_sanitize_font_text_transform( $value ) {

		$options = array( 'none', 'uppercase', 'lowercase', );

		if ( !is_string( $value ) || $value === '' ) {
			return 'none';
		}
		else if ( in_array( $value, $options ) ) {
				return $value;
			}

		return 'none';
	}
endif;

if ( !function_exists( 'trivoo_get_color_mods' ) ):

	/**
	 * Determine if a mod is a color mod
	 *
	 * @return bool
	 */
	function trivoo_get_color_mods( $mod ) {
		return 0 === strpos( $mod, 'colors_' );
	}
endif;

if ( !function_exists( 'trivoo_get_font_mods' ) ):

	/**
	 * Determine if a mod is a typography mod
	 *
	 * @return bool
	 */
	function trivoo_get_font_mods( $mod ) {
		return 0 === strpos( $mod, 'typography_' );
	}
endif;

if ( !function_exists( 'trivoo_is_font_family' ) ):

	/**
	 * Checks if a given mod is Font Family
	 *
	 * @return bool
	 */
	function trivoo_is_font_family( $mod ) {
		return trivoo_string_ends_with( $mod, 'font_family' ) || trivoo_string_ends_with( $mod, 'font_variant' );
	}
endif;

if ( !function_exists( 'trivoo_string_ends_with' ) ):

	/**
	 * Determine if a string ends with a particulr value
	 *
	 * @return bool
	 */
	function trivoo_string_ends_with( $whole, $end ) {
		return strpos( $whole, $end ) !== false && strpos( $whole, $end, strlen( $whole ) - strlen( $end ) ) !== false;
	}
endif;

if ( !function_exists( 'trivoo_font_settings' ) ):

	/**
	 * Prints the Font styles for a given section
	 *
	 * @return string    CSS Font styles
	 */
	function trivoo_font_settings( $section, $options ) {
?>
  font: <?php
		printf( "%spx '%s'", trivoo_get_default_mod( $section . '_font_size', $options ), trivoo_get_default_mod( $section . '_font_family', $options ) ) ?>;
            line-height: <?php
		echo trivoo_get_default_mod( $section . '_line_height', $options ) === false ? 'inherit' : trivoo_get_default_mod( $section . '_line_height', $options ) . 'em' ?>;
            font-weight: <?php
		$v = trivoo_get_default_mod( $section . '_font_variant', $options );
		echo $v === 'regular' ? 'normal' : preg_replace( '/[^0-9]/', '', $v ); ?>;
            font-style: <?php
		$v = trivoo_get_default_mod( $section . '_font_variant', $options );
		echo strpos( $v, 'italic' ) !== false ? 'italic' : 'normal'; ?>;
            text-transform: <?php
		echo trivoo_get_default_mod( $section . '_text_transform', $options ) ?> ;
            letter-spacing: <?php
		echo trivoo_get_default_mod( $section . '_letter_spacing', $options ) ?>px;
            word-spacing: <?php
		echo trivoo_get_default_mod( $section . '_word_spacing', $options ) ?>px;
  <?php
	}
endif;

?>