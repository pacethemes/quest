<script type="text/template" id="pt-pb-tmpl-module-text">
	<div class="pt-pb-wrap">
		<div class="pt-pb-text-preview">
			{{{ptPbApp.partial('module-header', { admin_label: admin_label})}}}
			<div class="content-preview">{{{content}}}</div>
		</div>

		<div class="pt-pb-text-edit reveal-modal">
			<h2><?php _e( 'Edit Image', 'quest' ); ?></h2>
			<input name="{{{pre}}}[id]" type="hidden" value="{{{id}}}">
			<input name="{{{pre}}}[type]" type="hidden" value="text">
			<div class="edit-content">
				<div class="pt-pb-option">
					<label for="content"><?php _e( 'Content', 'quest' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[content]" class="hidden" value="{{{ptPbApp.htmlEncode(content)}}}" type="hidden" />

						<p class="description"><?php _e( 'Content', 'quest' ) ?></p>
					</div>
				</div>
				{{{ptPbApp.partial('module-margin', { margin_bottom: margin_bottom, pre: pre })}}}
				{{{ptPbApp.partial('form-animation', { animation: animation, pre: pre })}}}
				{{{ptPbApp.partial('form-admin-label', { admin_label: admin_label, pre: pre })}}}
			</div>
			<div class="edit-bottom">
				<input type="button" class="button button-primary save-text" value="Save"/>
				<input type="button" class="button close-model" value="Close"/>
			</div>
		</div>

	</div>
</script>