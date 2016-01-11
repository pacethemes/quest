<script type="text/template" id="pt-pb-tmpl-module-generic-slider">
	<div class="pt-pb-wrap">
		<div class="pt-pb-generic-slider-preview">
			<div class="generic-slider-container clearfix">
				<b><?php _e( 'Slider ID', 'quest' ); ?> :</b> {{{slider_id}}}
			</div>
		</div>

		<div class="pt-pb-generic-slider-edit reveal-modal">
			<h2><?php _e( 'Edit Slider', 'quest' ); ?></h2>
			<input name="{{{pre}}}[id]" type="hidden" value="{{{id}}}">
			<input name="{{{pre}}}[type]" type="hidden" value="{{{type}}}">
			<div class="edit-content">
				<# if(type === 'meta') { #>
				<div class="pt-pb-option">
					<label for="slider_id"><?php _e( 'Select Slider', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						
						<select name="{{{pre}}}[slider_id]">
							<option value=""><?php _e( 'Select Slider', 'quest' ); ?></option>
							<?php echo PT_PageBuilder::GetMetaSliders(); ?>
						</select>

						<p class="description"><?php _e( 'Select the Slider', 'quest' ) ?></p>
					</div>
				</div>
				<# } #>
				{{{ptPbApp.partial('form-css-class', { css_class: css_class, pre: pre })}}}
			</div>

			<div class="edit-bottom">
				<input type="button" class="button button-primary save-generic-slider" value="Save"/>
				<input type="button" class="button close-model" value="Close"/>
			</div>
		</div>		

	</div>
</script>