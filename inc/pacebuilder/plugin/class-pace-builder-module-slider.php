<?php

/**
 * Slider Module
 *
 * @since      1.0.0
 * @package    PTPB
 * @subpackage PTPB/includes/modules
 * @author     Pace Themes <dev@pacethemes.com>
 */

if ( ! class_exists( 'PTPB_Module_Slider' ) ) :
	/**
	 * Class to handle HTML generation for Slider Module
	 *
	 */
	class PTPB_Module_Slider extends PTPB_Module {

		/**
		 * PTPB_Module_Slider Constructor
		 */
		public function __construct() {
			parent::__construct();
			$this->icon        = 'dashicons-images-alt';
			$this->label       = __( 'Slider', 'quest' );
			$this->description = __( 'A simple Image Slider', 'quest' );
			$this->has_items   = true;
			$this->item_label  = __( 'Slide', 'quest' );
		}

		/**
		 * All Fields for this Module
		 * @return array
		 */
		public function fields() {
			return array(
				'height'   => array(
					'type'    => 'slider',
					'default' => 400,
					'min'	  => 200,
					'max'	  => 1500,
					'step'	  => 5,
					'unit'	  => '',
					'label'   => __( 'Height', 'quest' )
				),
				'fullscreen' => array(
					'type'    => 'select',
					'default' => 'no',
					'label'   => __( 'Fullscreen', 'quest' ),
					'desc'    => __( 'If set to FullScreen Slider height will be ignored and the slider will always be 100% to the browser viewport', 'quest' ),
					'options' => $this->yes_no_option
				),
				'autoplay' => array(
					'type'    => 'select',
					'default' => 'yes',
					'label'   => __( 'AutoPlay', 'quest' ),
					'desc'    => __( 'Do you want to enable AutoPlay for this slider ? If autoplay is turned on, you can control the interval using Autoplay Interval option.', 'quest' ),
					'options' => $this->yes_no_option
				),
				'interval' => array(
					'type'    => 'slider',
					'default' => 5000,
					'min'	  => 500,
					'max'	  => 60000,
					'step'	  => 10,
					'unit'	  => '',
					'label'   => __( 'AutoPlay Interval', 'quest' ),
					'desc'    => __( 'Interval between playing the next slide, specify the time in milliseconds.', 'quest' )
				),
				'animation' => array(
					'type'    => 'select',
					'default' => 'slit',
					'label'   => __( 'Transition', 'quest' ),
					'desc'    => __( 'Transition type for the slider, Slit or Fade ?', 'quest' ),
					'options' => array(
							'slit'	=> __( 'Slit', 'quest' ),
							'fade'	=> __( 'Fade', 'quest' )
						)
				),
				'speed' => array(
					'type'    => 'slider',
					'default' => 800,
					'min'	  => 10,
					'max'	  => 5000,
					'step'	  => 5,
					'unit'	  => '',
					'label'   => __( 'Transition speed', 'quest' ),
					'desc'    => __( 'Speed of the CSS3 slide transitions, specify the time in milliseconds.', 'quest' )
				),
			);
		}

		/**
		 * All Fields for this Module Items
		 * @return array
		 */
		public function item_fields() {
			return array(
				'bg_image'   => array(
					'type'  => 'image',
					'label' => __( 'Image', 'quest' )
				),
				'bg_pos_x' => array(
					'type'    => 'select',
					'default' => 'center',
					'label'   => __( 'Image Position - Horizontal', 'quest' ),
					'desc'    => __( 'Horizontal position of the Image, if the image width is more than the slider width then the image will be positioned as per this setting.', 'quest' ),
					'options' => array(
							'center'	=> __( 'Center', 'quest' ),
							'left'	=> __( 'Left', 'quest' ),
							'right'	=> __( 'Right', 'quest' ),
						)
				),
				'bg_pos_y' => array(
					'type'    => 'select',
					'default' => 'center',
					'label'   => __( 'Image Position - Vertical', 'quest' ),
					'desc'    => __( 'Vertical position of the Image, if the image height is more than the slider height then the image will be positioned as per this setting.', 'quest' ),
					'options' => array(
							'center'	=> __( 'Center', 'quest' ),
							'top'	=> __( 'Top', 'quest' ),
							'bottom'	=> __( 'Bottom', 'quest' ),
						)
				),
				'bg_color'        => array(
					'type'    => 'color',
					'default' => '#dddddd',
					'label'   => __( 'Slide Background Color', 'quest' )
				),
				'content_pos_x' => array(
					'type'    => 'select',
					'default' => 'center',
					'label'   => __( 'Content Position - Horizontal', 'quest' ),
					'desc'    => __( 'Horizontal position of the Image, if the image width is more than the slider width then the image will be positioned as per this setting.', 'quest' ),
					'options' => array(
							'center'	=> __( 'Center', 'quest' ),
							'left'	=> __( 'Left', 'quest' ),
							'right'	=> __( 'Right', 'quest' ),
						)
				),
				'content_pos_y' => array(
					'type'    => 'select',
					'default' => 'center',
					'label'   => __( 'Content Position - Vertical', 'quest' ),
					'desc'    => __( 'Vertical position of the Image, if the image height is more than the slider height then the image will be positioned as per this setting.', 'quest' ),
					'options' => array(
							'center'	=> __( 'Center', 'quest' ),
							'top'	=> __( 'Top', 'quest' ),
							'bottom'	=> __( 'Bottom', 'quest' ),
						)
				),
				'heading'   => array(
					'type'  => 'text',
					'label' => __( 'Slide Heading', 'quest' ),
					'desc'    => __( 'The heading for the slide, this will be the main heading/title displayed in the slide frontend.', 'quest' ),
				),
				'heading_color'        => array(
					'type'    => 'color',
					'default' => '',
					'label'   => __( 'Slide Heading Text Color', 'quest' )
				),
				'heading_bg_color'        => array(
					'type'    => 'color',
					'default' => '',
					'label'   => __( 'Slide Heading Background Color', 'quest' )
				),
				'heading_size'      => array(
					'type'  => 'slider',
					'default' => 42,
					'label' => __( 'Slide Heading Text Size', 'quest' ),
					'max'   => 72,
					'min'   => 10,
					'step'  => 1,
					'unit'  => 'px'
				),
				'content'      => array(
					'type'  => 'tinymce',
					'label' => __( 'Slide Text', 'quest' ),
					'desc'  => __( 'Content for the slide, this will be displayed in the front end below the heading', 'quest' )
				),
				'text_color'        => array(
					'type'    => 'color',
					'default' => '',
					'label'   => __( 'Slide Text Color', 'quest' )
				),
				'text_bg_color'        => array(
					'type'    => 'color',
					'default' => '',
					'label'   => __( 'Slide Text Background Color', 'quest' )
				),
				'text_size'      => array(
					'type'  => 'slider',
					'default' => 18,
					'label' => __( 'Slide Text Size', 'quest' ),
					'max'   => 24,
					'min'   => 10,
					'step'  => 1,
					'unit'  => 'px'
				),
				'orientation' => array(
					'type'    => 'select',
					'default' => 'vertical',
					'label'   => __( 'Slice Orientation', 'quest' ),
					'desc'    => __( 'Should the slices split vertically or horizontally ?', 'quest' ),
					'options' => array(
							'vertical'	=> __( 'Vertical', 'quest' ),
							'horizontal'	=> __( 'Horizontal', 'quest' )
						)
				),
				'slice1_rotation'      => array(
					'type'  => 'slider',
					'default' => 10,
					'label' => __( 'Slice 1 Rotation', 'quest' ),
					'desc'  => __( 'Amount of rotation in degrees for the first slice.', 'quest' ),
					'max'   => 40,
					'min'   => -40,
					'step'  => 1,
					'unit'  => ''
				),
				'slice2_rotation'      => array(
					'type'  => 'slider',
					'default' => -15,
					'label' => __( 'Slice 2 Rotation', 'quest' ),
					'desc'  => __( 'Amount of rotation in degrees for the second slice.', 'quest' ),
					'max'   => 40,
					'min'   => -40,
					'step'  => 1,
					'unit'  => ''
				),
				'slice1_scale'      => array(
					'type'  => 'slider',
					'default' => 1.5,
					'label' => __( 'Slice 1 Scale', 'quest' ),
					'desc'  => __( 'How big should the slice 1 scale ?', 'quest' ),
					'max'   => 3,
					'min'   => 1,
					'step'  => 0.1,
					'unit'  => ''
				),
				'slice2_scale'      => array(
					'type'  => 'slider',
					'default' => 1.5,
					'label' => __( 'Slice 2 Scale', 'quest' ),
					'desc'  => __( 'How big should the slice 2 scale ?', 'quest' ),
					'max'   => 3,
					'min'   => 1,
					'step'  => 0.1,
					'unit'  => ''
				),
			);
		}

		/**
		 * Generate module content
		 * @param $module
		 *
		 * @return string
		 */
		public function get_content( $module ) {

			$slides = ''; 

			if ( is_array( $module['items'] ) ) {
				foreach ( $module['items'] as $slide ) { 
					if ( ! is_array( $slide ) ) {
						continue;
					}

					$slides .=  sprintf('<div class="sl-slide content-x-%s content-y-%s %s" %s>
											<div class="sl-slide-inner">
												<div class="sl-slide-inner" style="%s">
													<div class="sl-slide-content">
														%s
														<div class="sl-slide-text" style="%s">
															<span style="%s">
																%s
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>',
										$slide['content_pos_x'],
										$slide['content_pos_y'],
										$slide['css_class'],
										ptpb_generate_data_attr( $slide, array(
								           'orientation',
								           'slice1_rotation',
								           'slice2_rotation',
								           'slice1_scale',
								           'slice2_scale'
							           	) ),
							           	ptpb_generate_css( $slide ),
							           	empty( $slide['heading'] ) ? '' : 
							           		sprintf( '<h2 class="sl-slide-title" style="%s"><span style="%s">%s</span></h2>',
							           			ptpb_generate_css( array(
													'text_color' => $slide['heading_color'],
													'text_size'  => $slide['heading_size']
												) ),
												ptpb_generate_css( array(
													'bg_color' => $slide['heading_bg_color'],
												) ),
												$slide['heading']
							           		 ),
							           	ptpb_generate_css( array(
											'text_color' => $slide['text_color'],
											'text_size'  => $slide['text_size']
										) ),
										ptpb_generate_css( array(
											'bg_color' => $slide['text_bg_color']
										) ),
										ptpb_get_content( $slide )

								);
				}
			} 

			return sprintf( '<div class="sl-slider-wrapper %s" style="%s" %s>
								<div class="sl-slider">%s</div>
								<nav class="slit-nav-buttons">
									<a href="#" class="prev">
										<i class="fa fa-angle-left"></i>
									</a>
									<a href="#" class="next">
										<i class="fa fa-angle-right"></i>
									</a>
								</nav>
							</div>',
						$module['css_class'],
						ptpb_generate_css( $module ),
						ptpb_generate_data_attr( $module, array(
				           'autoplay',
				           'interval',
				           'speed',
				           'fullscreen',
				           'animation'
			           	) ),
						$slides
					);
		}

	}
endif;