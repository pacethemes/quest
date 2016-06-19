<?php
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

			$image['class'] = $image['animation'] != '' ? "wow {$image['animation']}" : '';

			if ( $image['lightbox'] == 'true' || $image['href'] !== '' ) {
				$content .= '<a' . PT_PageBuilder_Helper::generate_attr( $image, array( 'target' ) );
				$content .= $image['lightbox'] == 'true' ? " href='{$image['src']}'" : " href='" . esc_url( $image['href'] ) . "'";
				$content .= $image['lightbox'] == 'true' ? " class='lightbox gallery'>" : '>';
			}

			$content .= '<img' . PT_PageBuilder_Helper::generate_attr( $image, array(
					'src',
					'title',
					'alt',
					'class'
				) ) . ' />';

			if ( $image['lightbox'] == 'true' || $image['href'] !== '' ) {
				$content .= '</a>';
			}

			$content .= '</figure>';

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
			return "<div class='module-text'>" . PT_PageBuilder_Helper::get_content( $this->_module ) . '</div>';
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
			$effect	   = $this->_module['hover_effect'];

			return "<div class='hover-icon' id='{$this->_module['id']}'>
					<a href='$url' class='fa fa-{$this->_module['size']}x {$this->_module['icon']} $effect'>&nbsp;</a><h3 class='icon-title'>{$this->_module['title']}</h3>{$content}
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

if ( ! class_exists( 'PT_PageBuilder_Contactform7_Module' ) ) :
	/**
	 * Class to handle HTML generation for Contact Form 7 Module
	 *
	 */
	class PT_PageBuilder_Contactform7_Module {

		private $_module;

		public function __construct( $module ) {
			$this->_module = $module;
		}

		public function get_content() {

			return "<div class='quest-cf7' id='{$this->_module['id']}' data-process='true' data-type='contactform7' data-cf7-id='{$this->_module['form_id']}' data-cf7-title='{$this->_module['title']}'>
	                </div>";
		}

		public function filterContent( $content, $col ) {
			$data = extract_data_attr( $col );

			if ( ! array_key_exists( 'cf7-id', $data ) ) {
				return $content; }

			$form = ( array_key_exists( 'cf7-title', $data ) && $data['cf7-title'] !== '' ) ? "<h3 class='wpcf7-title'> {$data['cf7-title']} </h3>" : '';

			$form .= do_shortcode( '[contact-form-7 id="' . $data['cf7-id'] . '" title="' . ( get_the_title( $data['cf7-id'] ) ) . '"]' );

			return str_replace( $col, $col . $form, $content );

		}

	}
endif;