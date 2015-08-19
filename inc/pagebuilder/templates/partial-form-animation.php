<script type="text/template" id="pt-pb-tmpl-form-animation">
	<div class="pt-pb-option">
		<label for="animation"><?php _e( 'CSS3 Animation', 'quest' ); ?>: </label>

		<div class="pt-pb-option-container">
			<select class="js-animations" name="animation">
					{{{ptPbApp.generateOption(animation, '', 'none')}}}
				<optgroup label="Attention Seekers">
					{{{ptPbApp.generateOption(animation, 'bounce')}}}
					{{{ptPbApp.generateOption(animation, 'flash')}}}
					{{{ptPbApp.generateOption(animation, 'pulse')}}}
					{{{ptPbApp.generateOption(animation, 'rubberBand')}}}
					{{{ptPbApp.generateOption(animation, 'shake')}}}
					{{{ptPbApp.generateOption(animation, 'swing')}}}
					{{{ptPbApp.generateOption(animation, 'tada')}}}
					{{{ptPbApp.generateOption(animation, 'wobble')}}}
				</optgroup>

				<optgroup label="Bouncing Entrances">
					{{{ptPbApp.generateOption(animation, 'bounceIn')}}}
					{{{ptPbApp.generateOption(animation, 'bounceInDown')}}}
					{{{ptPbApp.generateOption(animation, 'bounceInLeft')}}}
					{{{ptPbApp.generateOption(animation, 'bounceInRight')}}}
					{{{ptPbApp.generateOption(animation, 'bounceInUp')}}}
				</optgroup>

				<optgroup label="Bouncing Exits">
					{{{ptPbApp.generateOption(animation, 'bounceOut')}}}
					{{{ptPbApp.generateOption(animation, 'bounceOutDown')}}}
					{{{ptPbApp.generateOption(animation, 'bounceOutLeft')}}}
					{{{ptPbApp.generateOption(animation, 'bounceOutRight')}}}
					{{{ptPbApp.generateOption(animation, 'bounceOutUp')}}}
				</optgroup>

				<optgroup label="Fading Entrances">
					{{{ptPbApp.generateOption(animation, 'fadeIn')}}}
					{{{ptPbApp.generateOption(animation, 'fadeInDown')}}}
					{{{ptPbApp.generateOption(animation, 'fadeInDownBig')}}}
					{{{ptPbApp.generateOption(animation, 'fadeInLeft')}}}
					{{{ptPbApp.generateOption(animation, 'fadeInLeftBig')}}}
					{{{ptPbApp.generateOption(animation, 'fadeInRight')}}}
					{{{ptPbApp.generateOption(animation, 'fadeInRightBig')}}}
					{{{ptPbApp.generateOption(animation, 'fadeInUp')}}}
					{{{ptPbApp.generateOption(animation, 'fadeInUpBig')}}}
				</optgroup>

				<optgroup label="Fading Exits">
					{{{ptPbApp.generateOption(animation, 'fadeOut')}}}
					{{{ptPbApp.generateOption(animation, 'fadeOutDown')}}}
					{{{ptPbApp.generateOption(animation, 'fadeOutDownBig')}}}
					{{{ptPbApp.generateOption(animation, 'fadeOutLeft')}}}
					{{{ptPbApp.generateOption(animation, 'fadeOutLeftBig')}}}
					{{{ptPbApp.generateOption(animation, 'fadeOutRight')}}}
					{{{ptPbApp.generateOption(animation, 'fadeOutRightBig')}}}
					{{{ptPbApp.generateOption(animation, 'fadeOutUp')}}}
					{{{ptPbApp.generateOption(animation, 'fadeOutUpBig')}}}
				</optgroup>

				<optgroup label="Flippers">
					{{{ptPbApp.generateOption(animation, 'flip')}}}
					{{{ptPbApp.generateOption(animation, 'flipInX')}}}
					{{{ptPbApp.generateOption(animation, 'flipInY')}}}
					{{{ptPbApp.generateOption(animation, 'flipOutX')}}}
					{{{ptPbApp.generateOption(animation, 'flipOutY')}}}
				</optgroup>

				<optgroup label="Lightspeed">
					{{{ptPbApp.generateOption(animation, 'lightSpeedIn')}}}
					{{{ptPbApp.generateOption(animation, 'lightSpeedOut')}}}
				</optgroup>

				<optgroup label="Rotating Entrances">
					{{{ptPbApp.generateOption(animation, 'rotateIn')}}}
					{{{ptPbApp.generateOption(animation, 'rotateInDownLeft')}}}
					{{{ptPbApp.generateOption(animation, 'rotateInDownRight')}}}
					{{{ptPbApp.generateOption(animation, 'rotateInUpLeft')}}}
					{{{ptPbApp.generateOption(animation, 'rotateInUpRight')}}}
				</optgroup>

				<optgroup label="Rotating Exits">
					{{{ptPbApp.generateOption(animation, 'rotateOut')}}}
					{{{ptPbApp.generateOption(animation, 'rotateOutDownLeft')}}}
					{{{ptPbApp.generateOption(animation, 'rotateOutDownRight')}}}
					{{{ptPbApp.generateOption(animation, 'rotateOutUpLeft')}}}
					{{{ptPbApp.generateOption(animation, 'rotateOutUpRight')}}}
				</optgroup>

				<optgroup label="Specials">
					{{{ptPbApp.generateOption(animation, 'hinge')}}}
					{{{ptPbApp.generateOption(animation, 'rollIn')}}}
					{{{ptPbApp.generateOption(animation, 'rollOut')}}}
				</optgroup>

				<optgroup label="Zoom Entrances">
					{{{ptPbApp.generateOption(animation, 'zoomIn')}}}
					{{{ptPbApp.generateOption(animation, 'zoomInDown')}}}
					{{{ptPbApp.generateOption(animation, 'zoomInLeft')}}}
					{{{ptPbApp.generateOption(animation, 'zoomInRight')}}}
					{{{ptPbApp.generateOption(animation, 'zoomInUp')}}}
				</optgroup>

				<optgroup label="Zoom Exits">
					{{{ptPbApp.generateOption(animation, 'zoomOut')}}}
					{{{ptPbApp.generateOption(animation, 'zoomOutDown')}}}
					{{{ptPbApp.generateOption(animation, 'zoomOutLeft')}}}
					{{{ptPbApp.generateOption(animation, 'zoomOutRight')}}}
					{{{ptPbApp.generateOption(animation, 'zoomOutUp')}}}
				</optgroup>
			</select>

			<p class="description"><?php _e( 'CSS Animation for the Module', 'quest' ) ?></p>

			<h3 class="animation-preview">Animate</h3>
		</div>
	</div>
</script>