<script type="text/template" id="pt-pb-row-template">
	<div class="pt-pb-row-header <%= type %>">
		<h3><?php _e( 'Row', 'quest' ) ?> - <%= type %></h3>

		<div class="pt-pb-controls">
			<a href="#" class="pt-pb-settings-row" title="Edit"><i class="fa fa-cog"></i></a>
			<a href="#" class="pt-pb-clone-row" title="Clone Row"><i class="fa fa-copy"></i></a>
			<a href="#" class="pt-pb-remove-row" title="Delete Row"><i class="fa fa-remove"></i></a>
		</div>
		<a href="#" class="pt-pb-row-toggle" title="Click to toggle">
			<div class="handlediv"><br></div>
		</a>
	</div>
	<div class="pt-pb-row-content"></div>
</script>