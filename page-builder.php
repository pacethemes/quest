<?php
/**
 * Template Name: Page Builder
 * 
 * The template for displaying Page Builder Content *
 * @package trivoo-free
 */
get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<article <?php post_class('post-content'); ?> id="main">
		<?php the_content(); ?>
	</article>
<?php endwhile; endif; ?>

		<script type="text/javascript">	
		(function($) {
			
				var Page = (function() {

						init = function() {

							initEvents();
							
						},
						initEvents = function() {

							$('.sl-slider-wrapper').each(function(){
								var $el = $(this),
									options = $el.data(),
									defaults = {
										autoplay: true,
										onBeforeChange : function( slide, pos ) {
											$nav.removeClass( 'nav-dot-current' );
											$nav.eq( pos ).addClass( 'nav-dot-current' );
										}
									},
									cnt = $el.find('.sl-slide').length;
								$.extend( defaults, options );

								$el.append('<nav class="nav-dots">' + new Array(cnt + 1).join('<span></span>')+ '</nav>');

								var $nav = $el.find( '.nav-dots > span' );
								$nav.first().addClass('nav-dot-current');

								var slitslider = $el.slitslider( defaults ),
								$next = $el.find('.slit-nav-buttons .next'),
								$prev = $el.find('.slit-nav-buttons .prev');

								$nav.each( function( i ) {
								
									$( this ).on( 'click', function( event ) {
										
										var $dot = $( this );
										
										if( !slitslider.isActive() ) {

											$nav.removeClass( 'nav-dot-current' );
											$dot.addClass( 'nav-dot-current' );
										
										}
										
										slitslider.jump( i + 1 );
										return false;
									
									} );
									
								} );

								$next.on('click', function( event ) {
									slitslider.next();
									return false;
								});

								$prev.on('click', function( event ) { 
									slitslider.previous();
									return false;
								});

							});

						};

					return { init : init };

				})();

				Page.init();

			
			})(jQuery);
		</script>

<?php get_footer(); ?>