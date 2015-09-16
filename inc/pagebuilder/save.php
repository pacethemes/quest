<?php

if ( ! class_exists( 'PT_PageBuilder_Save' ) ) :
	/**
	 * PT_PageBuilder_Save class provides functionality to generate HTML markup based on the sections & modules built using the Page Builder
	 */
	class PT_PageBuilder_Save {

		// Hold an instance of the class
		private static $instance;

		//Holds the prepared sections posted by Page Builder
		private $_sections;


		public function __construct() {
			//If the template is set to Page Builder then save the Pagebuilder Meta and create content based on the meta
			if ( isset( $_POST['page_template'] ) && $_POST['page_template'] === 'page-builder.php' &&
			     isset( $_POST['pt-pb-nonce'] ) && isset( $_POST['pt_pb_section'] ) && wp_verify_nonce( $_POST['pt-pb-nonce'], 'save' )
			) {
				// Save the post's meta data
				add_action( 'save_post', array( $this, 'SavePost' ), 10, 2 );

				// Combine the input into the post's content
				add_filter( 'wp_insert_post_data', array( $this, 'InsertPostData' ), 30, 2 );

				/**
				 * Add filters to generate Page Builder content, this lets users override any section/module markup generation
				 *
				 * Since 1.1.2
				 */
				add_filter( 'pt_pb_generate_section', array( $this, 'generateSection' ), 10, 2 );
				add_filter( 'pt_pb_generate_row', array( $this, 'generateRow' ), 10, 3 );
				add_filter( 'pt_pb_generate_column', array( $this, 'generateColumn' ), 10, 2 );
				add_filter( 'pt_pb_generate_gallery', array( $this, 'generateGallery' ), 10, 2 );
				add_filter( 'pt_pb_generate_slider', array( $this, 'generateSlider' ), 10, 2 );
				add_filter( 'pt_pb_generate_slide', array( $this, 'generateSlide' ), 10, 2 );
				add_filter( 'pt_pb_generate_gallery_image', array( $this, 'generateImage' ), 10, 2 );

			}
		}

		/**
		 * Returns an instance of the PT_PageBuilder_Save class, creates one if an instance doesn't exist. Implements Singleton pattern
		 *
		 * @return PT_PageBuilder_Save
		 */
		public static function getInstance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Updates Post Meta key 'pt_pb_sections' with the prepared sections array
		 *
		 * @return void
		 */
		public function SavePost( $post_id, $post ) {
			// Don't do anything during autosave
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}

			update_post_meta( $post_id, 'pt_pb_sections', PT_PageBuilder_Helper::encode_pb_section_metadata( $this->_sections ) );

		}

		/**
		 * Updates Post Content with the HTML markup generated based on the sections/modules built by the user using Page Builder
		 *
		 * @return $postarr
		 */
		public function InsertPostData( $data, $postarr ) {

			// Don't do anything during autosave
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}

			if ( ! isset( $postarr['pt_pb_section'] ) ) {
				return $data;
			}

			$this->_sections = $this->prepareSections( $postarr['pt_pb_section'] );

			/**
			 * Custom action before updating page content
			 *
			 * Since 1.1.2
			 */
			do_action( 'pt_pb_insert_post_data', $postarr, $this->_sections );

			$data['post_content'] = $this->generatePostContent();

			return $data;
		}

		/**
		 * Prepares Sections by sorting all columns and sliders within
		 *
		 * @return array $sorted
		 */
		private function prepareSections( $sections ) {
			$sorted = array();
			foreach ( $sections as $key => $section ) {
				if ( $section == '' || empty( $section ) || ! is_array( $section ) ) {
					continue;
				}
				//If the columns are not set or the current iteration is not a section then we dont have to sort the columns
				if ( array_key_exists( 'row', $section ) ) {
					$sorted[] = $this->sortRows( $section );
				} else {
					$sorted[] = $section;
				}
			}

			return $sorted;
		}

		/**
		 * Sorts rows in the order they are submitted and returns the sorted section
		 *
		 * @return array $section
		 */
		private function sortRows( $section ) {

			$sorted = array();

			foreach ( $section['row'] as $row ) {

				//If the columns are not set or the current iteration is not a proper row then we dont have to sort the rows
				if ( array_key_exists( 'col', $row ) ) {
					$sorted[] = $this->sortColumns( $row );
				} elseif ( array_key_exists( 'slider', $row ) ) {
					$sorted[] = $this->sortSlides( $row );
				} else {
					$sorted[] = $row;
				}

			}

			$section['row'] = $sorted;

			return $section;
		}

		/**
		 * Sorts columns in the order they are submitted and returns the sorted section
		 *
		 * @return array $section
		 */
		private function sortColumns( $section ) {

			$columns = array();

			foreach ( $section['col'] as $column ) {
				$column    = $this->_sanitizeColumn( $column );
				$columns[] = apply_filters( 'quest_sort_modules', $column );
			}

			$section['col'] = $columns;

			return $section;
		}

		/**
		 * Sorts slides and returns sorted slides
		 *
		 * @return array $section
		 */
		private function sortSlides( $section ) {

			$slides = array();

			foreach ( $section['slider'] as $k => $slide ) {
				$key            = is_numeric( $k ) ? ( count( $slides ) + 1 ) : $k;
				$slides[ $key ] = $slide;
			}

			$section['slider'] = $slides;

			return $section;
		}

		/**
		 * Iterates through each column/slide/modules in the section and generates section content
		 *
		 * @return string $content
		 */
		public function generateSection( $sectionHtml, $section ) {

			$css       = $this->_getCssProperties( $section );
			$cssClass  = isset( $section['css_class'] ) ? $section['css_class'] : "";
			$container = ( isset( $section['content_type'] ) && $section['content_type'] === 'fluid' ) ? 'container-fluid' : 'container';

			$content = "<section class='quest-row $cssClass' style='$css' id='{$section['id']}' > ";

			if ( array_key_exists( 'row', $section ) && ! empty( $section['row'] ) ) {
				foreach ( $section['row'] as $row ) {
					/**
					 * Filter Row markup
					 *
					 * Since 1.1.2
					 */
					$content .= apply_filters( "pt_pb_generate_row", '', $row, $container );
				}
			}

			$content .= "</section>\n";

			return $content;
		}

		/**
		 * Generates Row markup
		 *
		 * @return string $content
		 */
		public function generateRow( $rowHtml, $row, $container ) {

			$addRow  = ! ( array_key_exists( 'slider', $row ) && $container !== 'container' );
			$valign  = $row['vertical_align'] === 'default' ? '' : " v-align-{$row['vertical_align']}";
			$content = "";

			if ( $addRow ) {
				$content .= "\n\t <div class='$container'> \n\t\t <div class='row$valign' style='" . $this->_getCssProperties( $row ) . "'> \n";
			}

			if ( array_key_exists( 'col', $row ) && ! empty( $row['col'] ) ) {

				foreach ( $row['col'] as $col ) {
					/**
					 * Filter Column markup
					 *
					 * Since 1.1.2
					 */
					$content .= apply_filters( "pt_pb_generate_column", '', $col );
				}

			} else if ( array_key_exists( 'gallery', $row ) && ! empty( $row['gallery'] ) ) {

				/**
				 * Filter Gallery markup
				 *
				 * Since 1.1.2
				 */
				$content .= apply_filters( "pt_pb_generate_gallery", '', $row['gallery'] );

			} else if ( array_key_exists( 'slider', $row ) && ! empty( $row['slider'] ) ) {

				/**
				 * Filter Slider markup
				 *
				 * Since 1.1.2
				 */
				$content .= apply_filters( "pt_pb_generate_slider", '', $row['slider'] );

			}


			if ( $addRow ) {
				$content .= "\t\t </div> \n\t </div> \n";
			}

			return $content;
		}

		/**
		 * Generates Column markup
		 *
		 * @return string $content
		 */
		public function generateColumn( $columnHtml, $column ) {

			if ( ! isset( $column['type'] ) ) {
				return '';
			}

			$cssClass = $this->_getColumnClass( $column['type'] );
			$content  = "\t\t\t<div class='$cssClass'>\n\t\t\t\t";

			if ( isset( $column['module'] ) && ! empty( $column['module'] ) ) {
				foreach ( $column['module'] as $module ) {
					$content .= $this->generateModule( $module );
				}
			}

			$content .= "\n\t\t\t</div>\n";

			return $content;
		}

		/**
		 * Generates Module markup. Checks if a class exists which handles the Module Markup Generation, if it exists invokes the class and generates the content
		 *
		 * @return string
		 */
		private function generateModule( $module ) {

			if ( ! isset( $module['type'] ) || empty( $module['type'] ) ) {
				return '';
			}

			$cls = "PT_PageBuilder_" . ucwords( $module['type'] ) . "_Module";
			if ( ! class_exists( $cls ) ) {
				return "";
			}

			$handler = new $cls ( $module );

			return $handler->getContent();

		}

		/**
		 * Generates Slider markup
		 * Iterates through all slides and invokes the generateSlide method to generate slide specific markup
		 *
		 * @return string $content
		 */
		public function generateSlider( $sliderHtml, $slider ) {
			$content = "<div class='sl-slider-wrapper {$slider['css_class']}' style='" . $this->_getCssProperties( $slider ) . "'" .
			           PT_PageBuilder_Helper::GetDataAttributes( $slider, array(
				           'autoplay',
				           'interval',
				           'speed',
				           'animation'
			           ) ) . "><div class='sl-slider'>";
			foreach ( $slider as $slide ) {
				if ( ! is_array( $slide ) ) {
					continue;
				}

				/**
				 * Filter Slide markup
				 *
				 * Since 1.1.2
				 */
				$content .= apply_filters( "pt_pb_generate_slide", '', $slide );
			}
			$content .= "</div>";
			$content .= '<nav class="slit-nav-buttons">
						<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
						<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
					</nav>
					</div>';

			return $content;
		}

		/**
		 * Generates Slide markup
		 *
		 * @return string $content
		 */
		public function generateSlide( $slideHtml, $slide ) {

			$cls = isset( $slide['content_pos_x'] ) ? "content-x-{$slide['content_pos_x']} " : '';
			$cls .= isset( $slide['content_pos_y'] ) ? "content-y-{$slide['content_pos_y']} " : '';
			$cls .= $slide['css_class'];


			$content = "<div class='sl-slide $cls'" .
			           PT_PageBuilder_Helper::GetDataAttributes( $slide, array(
				           'orientation',
				           'slice1_rotation',
				           'slice2_rotation',
				           'slice1_scale',
				           'slice2_scale'
			           ) ) . "><div class='sl-slide-inner'>";

			$content .= "<div class='sl-slide-inner' style='" . $this->_getCssProperties( $slide ) . "'>";

			$content .= "<div class='sl-slide-content'>";

			if ( ! empty( $slide['heading'] ) ) :

				$content .= "<h2 class='sl-slide-title' style='" . $this->_getCssProperties( array(
						'text_color' => $slide['heading_color'],
						'text_size'  => $slide['heading_size']
					) ) . "'> <span style='" . $this->_getCssProperties( array(
						'bg_color' => $slide['heading_bg_color'],
					) ) . "'>" . $slide['heading'] . "</span></h2>";

			endif;

			$content .= "<div class='sl-slide-text' style='" . $this->_getCssProperties( array(
					'text_color' => $slide['text_color'],
					'text_size'  => $slide['text_size']
				) ) . "'> <span style='" . $this->_getCssProperties( array(
					'bg_color' => $slide['text_bg_color'],
				) ) . "'>" . PT_PageBuilder_Helper::getContent( $slide ) . "</span></div></div>";

			$content .= "</div></div></div>\n";

			return $content;
		}

		/**
		 * Generates Slider markup
		 * Iterates through all slides and invokes the generateSlide method to generate slide specific markup
		 *
		 * @return string $content
		 */
		public function generateGallery( $galleryHtml, $gallery ) {
			$padding = $gallery['padding'] === 'no' ? ' no-pad' : '';
			$content = "<div class='quest-gallery clearfix {$gallery['shape']} {$gallery['columns']}-col$padding {$gallery['css_class']}'>";
			foreach ( $gallery as $image ) {
				if ( ! is_array( $image ) ) {
					continue;
				}

				if ( $image['post_id'] != '' && is_numeric( $image['post_id'] ) ) {

					/**
					 * Filter Image markup
					 *
					 * Since 1.1.2
					 */
					$content .= apply_filters( "pt_pb_generate_gallery_image", '', $image );
				}
			}
			$content .= "</div>";

			return $content;
		}

		/**
		 * Generates Gallery Image markup
		 *
		 * @return string $content
		 */
		public function generateImage( $imageHtml, $image ) {
			$link        = esc_url( $image['href'] ) == '' ? $image['src'] : esc_url( $image['href'] );
			$gallery_cls = empty( $image['href'] ) ? 'gallery' : '';
			$content     = "<div class='quest-gallery-thumb-wrap'>
							<a href='$link' class='quest-gallery-thumb $gallery_cls' title='{$image['desc']}' data-gallery=''>" .
			               wp_get_attachment_image( $image['post_id'], 'quest-gallery' ) .
			               "<span class='overlay'><i class='fa fa-expand'></i>
									<div class='image-title'>{$image['title']}</div>
								</span>
							</a>
						</div>";

			return $content;
		}

		/**
		 * Iterates through each section and generates section content
		 *
		 * @return string $content
		 */
		private function generatePostContent() {
			if ( $this->_sections === '' || empty( $this->_sections ) ) {
				return '';
			}

			$content = "";

			foreach ( $this->_sections as $key => $section ) {

				/**
				 * Filter Section markup
				 *
				 * Since 1.1.2
				 */
				$content .= apply_filters( "pt_pb_generate_section", '', $section );
			}

			return $content;

		}

		/**
		 * Sanitizes a Column
		 *
		 * @return array $column
		 */
		private function _sanitizeColumn( $column ) {

			if ( isset( $column['module'] ) && is_array( $column['module'] ) ) {
				foreach ( $column['module'] as $name => $value ) {

					$column['module'][ $name ] = $this->_sanitizeValue( $name, $value );

					if ( isset( $column['module']['items'] ) && is_array( $column['module']['items'] ) ) {
						foreach ( $column['module']['items'] as $ind => $item ) {
							foreach ( $item as $k => $v ) {
								$item[ $k ] = $this->_sanitizeValue( $k, $v );
							}
							$column['module']['items'][ $ind ] = $item;
						}

					}
				}
			}

			return $column;
		}

		/**
		 * Sanitizes any value based on type
		 *
		 * @return mixed $value
		 */
		private function _sanitizeValue( $name, $value ) {

			if ( strpos( $name, 'url' ) !== false ) {
				$value = esc_url( $value );
			} else if ( strpos( $name, 'content' ) !== false ) {
				$value = $value;
			} else if ( strpos( $name, 'color' ) !== false ) {
				$value = $this->_sanitizeColor( $value );
			}

			return $value;
		}

		/**
		 * Sanitizes hex color
		 *
		 * @return string $color
		 */
		private function _sanitizeColor( $color ) {
			if ( '' === $color ) {
				return '';
			}

			// 3 or 6 hex digits, or the empty string.
			// Updated to match rgba string
			if ( preg_match( '/^(#([A-Fa-f0-9]{3}){1,2})|(rgba\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3}),\s*(\d*(?:\.\d+)?)\))$/', $color ) ) {
				return $color;
			}

			return null;
		}

		/**
		 * Returns Bootstrap class based on the column type
		 *
		 * @return string
		 */
		private function _getColumnClass( $type ) {
			$cls = '';
			switch ( $type ) {
				case '1-1':
					$cls = 'col-md-12';
					break;

				case '1-2':
					$cls = 'col-md-6';
					break;

				case '1-3':
					$cls = 'col-md-4';
					break;

				case '1-4':
					$cls = 'col-md-3';
					break;

				default:
					$cls = apply_filters( 'pt_pb_get_column_class', $cls, $type );
					break;
			}

			return $cls;
		}

		/**
		 * Generates CSS Properties for a section
		 *
		 * @return string
		 */
		public function _getCssProperties( $section ) {
			$css = array(
				'bg_image'            => 'background-image',
				'bg_attach'           => 'background-attachment',
				'bg_color'            => 'background-color',
				'text_color'          => 'color',
				'padding_top'         => 'padding-top',
				'padding_bottom'      => 'padding-bottom',
				'border_top_width'    => 'border-top-width',
				'border_bottom_width' => 'border-bottom-width',
				'border_top_color'    => 'border-top-color',
				'border_bottom_color' => 'border-bottom-color',
				'height'              => 'height',
				'bg_pos_x'            => 'background-position-x',
				'bg_pos_y'            => 'background-position-y',
				'text_size'           => 'font-size'
			);

			$properties = array();

			foreach ( $section as $prop => $value ) {
				if ( ! array_key_exists( $prop, $css ) || trim( $value ) === '' ) {
					continue;
				}

				if ( $prop == 'bg_image' ) {
					$properties[] = "$css[$prop]:url($value)";
				} else {
					$properties[] = "$css[$prop]:$value";
				}
			}

			return esc_attr( implode( '; ', $properties ) );

		}

	}

