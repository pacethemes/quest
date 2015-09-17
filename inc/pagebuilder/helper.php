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
		 * Decodes Page Builder Meta Data if it's encoded, uses `json_decode` and `base64_decode`
		 * @since  1.2.5
		 *
		 * @return string 
		 */
		public static function decode_pb_section_metadata( $meta ) {
			// If the meta is an array we are dealing with non encoded older Meta Data
			if ( is_array( $meta ) ) {
				return $meta;
			}

			// Perform json decode on the meta
			return json_decode( wp_unslash( $meta ), true );
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

			if( !is_array( $meta ) ) {
				return wp_slash( $meta );
			}

			if( defined('JSON_HEX_QUOT') )
				//convert the array to json so that we can save it as a string in the post_meta table
				return wp_slash( json_encode( $meta, JSON_HEX_QUOT | JSON_HEX_APOS | JSON_UNESCAPED_UNICODE ) );

			return wp_slash( json_encode( $meta ) );
		}

	}
endif;