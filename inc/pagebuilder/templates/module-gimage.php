<script type="text/template" id="pt-pb-tmpl-module-gimage">
	<div title="Drag-and-drop this column into place"
	     class="pt-pb-column-header pt-pb-column-sortable ui-sortable-handle">
		<div class="sortable-background column-sortable-background"></div>
	</div>
	<div class="pt-pb-column-content">
		{{{ptPbApp.partial('module-header', { admin_label: admin_label, module: 'gimage' })}}}
		<div class="gimage-content-preview"
		{{{src != '' ? 'style="background-image:url(' + src + ');"' : void 0}}}>
		<#if (src == "") {#>
		<div class="slide-dummy-image"><a href="#" title="<?php _e( 'Edit Image', 'quest' ); ?>"><i
					class="dashicons dashicons-format-image"></i></a></div>
		<# }#>
	</div>
	</div>
</script>