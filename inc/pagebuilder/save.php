<?php

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
			isset( $_POST[ 'pt-pb-nonce' ] ) && isset( $_POST[ 'pt_pb_section' ] ) && wp_verify_nonce( $_POST[ 'pt-pb-nonce' ], 'save' ) ) {
			// Save the post's meta data
			add_action( 'save_post', array( $this, 'SavePost' ), 10, 2 );

			// Combine the input into the post's content
			add_filter( 'wp_insert_post_data', array( $this, 'InsertPostData' ), 30, 2 );
		}
	}

	/**
	 * Returns an instance of the PT_PageBuilder_Save class, creates one if an instance doesn't exist. Implements Singleton pattern
	 *
	 * @return PT_PageBuilder_Save
	 */
	public static function getInstance() {
		if ( !isset( self::$instance ) ) {
			self::$instance = new static();
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

		update_post_meta( $post_id, 'pt_pb_sections', $this->_sections );

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

		if ( $postarr['post_type'] === 'revision' || !isset( $postarr['pt_pb_section'] ) )
			return $data;

		$this->_sections = $this->prepareSections( $postarr['pt_pb_section'] );
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
			if ( $section == '' || empty( $section ) || !is_array( $section ) ) {
				continue;
			}
			//If the columns are not set or the current iteration is not a section then we dont have to sort the columns
			if ( array_key_exists( 'col', $section ) ) {
				$sorted[] =  $this->sortColumns( $section );
			} elseif ( array_key_exists( 'slider', $section ) ) {
				$sorted[] =  $this->sortSlides( $section );
			} else {
				$sorted[] =  $section;
			}

		}
		return $sorted;
	}

	/**
	 * Sanitizes a Column
	 *
	 * @return array $column
	 */
	private function sanitizeColumn( $column ) {

		if ( isset( $column['module'] ) && is_array( $column['module'] ) ) {
			foreach ( $column['module'] as $name => $value ) {

				$column['module'][$name] = $this->_sanitizeValue( $name, $value );

				if ( isset( $column['module']['items'] ) && is_array( $column['module']['items']  ) ) {
					foreach ( $column['module']['items'] as $ind => $item ) {
						foreach ( $item as $k => $v ) {
							$item[$k] = $this->_sanitizeValue( $k, $v );
						}
						$column['module']['items'][$ind] = $item;
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
		if ( '' === $color )
			return '';

		// 3 or 6 hex digits, or the empty string.
		if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
			return $color;

		return null;
	}

	/**
	 * Sorts columns in the order they are submitted and returns the sorted section
	 *
	 * @return array $section
	 */
	private function sortColumns( $section ) {

		$columns = array();

		foreach ( $section['col'] as $column ) {
			$column = $this->sanitizeColumn( $column );
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
			$key = is_numeric( $k ) ? ( count( $slides ) + 1 ) : $k;
			$slides[$key] = $slide;
		}

		$section['slider'] = $slides;

		return $section;
	}

	/**
	 * Iterates through each section and generates section content
	 *
	 * @return string $content
	 */
	private function generatePostContent() {
		if ( $this->_sections === '' || empty( $this->_sections ) )
			return '';

		$content = "";

		foreach ( $this->_sections as $key => $section ) {
			$content .= $this->generateSection( $section );
		}

		return $content;

	}

	/**
	 * Iterates through each column/slide/modules in the section and generates section content
	 *
	 * @return string $content
	 */
	private function generateSection( $section ) {

		$css = $this->_getCssProperties( $section );
		$cssClass = $section['css_class'];

		$addRow = !array_key_exists( 'slider', $section );

		$content = "<section class='quest-row $cssClass' style='" . $css . "'> ";

		if ( $addRow ) {
			$content .= "\n\t <div class='container'> \n\t\t <div class='row'> \n";
		}

		if ( array_key_exists( 'col', $section ) && !empty( $section['col'] ) ) {
			foreach ( $section['col'] as $column ) {
				$content .= $this->generateColumn( $column );
			}
		}

		if ( array_key_exists( 'slider', $section ) && !empty( $section['slider'] ) ) {
			$content .= $this->generateSlider( $section['slider'] );
		}

		if ( array_key_exists( 'gallery', $section ) && !empty( $section['gallery'] ) ) {
			$content .= $this->generateGallery( $section['gallery'] );
		}

		if ( $addRow ) {
			$content .= "\t\t </div> \n\t </div> \n";
		}

		$content .= "</section>\n";

		return $content;
	}

	/**
	 * Generates Column markup
	 *
	 * @return string $content
	 */
	private function generateColumn( $column ) {

		if ( !isset( $column['type'] ) )
			return '';

		$cssClass = $this->_getColumnClass( $column['type'] );
		$content = "\t\t\t<div class='$cssClass'>\n\t\t\t\t";

		if ( isset( $column['module'] ) )
			$content .= $this->generateModule( $column['module'] );

		$content .= "\n\t\t\t</div>\n";
		return $content;
	}

	/**
	 * Generates Module markup. Checks if a class exists which handles the Module Markup Generation, if it exists invokes the class and generates the content
	 *
	 * @return string
	 */
	private function generateModule( $module ) {
		$cls = "PT_PageBuilder_" . ucwords( $module['type'] ) . "_Module";
		if ( !class_exists( $cls ) )
			return "";

		$handler = new $cls ( $module );

		return $handler->getContent();

	}

	/**
	 * Generates Slider markup
	 * Iterates through all slides and invokes the generateSlide method to generate slide specific markup
	 *
	 * @return string $content
	 */
	private function generateSlider( $slider ) {
		$content = "<div class='sl-slider-wrapper {$slider['css_class']}' style='" . $this->_getCssProperties( $slider ) . "'" . PT_PageBuilder_Helper::GetDataAttributes( $slider, array( 'autoplay', 'interval', 'speed' ) )."><div class='sl-slider'>";
		foreach ( $slider as $slide ) {
			if ( !is_array( $slide ) )
				continue;

			$content .= $this->generateSlide( $slide );
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
	private function generateSlide( $slide ) {

		$content = "<div class='sl-slide {$slide['css_class']}'". PT_PageBuilder_Helper::GetDataAttributes( $slide, array( 'orientation', 'slice1_rotation', 'slice2_rotation', 'slice1_scale', 'slice2_scale' ) ) ."><div class='sl-slide-inner'>";
		$content .= "<div class='sl-slide-inner' style='" . $this->_getCssProperties( $slide ) . "'>";

		$content .= "<h2 class='sl-slide-title' style='" . $this->_getCssProperties( array( 'text_color' => $slide['heading_color'] ) ) . "'>". $slide['heading'] ."</h2>";
		$content .= "<p class='sl-slide-text' style='" . $this->_getCssProperties( array( 'text_color' => $slide['text_color'] ) ) . "'>". $slide['text'] ."</p>";

		$content .= "</div></div></div>\n";
		return $content;
	}

	/**
	 * Generates Slider markup
	 * Iterates through all slides and invokes the generateSlide method to generate slide specific markup
	 *
	 * @return string $content
	 */
	private function generateGallery( $gallery ) {
		$content = "<div class='quest-gallery {$gallery['shape']} {$gallery['css_class']}' >";
		foreach ( $gallery as $image ) {
			if ( !is_array( $image ) )
				continue;

			if ( $image['post_id'] != '' && is_numeric( $image['post_id'] ) ) {
				$content .= $this->generateImage( $image );
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
	private function generateImage( $image ) {
		$content = "<a href='{$image['src']}' class='quest-gallery-thumb gallery' title='' data-gallery=''>".wp_get_attachment_image( $image['post_id'], 'gallery' )."<span class='overlay'><i class='fa fa-expand'></i></span></a>";
		return $content;
	}

	/**
	 * Returns Bootstrap class based on the column type
	 *
	 * @return string
	 */
	private function _getColumnClass( $type ) {
		if ( $type === '1-2' )
			return 'col-md-6';

		if ( $type === '1-3' )
			return 'col-md-4';

		if ( $type === '1-4' )
			return 'col-md-3';

		return 'col-md-12';
	}

	/**
	 * Generates CSS Properties for a section
	 *
	 * @return string
	 */
	private function _getCssProperties( $section ) {
		$css = array( 'bg_image' => 'background-image', 'bg_attach' => 'background-attachment', 'bg_color' => 'background-color', 'text_color' => 'color', 'padding_top' => 'padding-top', 'padding_bottom' => 'padding-bottom',
			'border_top_width' => 'border-top-width', 'border_bottom_width' => 'border-bottom-width', 'border_top_color' => 'border-top-color', 'border_bottom_color' => 'border-bottom-color',
			'height' => 'height', 'bg_pos_x' => 'background-position-x', 'bg_pos_y' => 'background-position-y' );

		$properties = array();

		foreach ( $section as $prop => $value ) {
			if ( !array_key_exists( $prop, $css ) || trim( $value ) === '' )
				continue ;

			if ( $prop == 'bg_image' ) {
				$properties[] = "$css[$prop]:url($value)";
			} else {
				$properties[] = "$css[$prop]:$value";
			}
		}

		return esc_attr( implode( '; ', $properties ) );

	}

}

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
			if ( array_key_exists( $attribute, $array ) && $array[$attribute] !== '' ) {
				$value = esc_attr( $array[$attribute] );
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
				$attr = str_replace( '_', '-', $prop );
				$value = esc_attr( $values[$prop] );
				$content .= " data-$attr='$value'";
			}
		}
		return $content;
	}

}

/**
 * Class to handle HTML generation for Slider Module
 *
 * @return string $content
 */
class PT_PageBuilder_Slider_Module {

	private $_module;

	public function __construct( $module ) {
		$this->_module = $module;
	}

	public function getContent() {
		$image = $this->_module;
		$content = "<figure style='text-align:{$image['align']}'>";

		$image['class'] = $image['animation'] != '' ? "wow {$image['animation']}" : "";

		if ( $image['lightbox'] == 'true' || $image['href'] !== '' ) {
			$content .= "<a" . PT_PageBuilder_Helper::GetAttributes( $image, array( 'target' ) ) ;
			$content .= $image['lightbox'] == 'true' ? " href='{$image['src']}'" : " href='".esc_url( $image['href'] )."'";
			$content .= $image['lightbox'] == 'true' ? " class='lightbox gallery'>" : '>';
		}

		$content .= "<img" . PT_PageBuilder_Helper::GetAttributes( $image, array( 'src', 'title', 'alt', 'class' ) ) . " />";

		if ( $image['lightbox'] == 'true' || $image['href'] !== '' ) {
			$content .= "</a>";
		}

		$content .= "</figure>";

		return $content;
	}

}

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
		$image = $this->_module;
		$content = "<figure style='text-align:{$image['align']}'>";

		$image['class'] = $image['animation'] != '' ? "wow {$image['animation']}" : "";

		if ( $image['lightbox'] == 'true' || $image['href'] !== '' ) {
			$content .= "<a" . PT_PageBuilder_Helper::GetAttributes( $image, array( 'target' ) ) ;
			$content .= $image['lightbox'] == 'true' ? " href='{$image['src']}'" : " href='".esc_url( $image['href'] )."'";
			$content .= $image['lightbox'] == 'true' ? " class='lightbox gallery'>" : '>';
		}

		$content .= "<img" . PT_PageBuilder_Helper::GetAttributes( $image, array( 'src', 'title', 'alt', 'class' ) ) . " />";

		if ( $image['lightbox'] == 'true' || $image['href'] !== '' ) {
			$content .= "</a>";
		}

		$content .= "</figure>";

		return $content;
	}

}

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
		return "<div class='module-text$cls'>".$this->_module['content']."</div>";
	}

}

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
		$cls = $this->_module['animation'] != '' ? " wow {$this->_module['animation']}" : "";
		$color = $this->_module['color'];
		$color_alt = $this->_module['hover_color'];
		return "<div class='hover-icon$cls' id='{$this->_module['id']}'>
					<a href='#' class='fa fa-{$this->_module['size']}x {$this->_module['icon']}'>&nbsp;</a><h3 class='icon-title'>{$this->_module['title']}</h3>{$this->_module['content']}
				</div>";
	}

}

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

?>
