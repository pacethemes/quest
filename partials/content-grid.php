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
					<div id="article-container" class="clearfix">
						<ul id="full-grid">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<li <?php post_class( 'post-grid post-grid-third' ); ?> id="post-<?php the_ID(); ?>">
								<div class="content-wrapper">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="post-image">
										<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'blog-grid' ); ?><i class="fa fa-search"></i></a>
									</div>
								<?php else: ?>
									<div class="post-image">
										<a href="<?php the_permalink() ?>"><div class="grid-dummy-image"><img src="<?php echo get_template_directory_uri()?>/assets/img/grid-dummy-image.jpg"><i class="fa fa-pencil"></i></div><i class="fa fa-search dummy"></i></a>
									</div>
								<?php endif; ?>


								<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

								<?php if ( 'post' == get_post_type() ) : ?>
									<div class="post-meta">
										<?php trivoo_free_post_meta(); ?>
									</div><!-- .post-meta -->
								<?php endif; ?>

								</div>
							</li>

						<?php endwhile; ?>
						</ul>
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