endif;

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
			return json_decode( $meta );
		}

		/**
		 * Encodes Page Builder Meta Data to base64 format to handle PHP `serialize` issues with UTF8 characters
		 * WordPress `update_post_meta` serializes the data and in some cases (probably depends on hostng env.)
		 * the serialized data is not being unserialized. So we convert the Meta Data into base64 and then serialize it
		 * Uses `json_encode` and `base64_encode`
		 *
		 * @since  1.2.5
		 *
		 * @return string 
		 */
		public static function encode_pb_section_metadata( $meta ) {

			//convert the array to json so that we can save it as a string in the post_meta table
			return wp_slash( json_encode( $meta ) );
		}

	}
endif;

if ( ! class_exists( 'PT_PageBuilder_Image_Module' ) ) :
	/**
	 * Class to handle HTML generation for Image Module
	 *
	 */
	class PT_PageBuilder_Image_Module {

		private $_module;

		public function __construct( $module ) {
			$this->_module = $module;
		}

		public function getContent() {
			$image   = $this->_module;
			$mb      = isset( $this->_module['margin_bottom'] ) ? $this->_module['margin_bottom'] : $this->_module['padding_bottom'];
			$content = "<figure style='text-align:{$image['align']};margin-bottom:$mb;'>";

			$image['class'] = $image['animation'] != '' ? "wow {$image['animation']}" : "";

			if ( $image['lightbox'] == 'true' || $image['href'] !== '' ) {
				$content .= "<a" . PT_PageBuilder_Helper::GetAttributes( $image, array( 'target' ) );
				$content .= $image['lightbox'] == 'true' ? " href='{$image['src']}'" : " href='" . esc_url( $image['href'] ) . "'";
				$content .= $image['lightbox'] == 'true' ? " class='lightbox gallery'>" : '>';
			}

			$content .= "<img" . PT_PageBuilder_Helper::GetAttributes( $image, array(
					'src',
					'title',
					'alt',
					'class'
				) ) . " />";

			if ( $image['lightbox'] == 'true' || $image['href'] !== '' ) {
				$content .= "</a>";
			}

			$content .= "</figure>";

			return $content;
		}

	}
