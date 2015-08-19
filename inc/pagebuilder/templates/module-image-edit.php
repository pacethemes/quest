<script type="text/template" id="pt-pb-tmpl-module-image-edit">
	<h2><?php _e( 'Edit Image', 'quest' ); ?></h2>
	<div class="edit-content">
		<form>
			<div class="pt-pb-option">
				<label for="src"><?php _e( 'Select Image', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="src" type="text" class="regular-text pt-pb-upload-field" value="{{{src}}}">
					<input type="button" class="button pt-pb-upload-button" value="Upload" data-type="image"
					       data-choose="<?php _e( 'Select Image', 'quest' ); ?>"
					       data-update="<?php _e( 'Select Image', 'quest' ); ?>">
					<input type="button" class="button pt-pb-remove-upload-button" value="Remove"
					       data-type="image">

					<p class="description"><?php _e( 'Select the Image you want to insert', 'quest' ); ?></p>

					<div class="screenshot"></div>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="align"><?php _e( 'Alignment', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<select name="align">
						<option value="left"
						{{{align === 'left' ? 'selected' : void 0}}} ><?php _e( 'Left', 'quest' ); ?></option>
						<option value="center"
						{{{align === 'center' ? 'selected' : void 0}}}
						><?php _e( 'Center', 'quest' ); ?></option>
						<option value="right"
						{{{align === 'right' ? 'selected' : void 0}}}
						><?php _e( 'Right', 'quest' ); ?></option>
					</select>

					<p class="description"><?php _e( 'The alignment of the image', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="alt"><?php _e( 'Alt', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="alt" class="regular-text" type="text" value="{{{alt}}}"/>

					<p class="description"><?php _e( 'HTML alt attribute for the image', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="title"><?php _e( 'Title', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="title" class="regular-text" type="text" value="{{{title}}}"/>

					<p class="description"><?php _e( 'HTML title attribute for the image', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="href"><?php _e( 'URL / Hyperlink', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="href" class="regular-text" type="text" value="{{{href}}}"/>

					<p class="description"><?php _e( 'If set the image will be wraped inside an anchor tag which will be opened if the user clicks on the image', 'quest' ) ?></p>
				</div>
			</div>


			<div class="pt-pb-option">
				<label for="target"><?php _e( 'URL should open in New Tab ?', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<select name="target">
						<option value="_blank"
						{{{target === '_blank' ? 'selected' : void 0}}}
						><?php _e( 'Yes', 'quest' ); ?></option>
						<option value="_self"
						{{{target === '_self' ? 'selected' : void 0}}} ><?php _e( 'No', 'quest' ); ?></option>
					</select>

					<p class="description"><?php _e( 'Do you want the URL to be opened in a new tab or the same tab ?', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="lightbox"><?php _e( 'Image Lightbox', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<select name="lightbox">
						<option value="true"
						{{{lightbox == 'true' ? 'selected' : void 0}}} ><?php _e( 'Yes', 'quest' ); ?></option>
						<option value="false"
						{{{lightbox == 'false' ? 'selected' : void 0}}} ><?php _e( 'No', 'quest' ); ?></option>
					</select>

					<p class="description"><?php _e( 'Do you want to show a lightbox for the image ? If set to yes it will override the URL and the image will be displayed in a lightbox when the image is clicked', 'quest' ) ?></p>
				</div>
			</div>

			{{{ptPbApp.partial('form-animation', { animation: animation })}}}
			{{{ptPbApp.partial('form-admin-label', { admin_label: admin_label })}}}

		</form>
	</div>
	<div class="edit-bottom">
		<input type="button" class="button button-primary save-image" value="Save"/>
		<input type="button" class="button close-model" value="Close"/>
	</div>
</script>