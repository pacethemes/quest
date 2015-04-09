<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package trivoo-free
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function trivoo_free_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'trivoo_free_jetpack_setup' );
?>