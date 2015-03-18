<?php
/**
 * The template for displaying search results pages.
 *
 * @package trivoo-free
 */

get_header();
$layout = get_theme_mod( 'layout_search_style', trivoo_get_default( 'layout_search_style' ) ); ?>

<?php get_template_part( 'partials/content', $layout ); ?>

<?php get_footer(); ?>