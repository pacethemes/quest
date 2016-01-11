<script type="text/template" id="pt-pb-tmpl-module-gallery">
	<div class="pt-pb-wrap">
		<div class="pt-pb-gallery-preview">
			<div class="gallery-container clearfix">

				<div class="images-container clearfix"></div>

				<div class="pt-pb-add-image">
					<a href="#" class="pt-pb-insert-gimage pt-pb-btn"><i
							class="dashicons dashicons-format-image"></i> <?php _e( 'New Image', 'quest' ) ?></a>
				</div>

			</div>
			<div></div>

			<div class="pt-pb-gallery-edit reveal-modal">
				<h2><?php _e( 'Edit Gallery', 'quest' ); ?></h2>
				<input name="{{{pre}}}[id]" type="hidden" value="{{{id}}}">
				<div class="edit-content">
					<div class="pt-pb-option">
						<label for="shape"><?php _e( 'Thumbnails Shape', 'quest' ); ?>: </label>

						<div class="pt-pb-option-container">
							<select name="{{{pre}}}[shape]">
								<option value="rounded"
								{{{shape == 'rounded' ? 'selected' : void 0}}}
								><?php _e( 'Round', 'quest' ); ?></option>
								<option value="square"
								{{{shape == 'square' ? 'selected' : void 0}}}
								><?php _e( 'Square', 'quest' ); ?></option>
							</select>

							<p class="description"><?php _e( 'Do you want Rounded or Square Thumbnails ?', 'quest' ) ?></p>
						</div>
					</div>

					<div class="pt-pb-option">
						<label for="columns"><?php _e( 'No. of Columns', 'quest' ); ?>: </label>

						<div class="pt-pb-option-container">
							<select name="{{{pre}}}[columns]">
								<option value="three"
								{{{columns == 'three' ? 'selected' : void 0}}} ><?php _e( 'Three', 'quest' ); ?></option>
								<option value="four"
								{{{columns == 'four' ? 'selected' : void 0}}} ><?php _e( 'Four', 'quest' ); ?></option>
								<option value="five"
								{{{columns == 'five' ? 'selected' : void 0}}} ><?php _e( 'Five', 'quest' ); ?></option>
								<option value="six"
								{{{columns == 'six' ? 'selected' : void 0}}} ><?php _e( 'Six', 'quest' ); ?></option>
							</select>

							<p class="description"><?php _e( 'Number of columns', 'quest' ) ?></p>
						</div>
					</div>

					<div class="pt-pb-option">
						<label for="padding"><?php _e( 'Show Padding', 'quest' ); ?>: </label>

						<div class="pt-pb-option-container">
							<select name="{{{pre}}}[padding]">
								<option value="yes"
								{{{padding == 'yes' ? 'selected' : void 0}}} ><?php _e( 'Yes', 'quest' ); ?></option>
								<option value="no"
								{{{padding == 'no' ? 'selected' : void 0}}} ><?php _e( 'No', 'quest' ); ?></option>
							</select>

							<p class="description"><?php _e( 'Do you want to show spacing between the items ?', 'quest' ) ?></p>
						</div>
					</div>

					{{{ptPbApp.partial('form-css-class', { css_class: css_class, pre: pre })}}}
				</div>
				<div class="edit-bottom">
					<input type="button" class="button button-primary save-gallery" value="Save"/>
					<input type="button" class="button close-model" value="Close"/>
				</div>
			</div>

		</div>
	</div>
</script>