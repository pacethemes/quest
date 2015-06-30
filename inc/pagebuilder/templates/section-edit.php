<script type="text/template" id="pt-pb-section-edit-template">
	<h2><?php _e( 'Edit Section', 'quest' ); ?></h2>
	<div class="edit-content">
		<form action="#">

			<div class="pt-pb-option">
				<label for="bg_image"><?php _e( 'Background Image', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="bg_image" type="text" class="regular-text pt-pb-upload-field"
					       value="<%= bg_image %>">
					<input type="button" class="button pt-pb-upload-button" value="Upload" data-type="image"
					       data-choose="<?php _e( 'Select Background Image', 'quest' ); ?>"
					       data-update="<?php _e( 'Select Image', 'quest' ); ?>">
					<input type="button" class="button pt-pb-remove-upload-button" value="Remove"
					       data-type="image">

					<p class="description"><?php _e( 'If defined, this image will be used as the background for this section. To remove a background image, simply delete the URL from the settings field.', 'quest' ); ?></p>

					<div class="screenshot"></div>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="bg_attach"><?php _e( 'Background Image Attachment', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<select name="bg_attach">
						<option value="fixed"
						<%= bg_attach == 'fixed' ? 'selected' : void 0 %>
						><?php _e( 'Fixed', 'quest' ); ?></option>
						<option value="scroll"
						<%= bg_attach == 'scroll' ? 'selected' : void 0 %>
						><?php _e( 'Scroll', 'quest' ); ?></option>
					</select>

					<p class="description"><?php _e( 'Scroll - The background scrolls along with the element. Fixed - The background is fixed with regard to the viewport', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="bg_color"><?php _e( 'Background Color', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="bg_color" class="pt-pb-color" type="text" value="<%= bg_color %>"/>

					<p class="description"><?php _e( 'Background Color for the section, leave it blank to set a transparent color', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="content_type"><?php _e( 'Content Type', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<select name="content_type">
						<option value="boxed"
						<%= content_type == 'boxed' ? 'selected' : void 0 %>
						><?php _e( 'Boxed', 'quest' ); ?></option>
						<option value="fluid"
						<%= content_type == 'fluid' ? 'selected' : void 0 %>
						><?php _e( 'Fluid', 'quest' ); ?></option>
					</select>

					<p class="description"><?php _e( 'Boxed - Section content will be fixed to 1170px or corresponding device width. Fluid - Section content will be 100% width to the browser width', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="text_color"><?php _e( 'Text Color', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="text_color" class="pt-pb-color" type="text" value="<%= text_color %>"/>

					<p class="description"><?php _e( 'Text Color for the section', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="padding_top"><?php _e( 'Padding Top', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="padding_top" class="regular-text" type="text" value="<%= padding_top %>"/>

					<p class="description"><?php _e( 'Padding (Spacing) at the top', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="padding_bottom"><?php _e( 'Padding Bottom', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="padding_bottom" class="regular-text" type="text"
					       value="<%= padding_bottom %>"/>

					<p class="description"><?php _e( 'Padding (Spacing) at the Bottom', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="border_top_width"><?php _e( 'Border Top Width', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="border_top_width" class="regular-text" type="text"
					       value="<%= border_top_width %>"/>

					<p class="description"><?php _e( 'Border width for the section top', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="border_bottom_width"><?php _e( 'Border Bottom Width', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="border_bottom_width" class="regular-text" type="text"
					       value="<%= border_bottom_width %>"/>

					<p class="description"><?php _e( 'Border width for the section bottom', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="border_top_color"><?php _e( 'Border Top Color', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="border_top_color" class="pt-pb-color" type="text"
					       value="<%= border_top_color %>"/>

					<p class="description"><?php _e( 'Border color for the section top', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="border_bottom_color"><?php _e( 'Border Bottom Color', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="border_bottom_color" class="pt-pb-color" type="text"
					       value="<%= border_bottom_color %>"/>

					<p class="description"><?php _e( 'Border color for the section bottom', 'quest' ) ?></p>
				</div>
			</div>

			<%= partial('pt-pb-form-css-class', { css_class: css_class }) %>

		</form>
	</div>
	<div class="edit-bottom">
		<input type="button" class="button button-primary save-section" value="Save"/>
		<input type="button" class="button close-model" value="Close"/>
	</div>
</script>