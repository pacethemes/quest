<?php
/**
 * The template for displaying search form.
 *
 * @package Quest
 */
?>
<form class="search" action="<?php echo home_url(); ?>/" method="get">
	<fieldset>
		<div class="text"><input name="s" id="s" type="text" placeholder="<?php _e('Search ...', 'quest'); ?>" /><button class="fa fa-search"><?php _e('Search', 'quest')?></button></div>
	</fieldset>
</form>