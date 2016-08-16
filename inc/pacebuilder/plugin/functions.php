<?php

if( ! function_exists( 'ptpb_is_pb' ) ) :

	/**
	 * Checks if a page is a Pace Builder page
	 * @since  1.0.0
	 *
	 * @return bool
	 */
	function ptpb_is_pb() {
		global $post;

		if( ! isset( $post ) )
			return false;

		return ptpb_is_legacy() ? true : ( get_post_meta( $post->ID, '_ptpb_enabled', true ) == 1 );
	}

endif;

if( ! function_exists( 'ptpb_get_data' ) ) :

	/**
	 * Get the PaceBuilder Data for current page
	 * @return array|bool
	 */
	function ptpb_get_data() {
		global $post;
		if ( ptpb_is_pb() ) {
			if( ptpb_is_legacy() ) {
				return ptpb_legacy_data();
			}
			return ptpb_decode_data( get_post_meta( $post->ID, '_ptpb_sections', true ) );
		}

		return false;
	}

endif;

function ptpb_is_legacy() {
	global $post;

	$data = get_post_meta( $post->ID, 'pt_pb_sections', true );
	$is_pb = get_post_meta( $post->ID, '_ptpb_enabled', true );
	return empty( $is_pb ) && !empty( $data );
}

function ptpb_legacy_data() {
	global $post;

	$data = get_post_meta( $post->ID, 'pt_pb_sections', true );
	$data = str_replace(
				array(
					'"row"',
					'"col"',
					'"module"',
					'"margin_bottom"',
					'"padding_bottom"',
					'"padding_left"',
					'"padding_right"',
					'"padding_top"',
					'"border_top_color"',
					'"border_top_width"',
					'"border_bottom_color"',
					'"border_bottom_width"',
					'"border_left_color"',
					'"border_left_width"',
					'"border_right_color"',
					'"border_right_width"',
					'"admin_label"',
					'"icon":"fa-'
				),
				array(
					'"rows"',
					'"columns"',
					'"modules"',
					'"mb"',
					'"pb"',
					'"pl"',
					'"pr"',
					'"pt"',
					'"btc"',
					'"btw"',
					'"bbc"',
					'"bbw"',
					'"blc"',
					'"blw"',
					'"brc"',
					'"brw"',
					'"label"',
					'"icon":"fa fa-'
				),
				$data
			);
	$sections = ptpb_decode_data( $data );

	foreach ( $sections as $i => $section ) {

		if( isset( $section['text_color'] ) && ! empty( $section['text_color'] ) ) {
			$section['f_e'] = true;
			$section['fh_c'] = $section['text_color'];
			$section['ft_c'] = $section['text_color'];
			unset( $section['text_color'] );
		}

		foreach ( $section['rows'] as $j => $row ) {
			$module = array();
			if( $row['type'] !== 'columns' ) {
				$special_rows = array( 'gallery', 'slider', 'generic_slider' );

				foreach ( $special_rows as $r ) {
					if( isset( $row[$r] ) ) {

						$section['css_class'] = $section['css_class'] . ' pb-old-' . $r;

						$module = $row[$r];
						$module['type'] = $r;
						$module['hasItems'] =  ( $r !== 'generic_slider' );
						$module['label'] = ucwords( $r );
						$items = array();
						foreach ( $module as $key => $value ) {
							if( is_numeric( $key ) ) {
								$items[] = array_merge( $value, array( 'type' => $r ) );
								unset( $module[$key] );
							}
						}

						if( $r !== 'generic_slider' ) {
							$module['items'] = $items;
						} else {
							$module['type'] = 'text';
							if( $row['generic_slider']['type'] === 'meta' ){
								$module['content'] = '[metaslider id="' . $row['generic_slider']['slider_id'] . '"]';
								$module['label'] = 'Meta Slider';
							} else if( $row['generic_slider']['type'] === 'rev' ){
								$module['content'] = '[rev_slider alias="' . $row['generic_slider']['slider_id'] . '"]';
								$module['label'] = 'Rev Slider';
							}
						}
						unset( $row[$r] );
					}
				}

				$row['columns'] = array( array( 'type' => '1-1', 'content_type' => 'fluid', 'modules' => array( $module ) ) );
				$section['rows'][$j] = $row;
			}
		}
		$sections[$i] = $section;
	}

	return $sections;
}