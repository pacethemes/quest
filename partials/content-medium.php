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

						<article <?php post_class( 'post-half clearfix' ); ?> id="post-<?php the_ID(); ?>">
							<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

								<?php if ( 'post' == get_post_type() ) : ?>
									<div class="post-meta">
										<?php trivoo_free_post_meta(); ?>
									</div><!-- .post-meta -->
								<?php endif; ?>


							<?php if ( has_post_thumbnail() ) : ?>

								<div class="post-image">
									<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'blog-medium' ); ?></a>
								</div>

							<?php endif; ?>

								<div class="post-content">
									<?php the_excerpt() ?>
								</div>

							<footer class="post-footer">
								<?php trivoo_post_taxonomy( $view ); ?>
								<?php trivoo_post_read_more(); ?>
							</footer><!-- .post-footer -->

						</article><!-- #post-## -->

						</article>

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
