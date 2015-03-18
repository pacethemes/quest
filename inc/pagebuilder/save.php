<?php

/**
* 
*/
class TR_PageBuilder_Save
{
	
    // Hold an instance of the class
    private static $instance;

	private $_sections;
 
    // The singleton method

	public function __construct()
	{
		if ( isset( $_POST[ 'tr-pb-nonce' ] ) && isset( $_POST[ 'tr_pb_section' ] ) && wp_verify_nonce( $_POST[ 'tr-pb-nonce' ], 'save' ) ) {
			// Save the post's meta data
			add_action( 'save_post', array( $this, 'SavePost' ), 10, 2 );

			// Combine the input into the post's content
			add_filter( 'wp_insert_post_data', array( $this, 'WPInsertPostData' ), 30, 2 );
		}
	}

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

	public function SavePost( $post_id, $post )
	{
		// Don't do anything during autosave
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		update_post_meta($post_id, 'tr_pb_sections', $this->_sections);

		//var_dump($post);
		//die('save_post');
	}

	public function WPInsertPostData( $data, $postarr ) {

		if($postarr['post_type'] === 'revision' || !isset($postarr['tr_pb_section']))
			return $data;

		$this->_sections = $this->prepareSections($postarr['tr_pb_section']);
		$data['post_content'] = $this->generatePostContent();
		return $data;
	}

	private function prepareSections($sections) {
		$sorted = array();
		foreach($sections as $key => $section){

			//If the columns are not set or the current iteration is not a section then we dont have to sort the columns
			if( array_key_exists('col', $section) ){
				$sorted[] = 	$this->sortColumns($section);
			} elseif( array_key_exists('slider', $section) ){
				$sorted[] = 	$this->sortSlides($section);
			} else {
				$sorted[] = 	$section;
			}

		}
		return $sorted;
	}

	private function sortColumns($section){

		$columns = array();

		foreach ( $section['col'] as $column ) {
			$columns[] = $column;
		}

		$section['col'] = $columns;

		return $section;
	}

	private function sortSlides($section){

		$slides = array();

		foreach ( $section['slider'] as $k => $slide ) {
			$key = is_numeric($k) ? (count($slides) + 1) : $k;
			$slides[$key] = $slide;
		}

		$section['slider'] = $slides;

		return $section;
	}

	private function generatePostContent() {
		if( $this->_sections === '' || empty($this->_sections) )
			return '';

		$content = "";

		foreach ( $this->_sections as $key => $section ) {
			$content .= $this->generateSection($section);
		}

		return $content;

	}


	private function generateSection( $section ) {

		$css = $this->_getCssProperties($section);
		$cssClass = $section['css_class'];

		$addRow = !array_key_exists( 'slider', $section );

		$content = "<section class='trivoo-row $cssClass' style='" . $css . "'> ";

		if( $addRow ) {
			$content .= "\n\t <div class='container'> \n\t\t <div class='row'> \n";
		}

		if( array_key_exists( 'col', $section ) && !empty( $section['col'] ) ) {
			foreach ( $section['col'] as $column ) {
				$content .= $this->generateColumn( $column );
			}
		}

		if( array_key_exists( 'slider', $section ) && !empty( $section['slider'] ) ) {
			$content .= $this->generateSlider( $section['slider'] );
		}

		if( $addRow ) {
			$content .= "\t\t </div> \n\t </div> \n";
		}

		$content .= "</section>\n";

		return $content;
	}


	private function generateColumn( $column ) {

		if( !isset( $column['type'] ) )
			return '';

		$cssClass = $this->_getColumnClass( $column['type'] );
		$content = "\t\t\t<div class='$cssClass'>\n\t\t\t\t";

		if( isset( $column['module'] ) )
			$content .= $this->generateModule( $column['module'] );

		$content .= "\n\t\t\t</div>\n";
		return $content;
	}

	private function generateModule ( $module ) {
		$cls = "TR_PageBuilder_" . ucwords($module['type']) . "_Module";
		if( !class_exists($cls) )
			return "";

		$handler = new $cls ( $module );

		return $handler->getContent();

	}

