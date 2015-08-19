<script type="text/template" id="pt-pb-tmpl-module-gimage-edit">
	<h2><?php _e( 'Edit Image', 'quest' ); ?></h2>
	<div class="edit-content">
		<form>

			<div class="pt-pb-option">
				<label for="src"><?php _e( 'Select Image', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="src" type="text" class="regular-text pt-pb-upload-field" value="{{{src}}}">
					<input name="post_id" type="hidden" class="regular-text pt-pb-upload-field-id"
					       value="{{{post_id}}}">
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
				<label for="href"><?php _e( 'Link', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="href" class="regular-text" type="text" value="{{{href}}}"/>

					<p class="description"><?php _e( 'Link the image should be point to, the Gallery lighbox option should be set to "No"', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="title"><?php _e( 'Image Title', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="title" class="regular-text" type="text" value="{{{title}}}"/>

					<p class="description"><?php _e( 'This will be the heading/title below the Image thumbnail', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="desc"><?php _e( 'Image Description', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<textarea name="desc">{{{desc}}} </textarea>

					<p class="description"><?php _e( 'This will be the text below the Image in the lightbox/colorbox preview', 'quest' ) ?></p>
				</div>
			</div>

			{{{ptPbApp.partial('form-css-class', { css_class: css_class })}}}
			{{{ptPbApp.partial('form-admin-label', { admin_label: admin_label })}}}

		</form>
	</div>
	<div class="edit-bottom">
		<input type="button" class="button button-primary save-gimage" value="Save"/>
		<input type="button" class="button close-model" value="Close"/>
	</div>
</script>