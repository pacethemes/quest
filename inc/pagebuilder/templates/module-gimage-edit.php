<script type="text/template" id="pt-pb-module-gimage-edit-template">
	<h2><?php _e( 'Edit Image', 'quest' ); ?></h2>
	<div class="edit-content">
		<form>

			<div class="pt-pb-option">
				<label for="src"><?php _e( 'Select Image', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="src" type="text" class="regular-text pt-pb-upload-field" value="<%= src %>">
					<input name="post_id" type="hidden" class="regular-text pt-pb-upload-field-id"
					       value="<%= post_id %>">
					<input type="button" class="button pt-pb-upload-button" value="Upload" data-type="image"
					       data-choose="<?php _e( 'Select Image', 'quest' ); ?>"
					       data-update="<?php _e( 'Select Image', 'quest' ); ?>">
					<input type="button" class="button pt-pb-remove-upload-button" value="Remove"
					       data-type="image">

					<p class="description"><?php _e( 'Select the slide image', 'quest' ); ?></p>

					<div class="screenshot"></div>
				</div>
			</div>

			<%= partial('pt-pb-form-css-class', { css_class: css_class }) %>
			<%= partial('pt-pb-form-admin-label', { admin_label: admin_label }) %>

		</form>
	</div>
	<div class="edit-bottom">
		<input type="button" class="button button-primary save-gimage" value="Save"/>
		<input type="button" class="button close-model" value="Close"/>
	</div>
</script>