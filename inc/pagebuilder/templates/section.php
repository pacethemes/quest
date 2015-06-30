<script type="text/template" id="pt-pb-section-template">
	<div class="pt-pb-header">
		<h3><?php _e( 'Section', 'quest' ); ?></h3>

		<div class="pt-pb-controls">
			<a href="#" class="pt-pb-settings pt-pb-settings-section"
			   title="<?php _e( 'Edit Section', 'quest' ); ?>"><i class="fa fa-cog"></i></a>
			<a href="#" class="pt-pb-clone pt-pb-clone-section"
			   title="<?php _e( 'Clone Section', 'quest' ); ?>"><i class="fa fa-copy"></i></a>
			<a href="#" class="pt-pb-remove" title="<?php _e( 'Delete Section', 'quest' ); ?>"><i
					class="fa fa-remove"></i></a>
		</div>
		<a href="#" class="pt-pb-section-toggle" title="<?php _e( 'Click to toggle', 'quest' ); ?>">
			<div class="handlediv"><br></div>
		</a>
	</div>
	<div class="pt-pb-content-wrap">
		<div class="pt-pb-content clearfix">

		</div>

		<div class="pt-pb-content-foot">
			<a href="#" class="section-type pt-pb-insert-column"><i
					class="fa fa-columns"></i> <?php _e( 'Columns', 'quest' ); ?></a>
			<a href="#" class="section-type pt-pb-insert-slider"><i
					class="dashicons dashicons-images-alt"></i> <?php _e( 'Image Slider', 'quest' ); ?></a>
			<a href="#" class="section-type pt-pb-insert-gallery"><i
					class="dashicons dashicons-format-gallery"></i> <?php _e( 'Gallery', 'quest' ); ?></a>

			<div class="quest-plus-message">
				<strong><?php _e( 'Need more section options ?', 'quest' ); ?> <span
						class="quest-plus">Quest Plus</span>
				</strong> <br/>
				<a href="<?php echo self::$QUEST_PLUS_URI; ?>"
				   target="_blank"><?php _e( 'Upgrade to Quest Plus', 'quest' ); ?></a>
			</div>
		</div
	</div>
</script>