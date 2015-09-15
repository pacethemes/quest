<script type="text/template" id="pt-pb-tmpl-row">
	<div class="pt-pb-wrap">
		<div class="pt-pb-row-preview">
			<div class="pt-pb-row-header {{{type}}}">
				<h3 class="pt-pb-row-label">{{{admin_label}}}</h3>

				<div class="pt-pb-controls">
					<#if (type === "columns") {#>
					<a href="#" class="pt-pb-settings-columns" title="Columns Settings"><i class="fa fa-columns"></i></a>
					<#} else if (type === "gallery") {#>
					<a href="#" class="pt-pb-settings-gallery" title="Gallery Settings"><i
							class="dashicons dashicons-format-gallery"></i></a>
					<#} else if (type === "slider") {#>
					<a href="#" class="pt-pb-settings-slider" title="Slider Settings"><i
							class="dashicons dashicons-images-alt"></i></a>
					<#}#>

					<a href="#" class="pt-pb-settings-row" title="Row Settings"><i class="fa fa-cog"></i></a>
					<a href="#" class="pt-pb-clone-row" title="Clone Row"><i class="fa fa-copy"></i></a>
					<a href="#" class="pt-pb-remove-row" title="Delete Row"><i class="fa fa-remove"></i></a>
				</div>
				<a href="#" class="pt-pb-row-toggle" title="Click to toggle">
					<div class="handlediv"><br></div>
				</a>
			</div>
			<div class="pt-pb-row-content"></div>
		</div>

		<div class="pt-pb-row-edit reveal-modal">
			<h2><?php _e( 'Edit Row', 'quest' ); ?></h2>
			<input name="{{{pre}}}[id]" type="hidden" value="{{{id}}}">
			<input name="{{{pre}}}[type]" type="hidden" value="{{{type}}}">
			<div class="edit-content">
				<div class="pt-pb-option">
					<label for="vertical_align"><?php _e( 'Columns Vertical Alignment', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<select name="{{{pre}}}[vertical_align]">
							<option value="default"
							{{{vertical_align == 'default' ? 'selected' : void 0}}}
							><?php _e( 'Default', 'quest' ); ?></option>
							<option value="top"
							{{{vertical_align == 'top' ? 'selected' : void 0}}}
							><?php _e( 'Top', 'quest' ); ?></option>
							<option value="middle"
							{{{vertical_align == 'middle' ? 'selected' : void 0}}}
							><?php _e( 'Middle', 'quest' ); ?></option>
							<option value="bottom"
							{{{vertical_align == 'bottom' ? 'selected' : void 0}}}
							><?php _e( 'Bottom', 'quest' ); ?></option>
						</select>

						<p class="description"><?php _e( 'Vertical Alignment of the columns', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="padding_top"><?php _e( 'Padding Top', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[padding_top]" class="regular-text" type="text" value="{{{padding_top}}}"/>

						<p class="description"><?php _e( 'Padding (Spacing) at the top', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="padding_bottom"><?php _e( 'Padding Bottom', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[padding_bottom]" class="regular-text" type="text"
						       value="{{{padding_bottom}}}"/>

						<p class="description"><?php _e( 'Padding (Spacing) at the Bottom', 'quest' ) ?></p>
					</div>
				</div>

				{{{ptPbApp.partial('form-admin-label', { admin_label: admin_label, pre: pre })}}}
				
			</div>
			<div class="edit-bottom">
				<input type="button" class="button button-primary save-row" value="Save"/>
				<input type="button" class="button close-model" value="Close"/>
			</div>
		</div>
	</div>
</script>