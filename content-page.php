<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package trivoo-free
 */
$view = trivoo_get_view();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php if(has_post_thumbnail()) : ?>

		<div class="post-image blog-normal effect slide-top">
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'blog-normal' ); ?></a>
				<div class="overlay">
					<div class="caption">
                        <a href="<?php the_permalink() ?>"><?php _e('View more', 'Trivoo'); ?></a>
                    </div>
                    <a href="<?php the_permalink() ?>" class="expand">+</a>
                    <a href="#" class="close-overlay hidden">x</a>
                </div>
		</div>
		
		<?php endif; ?>

		<?php if ( trivoo_get_mod( 'layout_'.$view.'_title' ) ) : ?>
			<?php the_title( sprintf( '<h1 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php endif; ?>

		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'trivoo-free' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'trivoo-free' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
