<?php

if ( ! function_exists( 'quest_is_pb_template' ) ):

	/**
	 * Is the current page a Page Builder Page ?
	 *
	 * @since  1.3.0
	 * @return bool
	 */
	function quest_is_pb_template() {
		global $post;

		if ( $post && !is_search() && get_page_template_slug( $post->ID ) === 'page-builder.php' ) {
			return true;
		}

		return false;
	}
endif;


if ( ! function_exists( 'quest_meta_get_default' ) ):

	/**
	 * Get Page Builder Meta Default Value
	 *
	 * @since  1.3.0
	 * @return string default value
	 */
		
	function quest_meta_get_default( $key ) {

		$meta = array(
			'_quest_pb_header'            => 'normal',
			'_quest_pb_menu'              => quest_get_mod( 'colors_menu_text' ),
			'_quest_pb_menu_hover'        => quest_get_mod( 'colors_menu_hover' ),
			'_quest_pb_menu_active'       => quest_get_mod( 'colors_menu_hover' )
		);

		if ( array_key_exists( $key, $meta ) ) {
			return $meta[ $key ];
		}

		return "";
	}
endif;


if ( ! function_exists( 'quest_get_meta' ) ):

	/**
	 * Get Page Builder Meta
	 *
	 * @since  1.3.0
	 * @return string meta
	 */
	function quest_get_meta( $meta, $key ) {
		global $post;
		if ( empty( $meta ) ) {
			$meta = get_post_meta( $post->ID );
		}

		if ( array_key_exists( $key, $meta ) ) {
			return $meta[ $key ][0];
		}

		return quest_meta_get_default( $key );
	}
endif;

if ( is_admin() )  :

	/**
	 * CMB2
	 */

	require trailingslashit( dirname( __FILE__ ) ) . 'CMB2/init.php';

	add_action( 'cmb2_init', 'quest_pb_metaboxes' );

	if ( ! function_exists( 'quest_pb_metaboxes' ) ):

		/**
		 * Adds Quest Page Builder Metaboxes
		 *
		 * @return void
		 */
		function quest_pb_metaboxes( ) {

			/*************************
			 * Page Builder Metabox
			 *************************/

			$prefix = '_quest_pb_';

			$pagebuilder_mb = new_cmb2_box( array(
				'id'           => $prefix . 'metabox',
				'title'        => __( 'Quest Page Options', 'quest' ),
				'object_types' => array( 'page', ), // Post type
				'priority'     => 'core',
				'show_on_cb'   => 'quest_is_pb_template', // function should return a bool value
			) );

			$field_id = $prefix . 'header';
			$pagebuilder_mb->add_field( array(
				'name'    => __( 'Header Type', 'quest' ),
				'desc'    => __( 'Which header type do you want to show for this page ?', 'quest' ),
				'id'      => $field_id,
				'type'    => 'radio',
				'options' => array(
					'transparent'     => __( 'Transparent', 'quest' ),
					'normal' => __( 'Normal', 'quest' )
				),
				'default' => quest_meta_get_default( $field_id ),
			) );

			$field_id = $prefix . 'menu';
			$pagebuilder_mb->add_field( array(
				'name'    => __( 'Menu Text Color', 'quest' ),
				'desc'    => __( 'Color of the top level menu item. Applies only for transparent header and top level menu items', 'quest' ),
				'id'      => $field_id,
				'type'    => 'colorpicker',
				'default' => quest_meta_get_default( $field_id ),
			) );

			$field_id = $prefix . 'menu_hover';
			$pagebuilder_mb->add_field( array(
				'name'    => __( 'Menu Text Hover Color', 'quest' ),
				'desc'    => __( 'Color of the top level menu item when it\'s hovered. Applies only for transparent header and top level menu items', 'quest' ),
				'id'      => $field_id,
				'type'    => 'colorpicker',
				'default' => quest_meta_get_default( $field_id ),
			) );

			$field_id = $prefix . 'menu_active';
			$pagebuilder_mb->add_field( array(
				'name'    => __( 'Menu Active Item Border Color', 'quest' ),
				'desc'    => __( 'Color of the active menu item top border. Applies only for transparent header and top level menu items', 'quest' ),
				'id'      => $field_id,
				'type'    => 'colorpicker',
				'default' => quest_meta_get_default( $field_id ),
			) );

		}

	endif;

endif;
