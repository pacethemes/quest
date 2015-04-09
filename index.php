<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package trivoo-free
 */

get_header();
$view = trivoo_get_view();
$layout = trivoo_get_mod( 'layout_'.$view.'_style' ); ?>

<?php get_template_part( 'partials/content', $layout ); ?>

<?php get_footer(); ?>