endif;

if ( ! class_exists( 'PT_PageBuilder_Text_Module' ) ) :
	/**
	 * Class to handle HTML generation for Text Module
	 *
	 */
	class PT_PageBuilder_Text_Module {

		private $_module;

		public function __construct( $module ) {
			$this->_module = $module;
		}

		public function getContent() {
			$cls = $this->_module['animation'] != '' ? " wow {$this->_module['animation']}" : "";
			$mb  = isset( $this->_module['margin_bottom'] ) ? $this->_module['margin_bottom'] : $this->_module['padding_bottom'];

			return "<div class='module-text$cls' style='margin-bottom:$mb;'>" . PT_PageBuilder_Helper::getContent( $this->_module ) . "</div>";
		}

	}
endif;

if ( ! class_exists( 'PT_PageBuilder_Hovericon_Module' ) ) :
	/**
	 * Class to handle HTML generation for Hover Icon Module
	 *
	 */
	class PT_PageBuilder_Hovericon_Module {

		private $_module;

		public function __construct( $module ) {
			$this->_module = $module;
		}

		public function getContent() {
			$cls       = $this->_module['animation'] != '' ? " wow {$this->_module['animation']}" : "";
			$color     = $this->_module['color'];
			$color_alt = $this->_module['hover_color'];
			$content   = PT_PageBuilder_Helper::getContent( $this->_module );
			$url       = esc_url( $this->_module['href'] );
			$mb        = isset( $this->_module['margin_bottom'] ) ? $this->_module['margin_bottom'] : $this->_module['padding_bottom'];

			return "<div class='hover-icon$cls' id='{$this->_module['id']}' style='margin-bottom:$mb;'>
					<a href='$url' class='fa fa-{$this->_module['size']}x {$this->_module['icon']}'>&nbsp;</a><h3 class='icon-title'>{$this->_module['title']}</h3>{$content}
				</div>";
		}

	}
endif;

/**
 * Returns instance of PT_PageBuilder_Save
 *
 * @return PT_PageBuilder_Save
 */
function pt_pb_get_builder_save() {
	return PT_PageBuilder_Save::getInstance();
}

//Hook into admin_init and create an instance of PT_PageBuilder_Save to initialize Page Builder Save Methods
add_action( 'admin_init', 'pt_pb_get_builder_save' );

