<?php
/**
 * The template for displaying search form.
 *
 * @package trivoo-free
 */
?>
<form class="search" action="<?php echo home_url(); ?>/" method="get">
	<fieldset>
		<div class="text"><input name="s" id="s" type="text" placeholder="<?php _e('Search ...', 'trivoo-framework'); ?>" /><button class="fa fa-search"><?php _e('Search', 'trivoo-framework')?></button></div>
	</fieldset>
</form>