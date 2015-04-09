<?php
/**
 * Template Name: Page Builder
 * 
 * The template for displaying Page Builder Content *
 * @package trivoo-free
 */
get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<article <?php post_class('entry-content'); ?> id="main">
		<?php the_content(); ?>
	</article>
<?php endwhile; endif; ?>

<?php get_footer(); ?>