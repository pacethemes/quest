<script type="text/template" id="pt-pb-tmpl-section">
	<div class="pt-pb-wrap">
		<div class="pt-pb-section-preview">
			<div class="pt-pb-header">
				<h3 class="pt-pb-section-label">{{{admin_label}}}</h3>

				<div class="pt-pb-controls">
					<a href="#" class="pt-pb-settings pt-pb-settings-section"
					   title="<?php _e( 'Edit Section', 'quest' ); ?>"><i class="fa fa-cog"></i></a>
					<a href="#" class="pt-pb-clone pt-pb-clone-section"
					   title="<?php _e( 'Clone Section', 'quest' ); ?>"><i class="fa fa-copy"></i></a>
					<a href="#" class="pt-pb-remove remove-section" title="<?php _e( 'Delete Section', 'quest' ); ?>"><i
							class="fa fa-remove"></i></a>
				</div>
				<a href="#" class="pt-pb-section-toggle" title="<?php _e( 'Click to toggle', 'quest' ); ?>">
					<div class="handlediv"><i class="fa fa-caret-up"></i><i class="fa fa-caret-down"></i></div>
				</a>
			</div>
			<div class="pt-pb-content-wrap">
				<div class="pt-pb-content clearfix"></div>

				<div class="pt-pb-content-foot">
					<a href="#" class="section-type pt-pb-insert-column"><i
							class="fa fa-columns"></i> <?php _e( 'Columns', 'quest' ); ?></a>
					<a href="#" class="section-type pt-pb-insert-slider"><i
							class="dashicons dashicons-images-alt"></i> <?php _e( 'Image Slider', 'quest' ); ?></a>
					<a href="#" class="section-type pt-pb-insert-gallery"><i
							class="dashicons dashicons-format-gallery"></i> <?php _e( 'Gallery', 'quest' ); ?></a>
					<# _.each(ptPbAppSliders, function(slider, name) { #>
						<# if(slider.exists == 1) { #>
						<a href="#" class="section-type pt-pb-insert-generic-slider" data-gen-slider="{{{name}}}">
							{{{slider.icon}}}
							{{{slider.name}}}
						</a>
						<# } #>
					<# }) #>

					<div class="quest-plus-message">
						<strong><?php _e( 'Need more section options ?', 'quest' ); ?> <span
								class="quest-plus">Quest Plus</span>
						</strong> <br/>
						<a href="<?php echo self::$QUEST_PLUS_URI; ?>"
						   target="_blank"><?php _e( 'Upgrade to Quest Plus', 'quest' ); ?></a>
					</div>
				</div>
			</div>
		</div>

		<div class="pt-pb-section-edit reveal-modal">
			<h2><?php _e( 'Edit Section', 'quest' ); ?></h2>
			<input name="{{{pre}}}[id]" type="hidden" value="{{{id}}}">
			<div class="edit-content">
				
					<div class="pt-pb-option">
						<label for="bg_image"><?php _e( 'Background Image', 'quest' ); ?>: </label>

						<div class="pt-pb-option-container">
							<input name="{{{pre}}}[bg_image]" type="text" class="regular-text pt-pb-upload-field"
							       value="{{{bg_image}}}">
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
							<select name="{{{pre}}}[bg_attach]">
								<option value="fixed"
								{{{bg_attach == 'fixed' ? 'selected' : void 0}}}
								><?php _e( 'Fixed', 'quest' ); ?></option>
								<option value="scroll"
								{{{bg_attach == 'scroll' ? 'selected' : void 0}}}
								><?php _e( 'Scroll', 'quest' ); ?></option>
							</select>

							<p class="description"><?php _e( 'Scroll - The background scrolls along with the element. Fixed - The background is fixed with regard to the viewport', 'quest' ) ?></p>
						</div>
					</div>

					<div class="pt-pb-option">
						<label for="bg_color"><?php _e( 'Background Color', 'quest' ); ?>: </label>

						<div class="pt-pb-option-container">
							<input name="{{{pre}}}[bg_color]" class="pt-pb-color color-picker" data-alpha="true" type="text"
							       value="{{{bg_color}}}"/>

							<p class="description"><?php _e( 'Background Color for the section, leave it blank to set a transparent color', 'quest' ) ?></p>
						</div>
					</div>

					<div class="pt-pb-option">
						<label for="content_type"><?php _e( 'Content Type', 'quest' ); ?>: </label>

						<div class="pt-pb-option-container">
							<select name="{{{pre}}}[content_type]">
								<option value="boxed"
								{{{content_type == 'boxed' ? 'selected' : void 0}}}
								><?php _e( 'Boxed', 'quest' ); ?></option>
								<option value="fluid"
								{{{content_type == 'fluid' ? 'selected' : void 0}}}
								><?php _e( 'Fluid', 'quest' ); ?></option>
							</select>

							<p class="description"><?php _e( 'Boxed - Section content will be fixed to 1170px or corresponding device width. Fluid - Section content will be 100% width to the browser width', 'quest' ) ?></p>
						</div>
					</div>

					<div class="pt-pb-option">
						<label for="text_color"><?php _e( 'Text Color', 'quest' ); ?>: </label>

						<div class="pt-pb-option-container">
							<input name="{{{pre}}}[text_color]" class="pt-pb-color color-picker" data-alpha="true" type="text"
							       value="{{{text_color}}}"/>

							<p class="description"><?php _e( 'Text Color for the section', 'quest' ) ?></p>
						</div>
					</div>

					<div class="pt-pb-option">
						<label for="padding_top"><?php _e( 'Padding Top', 'quest' ); ?>: </label>

						<div class="pt-pb-option-container">
							<input name="{{{pre}}}[padding_top]" class="regular-text" type="text" value="{{{padding_top}}}"/>

							<p class="description"><?php _e( 'Padding (Spacing) at the top', 'quest' ) ?></p>
						</div>
					</div>

					<div class="pt-pb-option">
						<label for="padding_bottom"><?php _e( 'Padding Bottom', 'quest' ); ?>: </label>

						<div class="pt-pb-option-container">
							<input name="{{{pre}}}[padding_bottom]" class="regular-text" type="text"
							       value="{{{padding_bottom}}}"/>

							<p class="description"><?php _e( 'Padding (Spacing) at the Bottom', 'quest' ) ?></p>
						</div>
					</div>

					<div class="pt-pb-option">
						<label for="border_top_width"><?php _e( 'Border Top Width', 'quest' ); ?>: </label>

						<div class="pt-pb-option-container">
							<input name="{{{pre}}}[border_top_width]" class="regular-text" type="text"
							       value="{{{border_top_width}}}"/>

							<p class="description"><?php _e( 'Border width for the section top', 'quest' ) ?></p>
						</div>
					</div>

					<div class="pt-pb-option">
						<label for="border_bottom_width"><?php _e( 'Border Bottom Width', 'quest' ); ?>: </label>

						<div class="pt-pb-option-container">
							<input name="{{{pre}}}[border_bottom_width]" class="regular-text" type="text"
							       value="{{{border_bottom_width}}}"/>

							<p class="description"><?php _e( 'Border width for the section bottom', 'quest' ) ?></p>
						</div>
					</div>

					<div class="pt-pb-option">
						<label for="border_top_color"><?php _e( 'Border Top Color', 'quest' ); ?>: </label>

						<div class="pt-pb-option-container">
							<input name="{{{pre}}}[border_top_color]" class="pt-pb-color color-picker" data-alpha="true" type="text"
							       value="{{{border_top_color}}}"/>

							<p class="description"><?php _e( 'Border color for the section top', 'quest' ) ?></p>
						</div>
					</div>

					<div class="pt-pb-option">
						<label for="border_bottom_color"><?php _e( 'Border Bottom Color', 'quest' ); ?>: </label>

						<div class="pt-pb-option-container">
							<input name="{{{pre}}}[border_bottom_color]" class="pt-pb-color color-picker" data-alpha="true" type="text"
							       value="{{{border_bottom_color}}}"/>

							<p class="description"><?php _e( 'Border color for the section bottom', 'quest' ) ?></p>
						</div>
					</div>

					<?php
					/*
					* Action hook to add more section options
					*/
					do_action( 'pt_pb_section_options' );
					?>

					{{{ptPbApp.partial('form-css-class', { css_class: css_class, pre: pre })}}}
					{{{ptPbApp.partial('form-admin-label', { admin_label: admin_label, pre: pre })}}}

			</div>
			<div class="edit-bottom">
				<input type="button" class="button button-primary save-section" value="Save"/>
				<input type="button" class="button close-model" value="Close"/>
			</div>
		</div>

		<div class="pt-pb-insert-columns insert reveal-modal">
			<h2><?php _e( 'Select Layout', 'quest' ); ?></h2>
			<div class="edit-content">
				<div class="quest-plus-message">
					<strong><?php _e( 'Need more layout options ?', 'quest' ); ?> <span
							class="quest-plus">Quest Plus</span> </strong> <br/>
					<a href="<?php echo self::$QUEST_PLUS_URI; ?>"
					   target="_blank"><?php _e( 'Upgrade to Quest Plus', 'quest' ); ?></a>
				</div>
				<ul class="column-layouts">
					<li data-layout="1-1">
						<div class="column-layout full-width"></div>
					</li>
					<li data-layout="1-2,1-2">
						<div class="column-layout column-layout-1_2"></div>
						<div class="column-layout column-layout-1_2"></div>
					</li>
					<li data-layout="1-3,1-3,1-3">
						<div class="column-layout column-layout-1_3"></div>
						<div class="column-layout column-layout-1_3"></div>
						<div class="column-layout column-layout-1_3"></div>
					</li>
					<li data-layout="1-4,1-4,1-4,1-4">
						<div class="column-layout column-layout-1_4"></div>
						<div class="column-layout column-layout-1_4"></div>
						<div class="column-layout column-layout-1_4"></div>
						<div class="column-layout column-layout-1_4"></div>
					</li>
					<?php
					/*
					* Action hook to add custom layouts
					*/
					do_action( 'pt_pb_column_layouts' );
					?>
				</ul>
			</div>
		</div>
	</div>
</script>