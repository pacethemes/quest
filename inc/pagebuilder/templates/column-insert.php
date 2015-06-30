<script type="text/template" id="pt-pb-insert-column-template">
	<h2><?php _e( 'Select Layout', 'quest' ); ?></h2>
	<div class="edit-content">
		<div class="quest-plus-message">
			<strong><?php _e( 'Need more layout options ?', 'quest' ); ?> <span
					class="quest-plus">Quest Plus</span> </strong> <br/>
			<a href="<?php echo self::$QUEST_PLUS_URI; ?>"
			   target="_blank"><?php _e( 'Upgrade to Quest Plus', 'quest' ); ?></a>
		</div>
		<ul class="column-layouts">
			<li data-layout="1-1">
				<div class="column-layout full-width"></div>
			</li>
			<li data-layout="1-2,1-2">
				<div class="column-layout column-layout-1_2"></div>
				<div class="column-layout column-layout-1_2"></div>
			</li>
			<li data-layout="1-3,1-3,1-3">
				<div class="column-layout column-layout-1_3"></div>
				<div class="column-layout column-layout-1_3"></div>
				<div class="column-layout column-layout-1_3"></div>
			</li>
			<li data-layout="1-4,1-4,1-4,1-4">
				<div class="column-layout column-layout-1_4"></div>
				<div class="column-layout column-layout-1_4"></div>
				<div class="column-layout column-layout-1_4"></div>
				<div class="column-layout column-layout-1_4"></div>
			</li>
			<?php
			/*
			* Action hook to add custom layouts
			*/
			do_action( 'pt_pb_column_layouts' );
			?>
		</ul>
	</div>
</script>