<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Quest
 */
?>

<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
	<footer class="quest-row main-footer">
		<div class="container">
			<div class="row">
				<?php dynamic_sidebar( 'footer-widget' ); ?>
			</div>
		</div>
	</footer>
<?php endif; ?>

<footer id="colophon" class="copyright quest-row" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="col-md-6 copyright-text">
				<a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>"><?php printf( __( 'Proudly powered by %s', 'quest' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'quest' ), 'quest', '<a href="' . wp_get_theme()->get( 'ThemeURI' ) . '" rel="designer">' . wp_get_theme()->get( 'Author' ) . '</a>' ); ?>
			</div>

			<div class="col-md-6 social-icon-container clearfix">
				<ul>
					<?php quest_footer_social_icons(); ?>
				</ul>
			</div>

		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
	</div> <!-- end quest-row -->

	</div><!-- #page -->

	<?php wp_footer(); ?>

	<a href="#0" class="cd-top"><i class="fa fa-angle-up"></i></a>

	</body>
	</html>
