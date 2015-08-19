<script type="text/template" id="pt-pb-tmpl-module-header">
	<div class="module-controls">
		<div class="edit-module edit-module-{{{typeof module != 'undefined' ? module : 'module'}}}">
			<a href="#" title="<?php _e( 'Edit Module', 'quest' ) ?>" class="edit"><i class="fa fa-pencil"></i></a>
			<a href="#" title="<?php _e( 'Remove Module', 'quest' ) ?>" class="remove"><i
					class="fa fa-remove"></i></a>
		</div>
		<div class="admin-label">{{{admin_label}}}</div>
		<a href="#" class="pt-pb-module-toggle" title="<?php _e( 'Click to toggle', 'quest' ); ?>">
			<div class="handlediv"><br></div>
		</a>
	</div>
</script>