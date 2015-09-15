<script type="text/template" id="pt-pb-tmpl-column">
	<div class="pt-pb-wrap">
		<div class="pt-pb-column-preview">
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
		</div>
		<input name="{{{pre}}}[id]" type="hidden" value="{{{id}}}">
		<input name="{{{pre}}}[type]" type="hidden" value="{{{type}}}">

		<div class="pt-pb-insert-modules reveal-modal">
			<h2><?php _e( 'Select Module', 'quest' ); ?></h2>
			<div class="edit-content">
				<div class="column-modules">
					<#_.each(modules, function(attr, module){#>
					<a class="column-module" href="#" data-module="{{{module.toLowerCase()}}}"><i
							class="dashicons dashicons-{{{attr.icon}}}"></i> {{{attr.admin_label}}}</a>
					<#});#>
				</div>
			</div>
		</div>
	</div>
</script>