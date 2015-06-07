<?php
$view = quest_get_view();
?>

<?php quest_title_bar( $view ); ?>

<div class="quest-row site-content" id="content">
    <div class="container">
		<div class="row">

			<?php quest_try_sidebar( $view, 'left' ); ?>

			<div id="primary" class="content-area <?php quest_main_cls(); ?>">
				<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>
					<div id="grid-container" class="clearfix">

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
						
							<?php get_template_part( 'partials/content', 'grid-single' ); ?>

						<?php endwhile; ?>
					</div>
					<?php quest_pagination( $pages = '', $range = 2 ); ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>
				</main><!-- #main -->
			</div><!-- #primary -->

			<?php quest_try_sidebar( $view, 'right' ); ?>

		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- #content -->
