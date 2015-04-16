<?php
$view = trivoo_get_view();
?>

<?php trivoo_title_bar( $view ); ?>

<div class="trivoo-row site-content" id="content">
    <div class="container">
		<div class="row">

			<?php trivoo_try_sidebar( $view, 'left' ); ?>

			<div id="primary" class="content-area <?php trivoo_main_cls(); ?>">
				<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>
					<div id="grid-container" class="clearfix">

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<div class="post-grid-wrap">
								<article <?php post_class( 'post-grid' ); ?> id="post-<?php the_ID(); ?>">
								
									
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="post-image blog-normal effect slide-top">
										<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'blog-grid' ); ?></a>
										<div class="overlay">
											<div class="caption">
		                                        <a href="<?php the_permalink() ?>"><?php _e('View more', 'Trivoo'); ?></a>
		                                    </div>
		                                    <a href="<?php the_permalink() ?>" class="expand">+</a>
		                                    <a href="#" class="close-overlay hidden">x</a>
		                                </div>
									</div>

								<?php endif; ?>

								<?php get_template_part( 'partials/content', 'sticky' ); ?>
								<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

								<?php if ( 'post' == get_post_type() ) : ?>
									<div class="entry-meta">
										<?php trivoo_free_post_meta(); ?>
									</div><!-- .entry-meta -->
								<?php endif; ?>

								</article>
							</div>

						<?php endwhile; ?>
					</div>
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
