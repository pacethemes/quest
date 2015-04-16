<?php
/**
 * @package Trivoo
 */
?>

<?php if ( is_sticky() && $sticky_label = trivoo_get_mod( 'sticky_label' ) ) : ?>
	<div class="sticky-label">
		<span class="sticky-post-label">
			<?php echo esc_html( wp_strip_all_tags( $sticky_label ) ); ?>
		</span>
	</div>
<?php endif;