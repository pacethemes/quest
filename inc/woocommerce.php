<?php
/**
 * @package Quest
 */

if ( ! function_exists( 'quest_woocommerce_init' ) ) :
/**
 * Add theme support and remove default action hooks so we can replace them with our own.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function quest_woocommerce_init() {
	// Theme support
	add_theme_support( 'woocommerce' );

	// Content wrapper
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper' );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );

}
endif;

add_action( 'after_setup_theme', 'quest_woocommerce_init' );

if ( ! function_exists( 'quest_woocommerce_before_main_content' ) ) :
/**
 * Markup to show before the main WooCommerce content.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function quest_woocommerce_before_main_content() {

	// Begin content wrapper
	?>
	<div class="quest-row site-content" id="content">
    	<div class="container">
			<div class="row">

				<?php quest_try_sidebar( quest_get_view(), 'left' ); ?>

				<div id="primary" class="content-area <?php quest_main_cls(); ?>">
					<main id="main" class="site-main" role="main">
	<?php
}
endif;

add_action( 'woocommerce_before_main_content', 'quest_woocommerce_before_main_content' );

if ( ! function_exists( 'quest_woocommerce_after_main_content' ) ) :
/**
 * Markup to show after the main WooCommerce content
 *
 * @since  1.0.0.
 *
 * @return void
 */
function quest_woocommerce_after_main_content() {
	// End content wrapper
	?>
					</main><!-- #main -->
				</div><!-- #primary -->

				<?php quest_try_sidebar( quest_get_view(), 'right' ); ?>

			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
	<?php

}
endif;

add_action( 'woocommerce_after_main_content', 'quest_woocommerce_after_main_content' );