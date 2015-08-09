<script type="text/template" id="pt-pb-module-slide-edit-template">
	<h2><?php _e( 'Edit Image', 'quest' ); ?></h2>
	<div class="edit-content">
		<form>

			<div class="pt-pb-option">
				<label for="bg_image"><?php _e( 'Select Image', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="bg_image" type="text" class="regular-text pt-pb-upload-field"
					       value="<%= bg_image %>">
					<input type="button" class="button pt-pb-upload-button" value="Upload" data-type="image"
					       data-choose="<?php _e( 'Select Image', 'quest' ); ?>"
					       data-update="<?php _e( 'Select Image', 'quest' ); ?>">
					<input type="button" class="button pt-pb-remove-upload-button" value="Remove"
					       data-type="image">

					<p class="description"><?php _e( 'Select the slide image', 'quest' ); ?></p>

					<div class="screenshot"></div>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="bg_pos_x"><?php _e( 'Image Position - Horizontal', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<select name="bg_pos_x">
						<option value="center"
						<%= bg_pos_x == 'center' ? 'selected' : void 0 %>
						><?php _e( 'Center', 'quest' ); ?></option>
						<option value="left"
						<%= bg_pos_x == 'left' ? 'selected' : void 0 %>
						><?php _e( 'Left', 'quest' ); ?></option>
						<option value="right"
						<%= bg_pos_x == 'right' ? 'selected' : void 0 %>
						><?php _e( 'Right', 'quest' ); ?></option>
					</select>

					<p class="description"><?php _e( 'Horizontal position of the Image, if the image width is more than the slider width then the image will be positioned as per this setting', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="bg_pos_y"><?php _e( 'Image Position - Vertical', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<select name="bg_pos_y">
						<option value="center"
						<%= bg_pos_y == 'center' ? 'selected' : void 0 %>
						><?php _e( 'Center', 'quest' ); ?></option>
						<option value="top"
						<%= bg_pos_y == 'top' ? 'selected' : void 0 %> ><?php _e( 'Top', 'quest' ); ?></option>
						<option value="bottom"
						<%= bg_pos_y == 'bottom' ? 'selected' : void 0 %>
						><?php _e( 'Bottom', 'quest' ); ?></option>
					</select>

					<p class="description"><?php _e( 'Vertical position of the Image, if the image height is more than the slider height then the image will be positioned as per this setting', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="bg_color"><?php _e( 'Slide Background Color', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="bg_color" class="pt-pb-color color-picker" data-alpha="true" type="text"
					       value="<%= bg_color %>"/>

					<p class="description"><?php _e( 'Background Color for the slide', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="content_pos_x"><?php _e( 'Content Position - Horizontal', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<select name="content_pos_x">
						<option value="center"
						<%= content_pos_x == 'center' ? 'selected' : void 0 %>
						><?php _e( 'Center', 'quest' ); ?></option>
						<option value="left"
						<%= content_pos_x == 'left' ? 'selected' : void 0 %>
						><?php _e( 'Left', 'quest' ); ?></option>
						<option value="right"
						<%= content_pos_x == 'right' ? 'selected' : void 0 %>
						><?php _e( 'Right', 'quest' ); ?></option>
					</select>

					<p class="description"><?php _e( 'Horizontal position of the Content', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="content_pos_y"><?php _e( 'Content Position - Vertical', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<select name="content_pos_y">
						<option value="center"
						<%= content_pos_y == 'center' ? 'selected' : void 0 %>
						><?php _e( 'Center', 'quest' ); ?></option>
						<option value="top"
						<%= content_pos_y == 'top' ? 'selected' : void 0 %> ><?php _e( 'Top', 'quest' ); ?></option>
						<option value="bottom"
						<%= content_pos_y == 'bottom' ? 'selected' : void 0 %>
						><?php _e( 'Bottom', 'quest' ); ?></option>
					</select>

					<p class="description"><?php _e( 'Vertical position of the Content', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="heading"><?php _e( 'Slide Heading', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="heading" class="regular-text" type="text" value="<%= heading %>"/>

					<p class="description"><?php _e( 'The heading for the slide, this will be the main heading/title displayed in the slide frontend', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="heading_color"><?php _e( 'Slide Heading Text Color', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="heading_color" class="pt-pb-color color-picker" data-alpha="true" type="text"
					       value="<%= heading_color %>"/>

					<p class="description"><?php _e( 'Text Color for the heading', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="heading_bg_color"><?php _e( 'Slide Heading Background Color', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="heading_bg_color" class="pt-pb-color color-picker" data-alpha="true" type="text"
					       value="<%= heading_bg_color %>"/>

					<p class="description"><?php _e( 'Background Color for the heading', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="heading_size"><?php _e( 'Slide Heading Text Size', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="heading_size" class="regular-text" type="text" value="<%= heading_size %>"/>

					<p class="description"><?php _e( 'Size of the heading text, enter in px', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="text"><?php _e( 'Slide Text', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<textarea name="content" class="hidden"><%= content %> </textarea>

					<p class="description"><?php _e( 'Content for the slide, this will be displayed in the front end below the heading', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="text_color"><?php _e( 'Slide Text Color', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="text_color" class="pt-pb-color color-picker" data-alpha="true" type="text"
					       value="<%= text_color %>"/>

					<p class="description"><?php _e( 'Text Color for the text', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="text_bg_color"><?php _e( 'Slide Text Background Color', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="text_bg_color" class="pt-pb-color color-picker" data-alpha="true" type="text"
					       value="<%= text_bg_color %>"/>

					<p class="description"><?php _e( 'Background Color for the text', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="text_size"><?php _e( 'Slide Text Size', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="text_size" class="regular-text" type="text" value="<%= text_size %>"/>

					<p class="description"><?php _e( 'Size of the slide text, enter in px', 'quest' ) ?></p>
				</div>
			</div>


			<div class="pt-pb-option">
				<label for="orientation"><?php _e( 'Slice Orientation', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<select name="orientation">
						<option value="vertical"
						<%= orientation == 'vertical' ? 'selected' : void 0 %>
						><?php _e( 'Vertical', 'quest' ); ?></option>
						<option value="horizontal"
						<%= orientation == 'false' ? 'selected' : void 0 %>
						><?php _e( 'Horizontal', 'quest' ); ?></option>
					</select>

					<p class="description"><?php _e( 'Should the slices split vertically or horizontally ?', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="slice1_rotation"><?php _e( 'Slice 1 Rotation', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="slice1_rotation" class="regular-text" type="text"
					       value="<%= slice1_rotation %>"/>

					<p class="description"><?php _e( 'Amount of rotation in degrees for the first slice', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="slice2_rotation"><?php _e( 'Slice 2 Rotation', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="slice2_rotation" class="regular-text" type="text"
					       value="<%= slice2_rotation %>"/>

					<p class="description"><?php _e( 'Amount of rotation in degrees for the second slice', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="slice1_scale"><?php _e( 'Slice 1 Scale', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="slice1_scale" class="regular-text" type="text" value="<%= slice1_scale %>"/>

					<p class="description"><?php _e( 'How big should the slice 1 scale ?', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="slice2_scale"><?php _e( 'Slice 2 Scale', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="slice2_scale" class="regular-text" type="text" value="<%= slice2_scale %>"/>

					<p class="description"><?php _e( 'How big should the slice 2 scale ?', 'quest' ) ?></p>
				</div>
			</div>

			<%= partial('pt-pb-form-css-class', { css_class: css_class }) %>
			<%= partial('pt-pb-form-admin-label', { admin_label: admin_label }) %>

		</form>
	</div>
	<div class="edit-bottom">
		<input type="button" class="button button-primary save-slide" value="Save"/>
		<input type="button" class="button close-model" value="Close"/>
	</div>
</script>