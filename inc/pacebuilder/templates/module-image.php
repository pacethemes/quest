<script type="text/template" id="pt-pb-tmpl-module-image">
	<div class="pt-pb-wrap">
		<div class="pt-pb-image-preview">
			{{{ptPbApp.partial('module-header', { admin_label: admin_label})}}}
			<div class="content-preview" style="text-align:{{{align}}};"><img src="{{{src}}}"/></div>
		</div>

		<div class="pt-pb-image-edit reveal-modal">
			<h2><?php _e( 'Edit Image', 'quest' ); ?></h2>
			<input name="{{{pre}}}[id]" type="hidden" value="{{{id}}}">
			<input name="{{{pre}}}[type]" type="hidden" value="image">
			<div class="edit-content">
				<div class="pt-pb-option">
					<label for="src"><?php _e( 'Select Image', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[src]" type="text" class="regular-text pt-pb-upload-field" value="{{{src}}}">
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
						<select name="{{{pre}}}[align]">
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
						<input name="{{{pre}}}[alt]" class="regular-text" type="text" value="{{{alt}}}"/>

						<p class="description"><?php _e( 'HTML alt attribute for the image', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="title"><?php _e( 'Title', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[title]" class="regular-text" type="text" value="{{{title}}}"/>

						<p class="description"><?php _e( 'HTML title attribute for the image', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="href"><?php _e( 'URL / Hyperlink', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[href]" class="regular-text" type="text" value="{{{href}}}"/>

						<p class="description"><?php _e( 'If set the image will be wrapped inside an anchor tag which will be opened if the user clicks on the image', 'quest' ) ?></p>
					</div>
				</div>


				<div class="pt-pb-option">
					<label for="target"><?php _e( 'URL should open in New Tab ?', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<select name="{{{pre}}}[target]">
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
						<select name="{{{pre}}}[lightbox]">
							<option value="true"
							{{{lightbox == 'true' ? 'selected' : void 0}}} ><?php _e( 'Yes', 'quest' ); ?></option>
							<option value="false"
							{{{lightbox == 'false' ? 'selected' : void 0}}} ><?php _e( 'No', 'quest' ); ?></option>
						</select>

						<p class="description"><?php _e( 'Do you want to show a lightbox for the image ? If set to yes it will override the URL and the image will be displayed in a lightbox when the image is clicked', 'quest' ) ?></p>
					</div>
				</div>

				{{{ptPbApp.partial('module-margin', { margin_bottom: margin_bottom, 
										pre: pre, 
										padding_top: padding_top, 
										padding_bottom: padding_bottom, 
										padding_left: padding_left, 
										padding_right: padding_right 
									})}}}
				{{{ptPbApp.partial('form-animation', { animation: animation, pre: pre })}}}
				{{{ptPbApp.partial('form-admin-label', { admin_label: admin_label, pre: pre })}}}

			</div>
			<div class="edit-bottom">
				<input type="button" class="button button-primary save-image save-module" value="Save"/>
				<input type="button" class="button close-model" value="Close"/>
			</div>
		</div>

	</div>
</script>