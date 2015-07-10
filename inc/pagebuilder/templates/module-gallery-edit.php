<script type="text/template" id="pt-pb-module-gallery-edit-template">
	<h2><?php _e( 'Edit Gallery', 'quest' ); ?></h2>
	<div class="edit-content">
		<form>

			<div class="pt-pb-option">
				<label for="shape"><?php _e( 'Thumbnails Shape', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<select name="shape">
						<option value="rounded"
						<%= shape == 'rounded' ? 'selected' : void 0 %>
						><?php _e( 'Round', 'quest' ); ?></option>
						<option value="square"
						<%= shape == 'square' ? 'selected' : void 0 %>
						><?php _e( 'Square', 'quest' ); ?></option>
					</select>

					<p class="description"><?php _e( 'Do you want Rounded or Square Thumbnails ?', 'quest' ) ?></p>
				</div>
			</div>

			<%= partial('pt-pb-form-css-class', { css_class: css_class }) %>
			<%= partial('pt-pb-form-admin-label', { admin_label: admin_label }) %>

		</form>
	</div>
	<div class="edit-bottom">
		<input type="button" class="button button-primary save-gallery" value="Save"/>
		<input type="button" class="button close-model" value="Close"/>
	</div>
</script>