<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Quest
 */
$view      = quest_get_view();
$img_width = '';

if ( ! quest_get_mod( 'layout_' . $view . '_ft-img-enlarge' ) && ! quest_get_mod( 'layout_' . $view . '_ft-img-hide' ) && has_post_thumbnail() ) {
	$featured_image = wp_get_attachment_metadata( get_post_thumbnail_id( $post->ID, 'blog-normal' ), true );
	$img_width      = "style='width:{$featured_image['width']}px;'";
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php if ( ! quest_get_mod( 'layout_' . $view . '_ft-img-hide' ) && has_post_thumbnail() ) : ?>

			<div class="post-image blog-normal effect slide-top" <?php echo $img_width; ?>>
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


	</header>
	<!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'quest' ),
			'after'  => '</div>',
		) );
		?>
	</div>
	<!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'quest' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	<!-- .entry-footer -->
</article><!-- #post-## -->
