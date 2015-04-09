<?php
/**
 * The template for displaying search results pages.
 *
 * @package trivoo-free
 */

get_header();
$layout = trivoo_get_mod( 'layout_search_style' ); ?>

<?php get_template_part( 'partials/content', $layout ); ?>

<?php get_footer(); ?>