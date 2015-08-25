<script type="text/template" id="pt-pb-tmpl-column">
	<div title="Drag-and-drop this column into place"
	     class="pt-pb-column-header pt-pb-column-sortable ui-sortable-handle">
		<div class="sortable-background column-sortable-background">
		<?php _e('Column', 'quest'); ?> : {{{ type }}}
		</div>
	</div>
	<div class="pt-pb-column-content"></div>
	<div class="pt-pb-column-foot">
		<a href="#" class="pt-pb-insert-module"><span> <i class="fa fa-plus-circle"></i> <?php _e( 'Add Module', 'quest' ) ?></span></a>
	</div>
</script>