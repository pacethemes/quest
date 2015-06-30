<script type="text/template" id="pt-pb-form-animation">
	<div class="pt-pb-option">
		<label for="animation"><?php _e( 'CSS3 Animation', 'quest' ); ?>: </label>

		<div class="pt-pb-option-container">
			<select class="js-animations" name="animation">
				<%= generateOption(animation, '') %>
				<optgroup label="Attention Seekers">
					<%= generateOption(animation, 'bounce') %>
					<%= generateOption(animation, 'flash') %>
					<%= generateOption(animation, 'pulse') %>
					<%= generateOption(animation, 'rubberBand') %>
					<%= generateOption(animation, 'shake') %>
					<%= generateOption(animation, 'swing') %>
					<%= generateOption(animation, 'tada') %>
					<%= generateOption(animation, 'wobble') %>
				</optgroup>

				<optgroup label="Bouncing Entrances">
					<%= generateOption(animation, 'bounceIn') %>
					<%= generateOption(animation, 'bounceInDown') %>
					<%= generateOption(animation, 'bounceInLeft') %>
					<%= generateOption(animation, 'bounceInRight') %>
					<%= generateOption(animation, 'bounceInUp') %>
				</optgroup>

				<optgroup label="Bouncing Exits">
					<%= generateOption(animation, 'bounceOut') %>
					<%= generateOption(animation, 'bounceOutDown') %>
					<%= generateOption(animation, 'bounceOutLeft') %>
					<%= generateOption(animation, 'bounceOutRight') %>
					<%= generateOption(animation, 'bounceOutUp') %>
				</optgroup>

				<optgroup label="Fading Entrances">
					<%= generateOption(animation, 'fadeIn') %>
					<%= generateOption(animation, 'fadeInDown') %>
					<%= generateOption(animation, 'fadeInDownBig') %>
					<%= generateOption(animation, 'fadeInLeft') %>
					<%= generateOption(animation, 'fadeInLeftBig') %>
					<%= generateOption(animation, 'fadeInRight') %>
					<%= generateOption(animation, 'fadeInRightBig') %>
					<%= generateOption(animation, 'fadeInUp') %>
					<%= generateOption(animation, 'fadeInUpBig') %>
				</optgroup>

				<optgroup label="Fading Exits">
					<%= generateOption(animation, 'fadeOut') %>
					<%= generateOption(animation, 'fadeOutDown') %>
					<%= generateOption(animation, 'fadeOutDownBig') %>
					<%= generateOption(animation, 'fadeOutLeft') %>
					<%= generateOption(animation, 'fadeOutLeftBig') %>
					<%= generateOption(animation, 'fadeOutRight') %>
					<%= generateOption(animation, 'fadeOutRightBig') %>
					<%= generateOption(animation, 'fadeOutUp') %>
					<%= generateOption(animation, 'fadeOutUpBig') %>
				</optgroup>

				<optgroup label="Flippers">
					<%= generateOption(animation, 'flip') %>
					<%= generateOption(animation, 'flipInX') %>
					<%= generateOption(animation, 'flipInY') %>
					<%= generateOption(animation, 'flipOutX') %>
					<%= generateOption(animation, 'flipOutY') %>
				</optgroup>

				<optgroup label="Lightspeed">
					<%= generateOption(animation, 'lightSpeedIn') %>
					<%= generateOption(animation, 'lightSpeedOut') %>
				</optgroup>

				<optgroup label="Rotating Entrances">
					<%= generateOption(animation, 'rotateIn') %>
					<%= generateOption(animation, 'rotateInDownLeft') %>
					<%= generateOption(animation, 'rotateInDownRight') %>
					<%= generateOption(animation, 'rotateInUpLeft') %>
					<%= generateOption(animation, 'rotateInUpRight') %>
				</optgroup>

				<optgroup label="Rotating Exits">
					<%= generateOption(animation, 'rotateOut') %>
					<%= generateOption(animation, 'rotateOutDownLeft') %>
					<%= generateOption(animation, 'rotateOutDownRight') %>
					<%= generateOption(animation, 'rotateOutUpLeft') %>
					<%= generateOption(animation, 'rotateOutUpRight') %>
				</optgroup>

				<optgroup label="Specials">
					<%= generateOption(animation, 'hinge') %>
					<%= generateOption(animation, 'rollIn') %>
					<%= generateOption(animation, 'rollOut') %>
				</optgroup>

				<optgroup label="Zoom Entrances">
					<%= generateOption(animation, 'zoomIn') %>
					<%= generateOption(animation, 'zoomInDown') %>
					<%= generateOption(animation, 'zoomInLeft') %>
					<%= generateOption(animation, 'zoomInRight') %>
					<%= generateOption(animation, 'zoomInUp') %>
				</optgroup>

				<optgroup label="Zoom Exits">
					<%= generateOption(animation, 'zoomOut') %>
					<%= generateOption(animation, 'zoomOutDown') %>
					<%= generateOption(animation, 'zoomOutLeft') %>
					<%= generateOption(animation, 'zoomOutRight') %>
					<%= generateOption(animation, 'zoomOutUp') %>
				</optgroup>
			</select>

			<p class="description"><?php _e( 'CSS Animation for the Module', 'quest' ) ?></p>

			<h3 class="animation-preview">Animate</h3>
		</div>
	</div>
</script>