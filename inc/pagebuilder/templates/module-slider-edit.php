<script type="text/template" id="pt-pb-module-slider-edit-template">
	<h2><?php _e( 'Edit Slider', 'quest' ); ?></h2>
	<div class="edit-content">
		<form>

			<div class="pt-pb-option">
				<label for="height"><?php _e( 'Slider Height', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="height" class="regular-text" type="text" value="<%= height %>"/>

					<p class="description"><?php _e( 'Height of the slider', 'quest' ) ?></p>
				</div>
			</div>


			<div class="pt-pb-option">
				<label for="autoplay"><?php _e( 'Slider AutoPlay', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<select name="autoplay">
						<option value="true"
						<%= autoplay == 'true' ? 'selected' : void 0 %> ><?php _e( 'Yes', 'quest' ); ?></option>
						<option value="false"
						<%= autoplay == 'false' ? 'selected' : void 0 %> ><?php _e( 'No', 'quest' ); ?></option>
					</select>

					<p class="description"><?php _e( 'Do you want to enable AutoPlay for this slider ? If autoplay is turned on, you can control the interval below', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="interval"><?php _e( 'AutoPlay Interval', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="interval" class="regular-text" type="text" value="<%= interval %>"/>

					<p class="description"><?php _e( 'Interval between playing the next slide, specify the time in milliseconds ( 1 second = 1000 milliseconds. You already knew this, didn\'t you :) )', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="speed"><?php _e( 'Transition Speed', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="speed" class="regular-text" type="text" value="<%= speed %>"/>

					<p class="description"><?php _e( 'Speed of the CSS3 slide transitions, specify the time in milliseconds ( 1 second = 1000 milliseconds. You already knew this, didn\'t you :) )', 'quest' ) ?></p>
				</div>
			</div>

			<%= partial('pt-pb-form-css-class', { css_class: css_class }) %>
			<%= partial('pt-pb-form-admin-label', { admin_label: admin_label }) %>

		</form>
	</div>
	<div class="edit-bottom">
		<input type="button" class="button button-primary save-slider" value="Save"/>
		<input type="button" class="button close-model" value="Close"/>
	</div>
</script>