<?php

if ( ! class_exists( 'PT_PageBuilder_Save' ) ) :
	/**
	 * PT_PageBuilder_Save class provides functionality to generate HTML markup based on the sections & modules built using the Page Builder
	 */
	class PT_PageBuilder_Save {

		// Hold an instance of the class
		private static $instance;

		//Holds the prepared sections posted by Page Builder
		private $_sections = array();


		public function __construct() {
			//If the template is set to Page Builder then save the Pagebuilder Meta and create content based on the meta
			if ( isset( $_POST['page_template'] ) && $_POST['page_template'] === 'page-builder.php' &&
			     isset( $_POST['pt-pb-nonce'] ) && isset( $_POST['pt_pb_section'] ) && wp_verify_nonce( $_POST['pt-pb-nonce'], 'save' )
			) {
				// Save the post's meta data
				add_action( 'save_post', array( $this, 'save_pb_meta' ), 10, 2 );

				// Combine the input into the post's content
				add_filter( 'wp_insert_post_data', array( $this, 'insert_post_data' ), 30, 2 );

				/**
				 * Add filters to generate Page Builder content, this lets users override any section/module markup generation
				 *
				 * Since 1.1.2
				 */
				add_filter( 'pt_pb_generate_section', array( $this, 'generate_section' ), 10, 2 );
				add_filter( 'pt_pb_generate_row', array( $this, 'generate_row' ), 10, 3 );
				add_filter( 'pt_pb_generate_column', array( $this, 'generate_column' ), 10, 2 );
				add_filter( 'pt_pb_generate_gallery', array( $this, 'generate_gallery' ), 10, 2 );
				add_filter( 'pt_pb_generate_slider', array( $this, 'generate_slider' ), 10, 2 );
				add_filter( 'pt_pb_generate_slide', array( $this, 'generate_slide' ), 10, 2 );
				add_filter( 'pt_pb_generate_generic_slider', array( $this, 'generate_generic_slider' ), 10, 2 );
				add_filter( 'pt_pb_generate_gallery_image', array( $this, 'generate_image' ), 10, 2 );

			}
		}

		/**
		 * Returns an instance of the PT_PageBuilder_Save class, creates one if an instance doesn't exist. Implements Singleton pattern
		 *
		 * @return PT_PageBuilder_Save
		 */
		public static function get_instance() {
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
		public function save_pb_meta( $post_id, $post ) {
			// Don't do anything during autosave
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}
			update_post_meta( $post_id, 'pt_pb_sections', $this->get_sections( true ) );

		}

		/**
		 * Updates Post Content with the HTML markup generated based on the sections/modules built by the user using Page Builder
		 *
		 * @return $postarr
		 */
		public function insert_post_data( $data, $postarr ) {

			// Don't do anything during autosave
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}

			if ( ! isset( $postarr['pt_pb_section'] ) ) {
				return $data;
			}

			/**
			 * Custom action before updating page content
			 *
			 * Since 1.1.2
			 */
			do_action( 'pt_pb_insert_post_data', $postarr, $this->get_sections() );
			
			$data['post_content'] = $this->generate_post_content();

			return $data;
		}

		private function get_sections( $encode = false ){
			if ( empty( $this->_sections ) && isset( $_POST['pt_pb_section'] ) ) {
				$this->_sections = $this->prepare_sections( $_POST['pt_pb_section'] );
			}

			if( $encode ) {
				return PT_PageBuilder_Helper::encode_pb_metadata( $this->_sections );
			}

			return $this->_sections;
		}

		/**
		 * Prepares Sections by sorting all columns and sliders within
		 *
		 * @return array $sorted
		 */
		private function prepare_sections( $sections ) {
			$sorted = array();
			foreach ( $sections as $key => $section ) {
				if ( $section == '' || empty( $section ) || ! is_array( $section ) ) {
					continue;
				}
				//If the columns are not set or the current iteration is not a section then we dont have to sort the columns
				if ( array_key_exists( 'row', $section ) ) {
					$sorted[] = $this->sort_rows( $section );
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
		private function sort_rows( $section ) {

			$sorted = array();

			foreach ( $section['row'] as $row ) {

				//If the columns are not set or the current iteration is not a proper row then we dont have to sort the rows
				if ( array_key_exists( 'col', $row ) ) {
					$sorted[] = $this->sort_columns( $row );
				} elseif ( array_key_exists( 'slider', $row ) ) {
					$sorted[] = $this->sort_slides( $row );
				} elseif ( array_key_exists( 'gallery', $row ) ) {
					$sorted[] = $this->sort_gallery( $row );
				} else {
					$sorted[] = $row;
				}

			}

			$section['row'] = $sorted;

			return $section;
		}

		/**
		 * Sorts columns in the order they are submitted and returns the sorted row
		 *
		 * @return array $row
		 */
		private function sort_columns( $row ) {

			$columns = array();

			foreach ( $row['col'] as $column ) {
				$column    = $this->sanitize_column( $column );
				$columns[] = $this->sort_modules( $column );
			}

			$row['col'] = $columns;

			return $row;
		}

		/**
		 * Sorts modules in the order they are submitted and returns the sorted column
		 *
		 * @return array $column
		 */
		private function sort_modules( $column ) {

			$modules = array();

			if( array_key_exists( 'module', $column ) && is_array( $column['module'] ) ) {

				foreach ( $column['module'] as $module ) {
					$modules[] = apply_filters( 'quest_sort_items', $module );
				}

				$column['module'] = $modules;
			}

			return $column;
		}

		/**
		 * Sorts slides and returns sorted slides
		 *
		 * @return array $row
		 */
		private function sort_slides( $row ) {

			$slides = array();

			foreach ( $row['slider'] as $k => $slide ) {
				$key            = is_numeric( $k ) ? ( count( $slides ) + 1 ) : $k;
				$slides[ $key ] = $slide;
			}

			$row['slider'] = $slides;

			return $row;
		}

		/**
		 * Sorts Gallery Images and returns sorted gallery
		 *
		 * @return array $row
		 */
		private function sort_gallery( $row ) {

			$images = array();

			foreach ( $row['gallery'] as $k => $image ) {
				$key            = is_numeric( $k ) ? ( count( $images ) + 1 ) : $k;
				$images[ $key ] = $image;
			}

			$row['gallery'] = $images;

			return $row;
		}

		/**
		 * Iterates through each column/slide/modules in the section and generates section content
		 *
		 * @return string $content
		 */
		public function generate_section( $section_html, $section ) {

			$css       = PT_PageBuilder_Helper::generate_css( $section );
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
		public function generate_row( $row_html, $row, $container ) {

			$container = $row['content_type'] === 'parent' ? $container 
													: ( $row['content_type'] === 'fluid' ? 'container-fluid' : 'container' );

			$addRow  = ! ( ( array_key_exists( 'slider', $row ) || array_key_exists( 'generic_slider', $row ) ) && $container !== 'container' );
			$valign  = $row['vertical_align'] === 'default' ? '' : "v-align-{$row['vertical_align']}";
			$gutter  = $row['gutter'] === 'no' ? 'no-gutter' : '';
			$content = "";

			if ( $addRow ) {
				$content .= "\n\t <div class='$container'> \n\t\t <div class='row $valign $gutter' style='" . PT_PageBuilder_Helper::generate_css( $row ) . "'> \n";
			} else if ( array_key_exists( 'slider', $row ) ) {
				$row['slider']['margin_bottom'] = $row['padding_bottom'];
				$row['slider']['margin_top'] = $row['padding_top'];
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

			} else if ( array_key_exists( 'generic_slider', $row ) && ! empty( $row['generic_slider'] ) ) {

				/**
				 * Filter Generic Slider markup
				 *
				 * Since 1.3.0
				 */
				$content .= apply_filters( "pt_pb_generate_generic_slider", '', $row['generic_slider'] );

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
		public function generate_column( $column_html, $column ) {

			if ( ! isset( $column['type'] ) ) {
				return '';
			}

			$cssClass = $this->get_column_class( $column['type'] );
			$content  = "\t\t\t<div class='$cssClass' style='" . PT_PageBuilder_Helper::generate_css( $column ) . "'>\n\t\t\t\t";
			$content .= "<div class='quest-col-wrap'>";

			if ( isset( $column['module'] ) && ! empty( $column['module'] ) ) {
				foreach ( $column['module'] as $module ) {
					$cls      = ( array_key_exists( 'animation', $module ) && $module['animation'] != '' )  ? " wow {$module['animation']}" : "";
					$content .= "<div class='quest-module-wrap $cls' style='" . PT_PageBuilder_Helper::generate_css( $module ) . "'>";
					$content .= $this->generate_module( $module );
					$content .= '</div>';
				}
			}

			$content .= "\n\t\t\t</div></div>\n";

			return $content;
		}

		/**
		 * Generates Module markup. Checks if a class exists which handles the Module Markup Generation, if it exists invokes the class and generates the content
		 *
		 * @return string
		 */
		private function generate_module( $module ) {

			if ( ! isset( $module['type'] ) || empty( $module['type'] ) ) {
				return '';
			}

			$cls = "PT_PageBuilder_" . ucwords( $module['type'] ) . "_Module";
			if ( ! class_exists( $cls ) ) {
				return "";
			}

			$handler = new $cls ( $module );

			return $handler->get_content();

		}

		/**
		 * Generates Slider markup
		 * Iterates through all slides and invokes the generate_slide method to generate slide specific markup
		 *
		 * @return string $content
		 */
		public function generate_slider( $slider_html, $slider ) {
			$content = "<div class='sl-slider-wrapper {$slider['css_class']}' style='" . PT_PageBuilder_Helper::generate_css( $slider ) . "'" .
			           PT_PageBuilder_Helper::generate_data_attr( $slider, array(
				           'autoplay',
				           'interval',
				           'speed',
				           'fullscreen',
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
		public function generate_slide( $slide_html, $slide ) {

			$cls = isset( $slide['content_pos_x'] ) ? "content-x-{$slide['content_pos_x']} " : '';
			$cls .= isset( $slide['content_pos_y'] ) ? "content-y-{$slide['content_pos_y']} " : '';
			$cls .= $slide['css_class'];


			$content = "<div class='sl-slide $cls'" .
			           PT_PageBuilder_Helper::generate_data_attr( $slide, array(
				           'orientation',
				           'slice1_rotation',
				           'slice2_rotation',
				           'slice1_scale',
				           'slice2_scale'
			           ) ) . "><div class='sl-slide-inner'>";

			$content .= "<div class='sl-slide-inner' style='" . PT_PageBuilder_Helper::generate_css( $slide ) . "'>";

			$content .= "<div class='sl-slide-content'>";

			if ( ! empty( $slide['heading'] ) ) :

				$content .= "<h2 class='sl-slide-title' style='" . PT_PageBuilder_Helper::generate_css( array(
						'text_color' => $slide['heading_color'],
						'text_size'  => $slide['heading_size']
					) ) . "'> <span style='" . PT_PageBuilder_Helper::generate_css( array(
						'bg_color' => $slide['heading_bg_color'],
					) ) . "'>" . $slide['heading'] . "</span></h2>";

			endif;

			$content .= "<div class='sl-slide-text' style='" . PT_PageBuilder_Helper::generate_css( array(
					'text_color' => $slide['text_color'],
					'text_size'  => $slide['text_size']
				) ) . "'> <span style='" . PT_PageBuilder_Helper::generate_css( array(
					'bg_color' => $slide['text_bg_color'],
				) ) . "'>" . PT_PageBuilder_Helper::get_content( $slide ) . "</span></div></div>";

			$content .= "</div></div></div>\n";

			return $content;
		}

		/**
		 * Generates Generic Slider markup
		 *
		 * @return string $content
		 */
		public function generate_generic_slider( $slider_html, $slider ) {
			if( isset( $slider['slider_id'] ) && !empty( $slider['slider_id'] ) ) {
				$content = "<div class='{$slider['type']}-slider-wrapper {$slider['css_class']}'>";
				$cb_func = "quest_{$slider['type']}_slider_shortcode";
				if( function_exists( $cb_func ) ) {
					$content .= call_user_func( $cb_func, $slider['slider_id'] );
				}
				$content .= '</div>';
				return $content;
			}
			return '';
		}

		/**
		 * Generates Slider markup
		 * Iterates through all slides and invokes the generate_slide method to generate slide specific markup
		 *
		 * @return string $content
		 */
		public function generate_gallery( $gallery_html, $gallery ) {
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
		public function generate_image( $image_html, $image ) {
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
		private function generate_post_content() {
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
		private function sanitize_column( $column ) {

			if ( isset( $column['module'] ) && is_array( $column['module'] ) ) {
				foreach ( $column['module'] as $ind => $module ) {
					foreach( $module as $name => $value ) {
						if( $name === 'items' )
							continue;
						$module[ $name ] = $this->sanitize_value( $name, $value );
					}
					
					if ( isset( $module['items'] ) && is_array( $module['items'] ) ) {
						foreach ( $module['items'] as $i => $item ) {
							foreach ( $item as $k => $v ) {
								$item[ $k ] = $this->sanitize_value( $k, $v );
							}
							$module['items'][ $i ] = $item;
						}
					}
					$column['module'][ $ind ] = $module ;
				}
			}

			return $column;
		}

		/**
		 * Sanitizes any value based on type
		 *
		 * @return mixed $value
		 */
		private function sanitize_value( $name, $value ) {

			if ( strpos( $name, 'url' ) !== false ) {
				$value = esc_url( $value );
			} else if ( strpos( $name, 'content' ) !== false ) {
				$value = $value;
			} else if ( strpos( $name, 'color' ) !== false ) {
				$value = $this->sanitize_color( $value );
			}

			return $value;
		}

		/**
		 * Sanitizes hex color
		 *
		 * @return string $color
		 */
		private function sanitize_color( $color ) {
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
		private function get_column_class( $type ) {
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

		public function get_content() {
			$image   = $this->_module;
			$content = "<figure style='text-align:{$image['align']};'>";

			$image['class'] = $image['animation'] != '' ? "wow {$image['animation']}" : "";

			if ( $image['lightbox'] == 'true' || $image['href'] !== '' ) {
				$content .= "<a" . PT_PageBuilder_Helper::generate_attr( $image, array( 'target' ) );
				$content .= $image['lightbox'] == 'true' ? " href='{$image['src']}'" : " href='" . esc_url( $image['href'] ) . "'";
				$content .= $image['lightbox'] == 'true' ? " class='lightbox gallery'>" : '>';
			}

			$content .= "<img" . PT_PageBuilder_Helper::generate_attr( $image, array(
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

		public function get_content() {
			return "<div class='module-text'>" . PT_PageBuilder_Helper::get_content( $this->_module ) . "</div>";
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

		public function get_content() {
			$color     = $this->_module['color'];
			$color_alt = $this->_module['hover_color'];
			$content   = PT_PageBuilder_Helper::get_content( $this->_module );
			$url       = esc_url( $this->_module['href'] );

			return "<div class='hover-icon' id='{$this->_module['id']}'>
					<a href='$url' class='fa fa-{$this->_module['size']}x {$this->_module['icon']}'>&nbsp;</a><h3 class='icon-title'>{$this->_module['title']}</h3>{$content}
				</div>";
		}

	}
endif;

if ( ! class_exists( 'PT_PageBuilder_Featurebox_Module' ) ) :
	/**
	 * Class to handle HTML generation for Feature Box Module
	 *
	 */
	class PT_PageBuilder_Featurebox_Module {

		private $_module;

		public function __construct( $module ) {
			$this->_module = $module;
		}

		public function get_content() {
			$color     = $this->_module['color'];
			$content   = PT_PageBuilder_Helper::get_content( $this->_module );

			return "<div class='feature-box size-{$this->_module['size']}' id='{$this->_module['id']}'>
					<div class='icon-wrap'><i class='fa fa-{$this->_module['size']}x {$this->_module['icon']}' style='color:$color;'>&nbsp;</i></div>
					<div class='feature-box-content'>
						<h3 class='feature-box-title' style='color:$color;'>{$this->_module['title']}</h3>
						<div class='feature-box-text'>{$content}</div>
					</div>
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
	return PT_PageBuilder_Save::get_instance();
}

//Hook into admin_init and create an instance of PT_PageBuilder_Save to initialize Page Builder Save Methods
add_action( 'admin_init', 'pt_pb_get_builder_save' );

function quest_meta_slider_shortcode( $slider_id ) {
	return "[metaslider id=$slider_id]";
}