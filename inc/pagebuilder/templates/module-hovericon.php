<script type="text/template" id="pt-pb-tmpl-module-hovericon">
	<div class="pt-pb-wrap">
		<div class="pt-pb-hovericon-preview">
			{{{ptPbApp.partial('module-header', { admin_label: admin_label})}}}
			<div class="content-preview hover-icon">
				<a href="#{{{href}}}" class="fa fa-{{{size}}}x {{{icon}}}"></a>

				<h3 class="icon-title">{{{title}}}</h3>
				{{{content}}}
			</div>
		</div>

		<div class="pt-pb-hovericon-edit reveal-modal">
			<h2><?php _e( 'Edit Hover Icon', 'quest' ); ?></h2>
			<input name="{{{pre}}}[id]" type="hidden" value="{{{id}}}">
			<input name="{{{pre}}}[type]" type="hidden" value="hovericon">
			<div class="edit-content">
				<div class="pt-pb-option">
					<label for="align"><?php _e( 'Icon', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<div class="icon-preview"><i class="fa fa-2x {{{icon}}}"></i></div>
						<input name="{{{pre}}}[icon]" type="hidden" class="pt-pb-icon" value="{{{icon}}}">
						<input type="button" class="button pt-pb-icon-select"
						       value="<?php _e( 'Select Icon', 'quest' ); ?>">

						<p class="description"><?php _e( 'Select the Icon you want to insert', 'quest' ); ?></p>

						<div class="icon-grid"></div>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="align"><?php _e( 'Icon Size', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<select name="{{{pre}}}[size]">
							<option value="1"
							{{{size == '1' ? 'selected' : void 0}}} >1</option>
							<option value="2"
							{{{size == '2' ? 'selected' : void 0}}} >2</option>
							<option value="3"
							{{{size == '3' ? 'selected' : void 0}}} >3</option>
							<option value="4"
							{{{size == '4' ? 'selected' : void 0}}} >4</option>
							<option value="5"
							{{{size == '5' ? 'selected' : void 0}}} >5</option>
						</select>

						<p class="description"><?php _e( 'Size of the Icon', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="color"><?php _e( 'Color', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[color]" class="pt-pb-color color-picker" data-alpha="true" type="text"
						       value="{{{color}}}"/>

						<p class="description"><?php _e( 'Color of the Icon, this will be Icon Color and the border color', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="hover_color"><?php _e( 'Hover Color', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[hover_color]" class="pt-pb-color color-picker" data-alpha="true" type="text"
						       value="{{{hover_color}}}"/>

						<p class="description"><?php _e( 'Background Color of the Icon, when a user hovers on the Icon the Color and Hover Color will be swapped', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="title"><?php _e( 'Icon Title', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[title]" class="regular-text" type="text" value="{{{title}}}"/>

						<p class="description"><?php _e( 'This will be the heading/title below the Icon', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="content"><?php _e( 'Icon Text', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[content]" class="hidden" value="{{content}}" type="hidden" />

						<p class="description"><?php _e( 'This will be the text below the Icon Title', 'quest' ) ?></p>
					</div>
				</div>

				<div class="pt-pb-option">
					<label for="href"><?php _e( 'Icon Link', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[href]" class="regular-text" type="text" value="{{{href}}}"/>

						<p class="description"><?php _e( 'This is the link the Icon will be pointing to', 'quest' ) ?></p>
					</div>
				</div>

				{{{ptPbApp.partial('module-margin', { margin_bottom: margin_bottom, pre: pre })}}}
				{{{ptPbApp.partial('form-animation', { animation: animation, pre: pre })}}}
				{{{ptPbApp.partial('form-admin-label', { admin_label: admin_label, pre: pre })}}}
			</div>
			<div class="edit-bottom">
				<input type="button" class="button button-primary save-icon" value="Save"/>
				<input type="button" class="button close-model" value="Close"/>
			</div>
		</div>		

	</div>
</script>