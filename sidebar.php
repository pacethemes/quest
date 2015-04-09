<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package trivoo-free
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area main-sidebar col-md-3" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->