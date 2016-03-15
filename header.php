<?php
/**
 * The header for quest.
 *
 * Displays all of the <head> section and everything up till end of </header>
 *
 * @package Quest
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( quest_get_mod( 'layout_global_site' ) ); ?>>
	<?php
		/**
		 * Custom action before page
		 */
		do_action( 'quest_before_page' );
	?>
	
	<div id="page" class="hfeed site">

		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'quest' ); ?></a>

		<?php

		/**
		 * Custom action before main header
		 */
		do_action( 'quest_before_header' );

		/**
		 * Filter Header container class
		 */
		$header_container_cls = apply_filters( 'quest_header_container_cls', 'container' );
		?>

		<?php if ( quest_get_mod( 'layout_header_secondary' ) ) : ?>
			<header id="secondary-head" class="secondary-header" role="banner">
				<div class="<?php echo $header_container_cls; ?>">
					<div class="row">
						<?php quest_second_header(); ?>
					</div>
				</div>
			</header>
			<!-- #secondary-head -->
		<?php endif; ?>

		<header id="masthead" class="main-header" role="banner">
			<div class="<?php echo $header_container_cls; ?>">
				<div class="row">
					<?php quest_site_branding( 'col-md-4' ); ?>
					
					<?php echo quest_main_menu_html(); ?>
				</div>
			</div>
		</header>
		<!-- #masthead -->

		<?php

		/**
		 * Custom action after main header
		 */
		do_action( 'quest_after_header' );
		?>