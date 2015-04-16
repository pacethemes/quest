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
<?php $favicon =  quest_get_mod( 'logo_favicon' ); 
if ( $favicon !== '' ): ?>
	<link rel="icon" href="<?php echo esc_url( $favicon ); ?>" />
<?php endif; ?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class( quest_get_mod( 'layout_global_site' ) ); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'Quest' ); ?></a>

	<header id="masthead" class="main-header" role="banner">
		<div class="container">
			<div class="row">
				<div class="site-branding col-md-4">

				<?php $logo =  quest_get_mod( 'logo_logo' ); 
					if ( $logo !== '' ): ?>
						<h1 class="logo">
							<a href="<?php echo esc_url( home_url() ); ?>">
								<img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo('name') ?> | <?php bloginfo('description') ?>">
							</a>
						</h1>
				<?php endif; ?>

				<?php if ( !quest_get_mod( 'title_tagline_hide_title' ) ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php endif; ?>

				<?php if ( !quest_get_mod( 'title_tagline_hide_tagline' ) ) : ?>
					<span class="site-description"><?php bloginfo( 'description' ); ?></span>
				<?php endif; ?>

				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation col-md-8" role="navigation">
					  <div class="navbar-toggle" data-toggle="collapse" data-target="#main-menu-collapse">
					    <span class="menu-text"><?php _e('Menu', 'infinite-framework') ?></span>
					      <i class="fa fa-reorder"></i>
					  </div>
					<div class="navbar-collapse collapse" id="main-menu-collapse">
					<?php if (has_nav_menu('primary')) {
							wp_nav_menu( array(
									'theme_location' => 'primary',
									'menu_class' => 'nav navbar-nav',
									'container' => false,
									'walker' => new Quest_Main_Menu()
								) );
							} else {
								quest_wp_page_menu( /*array( 'menu_class' => 'navbar-collapse collapse' )*/ );
							}
						?>
					</div>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->
