<?php
/**
 * @package Quest
 */

$view = quest_get_view();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-normal' ); ?>>
	<header class="entry-header">
		<?php get_template_part( 'partials/content', 'sticky' ); ?>
		<?php if ( ! quest_get_mod( 'layout_' . $view . '_ft-img-hide' ) && has_post_thumbnail() ) : ?>

			<div class="post-image blog-normal effect slide-top" <?php echo quest_featured_image_width( $view ) ?>>
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'blog-normal' ); ?></a>

				<div class="overlay">
					<div class="caption">
						<a href="<?php the_permalink() ?>"><?php _e( 'View more', 'quest' ); ?></a>
					</div>
					<a href="<?php the_permalink() ?>" class="expand">+</a>
					<a href="#" class="close-overlay hidden">x</a>
				</div>
			</div>

		<?php endif; ?>

		<?php if ( quest_get_mod( 'layout_' . $view . '_title' ) ) : ?>
			<?php the_title( sprintf( '<h1 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php endif; ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php quest_post_meta(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

	</header>
	<!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages: ', 'quest' ),
			'after'  => '</div>',
		) );
		?>
	</div>
	<!-- .entry-content -->

	<footer class="entry-footer">
		<?php quest_post_author_info(); ?>
		<?php quest_post_taxonomy( $view ); ?>
		<?php quest_post_single_navigation(); ?>
		<?php edit_post_link( __( 'Edit', 'quest' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	<!-- .entry-footer -->
</article><!-- #post-## -->
