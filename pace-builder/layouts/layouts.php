<?php
/**
 * Add Theme Prebuilt layouts to Pace Builder.
 *
 * @package quest
 * @since 1.5.0
 */

if( ! function_exists( 'quest_ptpb_prebuilt_layouts' ) ) :

	/**
	 * Adds default page layouts to PaceBuilder
	 *
	 * @param $layouts
	 */
	function quest_ptpb_prebuilt_layouts( $layouts ) {

		$path = get_template_directory() . '/pace-builder/layouts/';

		$layouts['Agency'] = array(
				'tab_pane'	=> 'Quest Prebuilt',
				'thumb'		=> 'http://demo.pacethemes.com/pace-builder/wp-content/uploads/sites/6/2016/06/app-landing-350x300.jpg',
				'preview'	=> 'http://demo.pacethemes.com/pace-builder/layouts/app-landing-page/',
				'layout'	=> json_decode( quest_read_layout_file( $path . 'agency.json' ), true )
			);

		return $layouts;
	}

endif;

add_filter( 'ptpb_prebuilt_layouts', 'quest_ptpb_prebuilt_layouts' );

if( ! function_exists( 'quest_read_layout_file' ) ) :
	/**
	 * Read a layout json file and return its content
	 *
	 * @param $file
	 */
	function quest_read_layout_file( $file ) {
		WP_Filesystem();
		global $wp_filesystem;
		return $wp_filesystem->get_contents( $file );
	}
endif;