<?php $view = trivoo_get_view(); ?>

<?php trivoo_title_bar( $view ); ?>

<div class="trivoo-row site-content" id="content">
    <div class="container">
		<div class="row">

			<?php trivoo_try_sidebar( $view, 'left' ); ?>

			<div id="primary" class="content-area <?php trivoo_main_cls(); ?>">
				<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-normal' ); ?>>
							<header class="entry-header">
								<?php get_template_part( 'partials/content', 'sticky' ); ?>
								<?php if ( has_post_thumbnail() ) : ?>

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

								<?php the_title( sprintf( '<h1 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

								<?php if ( 'post' == get_post_type() ) : ?>
									<div class="entry-meta">
										<?php trivoo_free_post_meta(); ?>
									</div><!-- .entry-meta -->
								<?php endif; ?>

							</header><!-- .entry-header -->

							<div class="entry-content">
								<?php the_excerpt(); ?>

								<?php wp_link_pages( array(
										'before' => '<div class="page-links">' . __( 'Pages:', 'trivoo-free' ),
										'after'  => '</div>',
									) );
								?>
							</div><!-- .entry-content -->

							<footer class="entry-footer">
								<?php trivoo_post_taxonomy( $view ); ?>
								<?php trivoo_post_read_more(); ?>
							</footer><!-- .entry-footer -->
						</article><!-- #post-## -->

					<?php endwhile; ?>

					<?php trivoo_pagination( $pages = '', $range = 2 ); ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php trivoo_try_sidebar( $view, 'right' ); ?>

		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- #content -->
