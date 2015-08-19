<script type="text/template" id="pt-pb-tmpl-insert-module">
	<h2><?php _e( 'Select Module', 'quest' ); ?></h2>
	<div class="edit-content">
		<div class="column-modules">
			<#_.each(modules, function(attr, module){#>
			<a class="column-module" href="#" data-module="{{{module.toLowerCase()}}}"><i
					class="dashicons dashicons-{{{attr.icon}}}"></i> {{{attr.admin_label}}}</a>
			<#});#>
		</div>
	</div>
</script>