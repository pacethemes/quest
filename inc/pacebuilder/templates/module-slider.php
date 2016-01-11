<script type="text/template" id="pt-pb-tmpl-module-slider">
	<div class="pt-pb-wrap">
		<div class="pt-pb-slider-preview">
			<div class="slider-container clearfix"></div>
			<div class="pt-pb-add-slide">
				<a href="#" class="pt-pb-insert-slide pt-pb-btn"><i
						class="dashicons dashicons-format-image"></i> <?php _e( 'New Slide', 'quest' ) ?></a>
			</div>
		</div>

		<div class="pt-pb-slider-edit reveal-modal">
			<h2><?php _e( 'Edit Slider', 'quest' ); ?></h2>
			<input name="{{{pre}}}[id]" type="hidden" value="{{{id}}}">
			<div class="edit-content">
				<div class="pt-pb-option">
					<label for="height"><?php _e( 'Slider Height', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[height]" class="regular-text" type="text" value="{{{height}}}"/>

						<p class="description"><?php _e( 'Height of the slider', 'quest' ) ?></p>
					</div>
				</div>


				<div class="pt-pb-option">
					<label for="autoplay"><?php _e( 'Slider AutoPlay', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<select name="{{{pre}}}[autoplay]">
							<option value="true"
							{{{autoplay == 'true' ? 'selected' : void 0}}} ><?php _e( 'Yes', 'quest' ); ?></option>
							<option value="false"
							{{{autoplay == 'false' ? 'selected' : void 0}}} ><?php _e( 'No', 'quest' ); ?></option>
						</select>

						<p class="description"><?php _e( 'Do you want to enable AutoPlay for this slider ? If autoplay is turned on, you can control the interval below', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="interval"><?php _e( 'AutoPlay Interval', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[interval]" class="regular-text" type="text" value="{{{interval}}}"/>

						<p class="description"><?php _e( 'Interval between playing the next slide, specify the time in milliseconds ( 1 second = 1000 milliseconds. You already knew this, didn\'t you :) )', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="animation"><?php _e( 'Slider Transition', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<select name="{{{pre}}}[animation]">
							<option value="slit"
							{{{animation == 'slit' ? 'selected' : void 0}}} ><?php _e( 'Slit', 'quest' ); ?></option>
							<option value="fade"
							{{{animation == 'fade' ? 'selected' : void 0}}} ><?php _e( 'Fade', 'quest' ); ?></option>
						</select>

						<p class="description"><?php _e( 'Transition type for the slider, Slit or Fade ?', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="speed"><?php _e( 'Transition Speed', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[speed]" class="regular-text" type="text" value="{{{speed}}}"/>

						<p class="description"><?php _e( 'Speed of the CSS3 slide transitions, specify the time in milliseconds ( 1 second = 1000 milliseconds. You already knew this, didn\'t you :) )', 'quest' ) ?></p>
					</div>
				</div>

				{{{ptPbApp.partial('form-css-class', { css_class: css_class, pre: pre })}}}
			</div>
			<div class="edit-bottom">
				<input type="button" class="button button-primary save-slider" value="Save"/>
				<input type="button" class="button close-model" value="Close"/>
			</div>
		</div>		

	</div>
</script>