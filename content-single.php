<?php
/**
 * @package trivoo-free
 */

$view = trivoo_get_view();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-normal'); ?>>
	<header class="post-header">

		<?php if(has_post_thumbnail()) : ?>

			<div class="post-image blog-normal">
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('blog-normal'); ?></a>					
			</div>
		
		<?php endif; ?>

		<?php if ( get_theme_mod( 'layout_'.$view.'_title', trivoo_get_default( 'layout_'.$view.'_title' ) ) ) : ?>
			<?php the_title( sprintf( '<h1 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php endif; ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="post-meta">
				<?php trivoo_free_post_meta(); ?>
			</div><!-- .post-meta -->
		<?php endif; ?>
		
	</header><!-- .post-header -->

	<div class="post-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'trivoo-free' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .post-content -->

	<footer class="post-footer">
		<?php trivoo_post_author_info(); ?>
		<?php trivoo_post_taxonomy( $view ); ?>
		<?php trivoo_post_single_navigation(); ?>
		<?php //edit_post_link( __( 'Edit', 'trivoo-free' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .post-footer -->
</article><!-- #post-## -->
