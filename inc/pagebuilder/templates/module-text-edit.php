<script type="text/template" id="pt-pb-tmpl-module-text-edit">
	<h2><?php _e( 'Edit Image', 'quest' ); ?></h2>
	<div class="edit-content">
		<form>

			<div class="pt-pb-option">
				<label for="content"><?php _e( 'Content', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<textarea name="content" class="hidden">{{{content}}} </textarea>

					<p class="description"><?php _e( 'Content', 'quest' ) ?></p>
				</div>
			</div>
			{{{ptPbApp.partial('module-padding', { padding_bottom: padding_bottom })}}}
			{{{ptPbApp.partial('form-animation', { animation: animation })}}}
			{{{ptPbApp.partial('form-admin-label', { admin_label: admin_label })}}}

		</form>
	</div>
	<div class="edit-bottom">
		<input type="button" class="button button-primary save-text" value="Save"/>
		<input type="button" class="button close-model" value="Close"/>
	</div>
</script>