<script type="text/template" id="pt-pb-tmpl-module-gimage">
	<div class="pt-pb-wrap">
		<div class="pt-pb-gimage-preview">
			<div title="Drag-and-drop this column into place"
			     class="pt-pb-column-header pt-pb-column-sortable ui-sortable-handle">
				<div class="sortable-background column-sortable-background"></div>
			</div>
			<div class="pt-pb-column-content">
				{{{ptPbApp.partial('module-header', { admin_label: admin_label, module: 'gimage', hideToggle: true })}}}
				<div class="gimage-content-preview"
				{{{src != '' ? 'style="background-image:url(' + src + ');"' : void 0}}}>
				<#if (src == "") {#>
				<div class="slide-dummy-image"><a href="#" title="<?php _e( 'Edit Image', 'quest' ); ?>"><i
							class="dashicons dashicons-format-image"></i></a></div>
				<# }#>
			</div>
		</div>

		<div class="pt-pb-gimage-edit reveal-modal">
			<h2><?php _e( 'Edit Image', 'quest' ); ?></h2>
			<input name="{{{pre}}}[id]" type="hidden" value="{{{id}}}">
			<div class="edit-content">
				<div class="pt-pb-option">
					<label for="src"><?php _e( 'Select Image', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[src]" type="text" class="regular-text pt-pb-upload-field" value="{{{src}}}">
						<input name="{{{pre}}}[post_id]" type="hidden" class="regular-text pt-pb-upload-field-id"
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
						<input name="{{{pre}}}[href]" class="regular-text" type="text" value="{{{href}}}"/>

						<p class="description"><?php _e( 'Link the image should be pointing to, leave it blank to open the image in a Lightbox', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="title"><?php _e( 'Image Title', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[title]" class="regular-text" type="text" value="{{{title}}}"/>

						<p class="description"><?php _e( 'This will be the heading/title below the Image thumbnail', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="desc"><?php _e( 'Image Description', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<textarea name="{{{pre}}}[desc]">{{{desc}}} </textarea>

						<p class="description"><?php _e( 'This will be the text below the Image in the lightbox/colorbox preview', 'quest' ) ?></p>
					</div>
				</div>

				{{{ptPbApp.partial('form-css-class', { css_class: css_class, pre: pre })}}}
				{{{ptPbApp.partial('form-admin-label', { admin_label: admin_label, pre: pre })}}}
			</div>
			<div class="edit-bottom">
				<input type="button" class="button button-primary save-gimage" value="Save"/>
				<input type="button" class="button close-model" value="Close"/>
			</div>
		</div>		

	</div>
</script>