	private function generateSlider( $slider ) {
		$content = "<div class='sl-slider-wrapper'".TR_PageBuilder_Helper::GetDataAttributes( $slider, array('autoplay', 'interval', 'speed') )."><div class='sl-slider'>";
		foreach ( $slider as $slide ) {
			if( !is_array( $slide ) )
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

	private function generateSlide( $slide ) {

		$content = "<div class='sl-slide'". TR_PageBuilder_Helper::GetDataAttributes( $slide, array('orientation', 'slice1_rotation', 'slice2_rotation', 'slice1_scale', 'slice2_scale') ) ."><div class='sl-slide-inner'>";
		$content .= "<div class='sl-slide-inner' style='" . $this->_getCssProperties( $slide ) . "'>";

		$content .= "<h2 class='sl-slide-title' style='" . $this->_getCssProperties( array('text_color' => $slide['heading_color'] ) ) . "'>". $slide['heading'] ."</h2>";
		$content .= "<p class='sl-slide-text' style='" . $this->_getCssProperties( array('text_color' => $slide['text_color'] ) ) . "'>". $slide['text'] ."</p>";

		$content .= "</div></div></div>\n";
		return $content;
	}

	private function _getColumnClass( $type ) {
		if ( $type === '1-2' )
			return 'col-md-6';

		if ( $type === '1-3' )
			return 'col-md-4';

		if ( $type === '1-4' )
			return 'col-md-3';

		return 'col-md-12';
	}

	private function _getCssProperties( $section ){
		$css = array('bg_image' => 'background-image', 'bg_color' => 'background-color', 'text_color' => 'color', 'padding_top' => 'padding-top', 'padding_bottom' => 'padding-bottom',
		             'border_top_width' => 'border-top-width', 'border_bottom_width' => 'border-bottom-width', 'border_top_color' => 'border-top-color', 'border_bottom_color' => 'border-bottom-color' );

		$properties = array();

		foreach ($section as $prop => $value) {
			if( !array_key_exists( $prop, $css ) || trim($value) === '' )
				continue ;

			if( $prop == 'bg_image' ){
				$properties[] = "$css[$prop]:url($value)";
			} else {
				$properties[] = "$css[$prop]:$value";
			}
		}

		return esc_attr( implode('; ', $properties ) );

	}

	private function _getDataAttributes ( $values, $properties ) {
		$content="";
		foreach ( $properties as $prop ) {
			if( array_key_exists( $prop, $values ) ) {
				$content .= " data-$prop='{$values[$prop]}'";
			}
		}
		return esc_attr( $content );
	}

}


class TR_PageBuilder_Helper {

	public static function GetAttributes ( $array, $attributes ) {
		$content = "";

		foreach ( $attributes as $attribute ) {
			if( array_key_exists( $attribute, $array ) && $array[$attribute] !== '' ) {
				$content .= " $attribute='{$array[$attribute]}'";
			}
		}

		return $content;
	}

	public static function GetDataAttributes ( $values, $properties ) {
		$content = "";
		foreach ( $properties as $prop ) {
			if( array_key_exists( $prop, $values ) ) {
				$attr = str_replace('_', '-', $prop);
				$content .= " data-$attr='{$values[$prop]}'";
			}
		}
		return $content;
	}

}


class TR_PageBuilder_Slider_Module {

	private $_module;

	public function __construct( $module ) {
		$this->_module = $module;
	}

	public function getContent () {
		$image = $this->_module;
		$content = "<figure style='text-align:{$image['align']}'>";

		$image['class'] = $image['animation'] != '' ? "wow {$image['animation']}" : "";

		if ( $image['lightbox'] == 'true' || $image['href'] !== '' ) {
			$content .= "<a" . TR_PageBuilder_Helper::GetAttributes($image, array('target')) ;
			$content .= $image['lightbox'] == 'true' ? " href='{$image['src']}'" : " href='{$image['href']}'";
			$content .= $image['lightbox'] == 'true' ? " class='lightbox gallery'>" : '>';
		}

		$content .= "<img" . TR_PageBuilder_Helper::GetAttributes( $image, array( 'src', 'title', 'alt', 'class' ) ) . " />";

		if ( $image['lightbox'] == 'true' || $image['href'] !== '' ) {
			$content .= "</a>";
		}

		$content .= "</figure>";

		return $content;
	}

}


class TR_PageBuilder_Image_Module {

	private $_module;

	public function __construct( $module ) {
		$this->_module = $module;
	}

	public function getContent () {
		$image = $this->_module;
		$content = "<figure style='text-align:{$image['align']}'>";

		$image['class'] = $image['animation'] != '' ? "wow {$image['animation']}" : "";

		if ( $image['lightbox'] == 'true' || $image['href'] !== '' ) {
			$content .= "<a" . TR_PageBuilder_Helper::GetAttributes($image, array('target')) ;
			$content .= $image['lightbox'] == 'true' ? " href='{$image['src']}'" : " href='{$image['href']}'";
			$content .= $image['lightbox'] == 'true' ? " class='lightbox gallery'>" : '>';
		}

		$content .= "<img" . TR_PageBuilder_Helper::GetAttributes( $image, array( 'src', 'title', 'alt', 'class' ) ) . " />";

		if ( $image['lightbox'] == 'true' || $image['href'] !== '' ) {
			$content .= "</a>";
		}

		$content .= "</figure>";

		return $content;
	}

}

class TR_PageBuilder_Text_Module {

	private $_module;

	public function __construct( $module ) {
		$this->_module = $module;
	}

	public function getContent () {
		$cls = $this->_module['animation'] != '' ? " wow {$this->_module['animation']}" : "";
		return "<div class='module-text$cls'>".$this->_module['content']."</div>";
	}

}

function tr_pb_get_builder_save() {
	return TR_PageBuilder_Save::getInstance();
}


add_action( 'admin_init', 'tr_pb_get_builder_save' );