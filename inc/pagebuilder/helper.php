<?php
if ( ! class_exists( 'PT_PageBuilder_Helper' ) ) :
	/**
	 * Helper class for PT_PageBuilder
	 *
	 */
	class PT_PageBuilder_Helper {

		/**
		 * Generates Attributes
		 *
		 * @return string $content
		 */
		public static function GetAttributes( $array, $attributes ) {
			$content = "";

			foreach ( $attributes as $attribute ) {
				if ( array_key_exists( $attribute, $array ) && $array[ $attribute ] !== '' ) {
					$value = esc_attr( $array[ $attribute ] );
					$content .= " $attribute='$value'";
				}
			}

			return $content;
		}

		/**
		 * Generates Data Attributes
		 *
		 * @return string $content
		 */
		public static function GetDataAttributes( $values, $properties ) {
			$content = "";
			foreach ( $properties as $prop ) {
				if ( array_key_exists( $prop, $values ) ) {
					$attr  = str_replace( '_', '-', $prop );
					$value = esc_attr( $values[ $prop ] );
					$content .= " data-$attr='$value'";
				}
			}

			return $content;
		}

		public static function getContent( $module ) {
			return isset( $module['content'] ) ? wp_kses_post( stripslashes( $module['content'] ) ) : "";
		}

		/**
		 * Decodes Page Builder Meta Data if it's encoded, uses `json_decode` and `htmlspecialchars_decode`
		 * @since  1.2.5
		 *
		 * @return array
		 */
		public static function decode_pb_section_metadata( $meta ) {
			// If the meta is an array we are dealing with non encoded older Meta Data
			if ( is_array( $meta ) ) {
				return $meta;
			}

			// Perform json decode on the meta, for unicode characters add extra slashes so that the wp_unslash function doesn't strip them
			$decoded = json_decode( wp_unslash( preg_replace( '/\\\u([0-9a-f]{4})/i', '\\\\\\u$1', $meta ) ), true );

			// Convert quotes (single and double) entities back to quotes
			if ( is_array( $decoded ) ) {
				$decoded = self::normalize_meta_data( $decoded );
			}

			return $decoded;

		}

		/**
		 * Encodes Page Builder Meta Data to json format to handle PHP `serialize` issues with UTF8 characters
		 * WordPress `update_post_meta` serializes the data and in some cases (probably depends on hostng env.)
		 * the serialized data is not being unserialized
		 * Uses `json_encode`
		 *
		 * @since  1.2.5
		 *
		 * @return string
		 */
		public static function encode_pb_section_metadata( $meta ) {

			if ( ! is_array( $meta ) ) {
				return wp_slash( $meta );
			}

			return wp_slash( json_encode( self::sanitize_meta_data( $meta ) ) );
		}

		/**
		 * Sanitizes Page Builder Meta Data
		 * Converts quotes and tags to html entities so that json_encode doesn't have issues
		 * @since  1.2.7
		 *
		 * @return array
		 */
		public static function sanitize_meta_data( $arr ) {
			$result = array();
			foreach ( $arr as $key => $value ) {
				if ( is_array( $value ) ) {
					$value = self::sanitize_meta_data( $value );
				} else if ( $key === 'content' ) {
					// try to unslash first incase the server already escaped quotes
					$value = htmlspecialchars( wp_unslash( $value ), ENT_QUOTES );
				}
				$result[ $key ] = $value;
			}

			return $result;
		}

		/**
		 * Normalizes Page Builder Meta Data
		 * Converts quotes and tags html entities back to their original state
		 * @since  1.2.7
		 *
		 * @return array
		 */
		public static function normalize_meta_data( $arr ) {
			$result = array();
			foreach ( $arr as $key => $value ) {
				if ( is_array( $value ) ) {
					$value = self::normalize_meta_data( $value );
				} else if ( $key === 'content' ) {
					$value = htmlspecialchars_decode( $value, ENT_QUOTES );
				}
				$result[ $key ] = $value;
			}

			return $result;
		}

	}
endif;