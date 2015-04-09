<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package trivoo-free
 */
?>
	
	<?php if( is_active_sidebar( 'footer-widget' ) ) : ?>
	<footer class="trivoo-row main-footer">
		<div class="container">
			<div class="row">
				<?php dynamic_sidebar( 'footer-widget' ); ?>
			</div>
		</div>
	</footer>
	<?php endif; ?>

	<footer id="colophon" class="copyright trivoo-row" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-md-6 copyright-text">
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'trivoo-free' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'trivoo-free' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( __( 'Theme: %1$s by %2$s.', 'trivoo-free' ), 'trivoo-free', '<a href="' . wp_get_theme()->get( 'ThemeURI' ) . '" rel="designer">Trivoo.net</a>' ); ?>
				</div>

				<div class="col-md-6 social-icon-container clearfix">
					<ul>
						<?php
							$social_profiles = array (
								'social_facebook',
								'social_twitter',
								'social_google-plus',
								'social_linkedin',
								'social_youtube',
								'social_vimeo-square',
								'social_instagram',
								'social_flickr',
								'social_pinterest',
								'social_dribbble',
								'social_digg',
							);
							$theme_mods = trivoo_get_mods();
							foreach ( $social_profiles as $profile ) :
								if ( array_key_exists( $profile, $theme_mods ) && esc_url( $theme_mods[ $profile ] ) !== '' ) :
									$title = ucwords( str_replace( 'social_', '', $profile ) );
							?>
									<li>
										<a data-toggle="tooltip" title="<?php echo $title; ?>" target="_blank" data-original-title="<?php echo $title; ?>" class="social-icon fa fa-<?php echo strtolower( $title ) ?>" href="<?php echo esc_url( $theme_mods[ $profile ] )  ?>"></a>
									</li>
								<?php endif;
							endforeach;
							?>
					</ul>
				</div>

			</div> <!-- end row -->
		</div> <!-- end container -->
	</div> <!-- end trivoo-row -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
