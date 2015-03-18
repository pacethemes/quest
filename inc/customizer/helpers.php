<?php

function trivoo_get_default( $name ) {
	global $trivoo_defaults;

	if ( array_key_exists( $name, $trivoo_defaults ) ) {
		return $trivoo_defaults[$name];
	}

	return ;
}


if ( ! function_exists( 'trivoo_get_view' ) ) :
/**
 * Determine the current view.
 *
 * For use with view-related theme options.
 *
 * @since  1.0.0.
 *
 * @return string    The string representing the current view.
 */
function trivoo_get_view() {
	// Post types
	$post_types = get_post_types(
		array(
			'public' => true,
			'_builtin' => false
		)
	);
	$post_types[] = 'post';

	// Post parent
	$parent_post_type = '';
	if ( is_attachment() ) {
		$post_parent      = get_post()->post_parent;
		$parent_post_type = get_post_type( $post_parent );
	}

	$view = 'post';

	// Blog
	if ( is_home() ) {
		$view = 'blog';
	}
	// Archives
	else if ( is_archive() ) {
		$view = 'archive';
	}
	// Search results
	else if ( is_search() ) {
		$view = 'search';
	}
	// Posts and public custom post types
	else if ( is_singular( $post_types ) || ( is_attachment() && in_array( $parent_post_type, $post_types ) ) ) {
		$view = 'post';
	}
	// Pages
	else if ( is_page() || ( is_attachment() && 'page' === $parent_post_type ) ) {
		$view = 'page';
	}

	/**
	 * Allow developers to dynamically change the view.
	 *
	 * @since 1.2.3.
	 *
	 * @param string    $view                The view name.
	 * @param string    $parent_post_type    The post type for the parent post of the current post.
	 */
	return apply_filters( 'make_get_view', $view, $parent_post_type );
}
endif;

?>