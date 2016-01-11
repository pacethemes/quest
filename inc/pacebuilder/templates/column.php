<script type="text/template" id="pt-pb-tmpl-column">
	<div class="pt-pb-wrap">
		<div class="pt-pb-column-preview">
			<div title="Drag-and-drop this column into place"
			     class="pt-pb-column-header pt-pb-column-sortable ui-sortable-handle">
				<div class="sortable-background column-sortable-background">
				<?php _e('Column', 'quest'); ?> : {{{ type }}}
				</div>
				<div class="pt-pb-controls">
					<a href="#" class="pt-pb-settings-column" title="Column Settings"><i class="fa fa-cog"></i></a>
				</div>
			</div>
			<div class="pt-pb-column-content"></div>
			<div class="pt-pb-column-foot">
				<a href="#" class="pt-pb-insert-module"><span> <i class="fa fa-plus-circle"></i> <?php _e( 'Add Module', 'quest' ) ?></span></a>
			</div>
		</div>
		<input name="{{{pre}}}[id]" type="hidden" value="{{{id}}}">
		<input name="{{{pre}}}[type]" type="hidden" value="{{{type}}}">

		<div class="pt-pb-column-edit-r reveal-modal">
			<h2><?php _e( 'Edit Column', 'quest' ); ?></h2>
			<div class="edit-content">

				<div class="pt-pb-option">
					<label for="bg_color"><?php _e( 'Background Color', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[bg_color]" class="pt-pb-color color-picker" data-alpha="true" type="text"
						       value="{{{bg_color}}}"/>

						<p class="description"><?php _e( 'Background Color for the column, leave it blank if you dont want a Background Color', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="border_left_width"><?php _e( 'Border Left Width', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[border_left_width]" class="regular-text" type="text"
						       value="{{{border_left_width}}}"/>

						<p class="description"><?php _e( 'Border width for the section left', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="border_right_width"><?php _e( 'Border Right Width', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[border_right_width]" class="regular-text" type="text"
						       value="{{{border_right_width}}}"/>

						<p class="description"><?php _e( 'Border width for the section right', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="border_left_color"><?php _e( 'Border Left Color', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[border_left_color]" class="pt-pb-color color-picker" data-alpha="true" type="text"
						       value="{{{border_left_color}}}"/>

						<p class="description"><?php _e( 'Border color for the section left', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="border_right_color"><?php _e( 'Border Right Color', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[border_right_color]" class="pt-pb-color color-picker" data-alpha="true" type="text"
						       value="{{{border_right_color}}}"/>

						<p class="description"><?php _e( 'Border color for the section right', 'quest' ) ?></p>
					</div>
				</div>
				
			</div>
			<div class="edit-bottom">
				<input type="button" class="button button-primary save-column" value="Save"/>
				<input type="button" class="button close-model" value="Close"/>
			</div>
		</div>


		<div class="pt-pb-insert-modules reveal-modal">
			<h2><?php _e( 'Select Module', 'quest' ); ?></h2>
			<div class="edit-content">
				<div class="column-modules">
					<#  _.each(ptPbApp.ModulesList, function(attr, module){#>
					<a class="column-module" href="#" data-module="{{{module.toLowerCase()}}}"><i
							class="dashicons dashicons-{{{attr.icon}}}"></i> {{{attr.admin_label}}}</a>
					<#});#>
				</div>
			</div>
		</div>
	</div>
</script>