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
		public static function generate_attr( $array, $attributes ) {
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
		public static function generate_data_attr( $values, $properties ) {
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

		/**
		 * Generates CSS Properties for a array
		 *
		 * @return string
		 */
		public static function generate_css( $arr ) {
			$css = array(
				'bg_image'            => 'background-image',
				'bg_attach'           => 'background-attachment',
				'bg_color'            => 'background-color',
				'text_color'          => 'color',
				'padding_top'         => 'padding-top',
				'padding_bottom'      => 'padding-bottom',
				'padding_left'        => 'padding-left',
				'padding_right'       => 'padding-right',
				'margin_top'          => 'margin-top',
				'margin_bottom'       => 'margin-bottom',
				'border_top_width'    => 'border-top-width',
				'border_bottom_width' => 'border-bottom-width',
				'border_top_color'    => 'border-top-color',
				'border_bottom_color' => 'border-bottom-color',
				'border_left_width'   => 'border-left-width',
				'border_right_width'  => 'border-right-width',
				'border_left_color'   => 'border-left-color',
				'border_right_color'  => 'border-right-color',
				'height'              => 'height',
				'bg_pos_x'            => 'background-position-x',
				'bg_pos_y'            => 'background-position-y',
				'text_size'           => 'font-size'
			);

			$properties = array();

			foreach ( $arr as $prop => $value ) {
				if ( ! array_key_exists( $prop, $css ) || trim( $value ) === '' ) {
					continue;
				}

				if ( $prop == 'bg_image' ) {
					$url = esc_url( $value );
					$properties[] = "$css[$prop]:url($url)";
				} else {
					$properties[] = "$css[$prop]:$value";
				}
			}

			return esc_attr( implode( '; ', $properties ) );

		}

		/**
		 * strips slashes for HTML content in a module
		 *
		 * @return string
		 */
		public static function get_content( $module ) {
			return isset( $module['content'] ) ? stripslashes( $module['content'] ) : "";
		}

		/**
		 * Decodes Page Builder Meta Data if it's encoded, uses `json_decode` and `htmlspecialchars_decode`
		 * @since  1.2.5
		 *
		 * @return array
		 */
		public static function decode_pb_metadata( $meta ) {
			// If the meta is an array we are dealing with non encoded older Meta Data
			if ( is_array( $meta ) ) {
				return $meta;
			}

			// Escape the slash characters as we will unslash before decoding
			$meta = addcslashes($meta, '\\');

			// Perform json decode on the meta, for unicode characters add extra slashes so that the wp_unslash function doesn't strip them
			$decoded = json_decode( wp_unslash( $meta ), true );

			// Convert quotes (single and double) entities back to quotes
			if ( is_array( $decoded ) ) {
				$decoded = self::normalize_metadata( $decoded );
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
		public static function encode_pb_metadata( $meta ) {

			if ( ! is_array( $meta ) ) {
				return wp_slash( $meta );
			}

			return wp_slash( json_encode( self::sanitize_metadata( $meta ) ) );
		}

		/**
		 * Sanitizes Page Builder Meta Data
		 * Converts quotes and tags to html entities so that json_encode doesn't have issues
		 * @since  1.2.7
		 *
		 * @return array
		 */
		public static function sanitize_metadata( $arr ) {
			$result = array();
			foreach ( $arr as $key => $value ) {
				if ( is_array( $value ) ) {
					$value = self::sanitize_metadata( $value );
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
		public static function normalize_metadata( $arr ) {
			$result = array();
			foreach ( $arr as $key => $value ) {
				if ( is_array( $value ) ) {
					$value = self::normalize_metadata( $value );
				} else if ( $key === 'content' ) {
					$value = htmlspecialchars_decode( $value, ENT_QUOTES );
				}
				$result[ $key ] = $value;
			}

			return $result;
		}

	}
endif;