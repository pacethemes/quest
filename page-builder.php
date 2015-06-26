<?php
/**
 * Template Name: Page Builder
 *
 * The template for displaying Page Builder Content
 * @package Quest
 */
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article <?php post_class( 'page-builder entry-content' ); ?> id="main">
		<?php remove_filter( 'the_content', 'wpautop' ); ?>
		<?php the_content(); ?>
		<?php add_filter( 'the_content', 'wpautop' ); ?>
	</article>
<?php endwhile; endif; ?>

<?php get_footer(); ?>