<div class="post-grid-wrap">
	<article <?php post_class( 'post-grid' ); ?> id="post-<?php the_ID(); ?>">


		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-image blog-normal effect slide-top">
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'quest-blog-grid' ); ?></a>

				<div class="overlay">
					<div class="caption">
						<a href="<?php the_permalink() ?>"><?php _e( 'View more', 'quest' ); ?></a>
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
				<?php quest_post_meta(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

	</article>
</div>