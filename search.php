<?php
/**
 * The template for displaying search results pages.
 *
 * @package Quest
 */

get_header();
$layout = quest_get_mod( 'layout_search_style' ); ?>

<?php get_template_part( 'partials/content', $layout ); ?>

<?php get_footer(); ?>