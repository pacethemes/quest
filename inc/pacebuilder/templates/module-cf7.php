<?php
$args      = array( 'post_type' => 'wpcf7_contact_form', 'posts_per_page' => - 1 );
$cf7_forms = get_posts( $args );
?>

<script type="text/template" id="pt-pb-tmpl-module-cf7">
	<div class="pt-pb-wrap">
		<div class="pt-pb-cf7-preview">
			{{{ ptPbApp.partial('module-header', { admin_label: admin_label}) }}}
			<div class="content-preview">
				<?php _e( 'Form ID', 'quest-plus' ) ?>:  {{{ form_id }}}
			</div>
		</div>

		<div class="pt-pb-cf7-edit reveal-modal">
			<h2><?php _e( 'Edit Contact Form 7', 'quest-plus' ); ?></h2>
			<input name="{{{pre}}}[id]" type="hidden" value="{{{id}}}">
			<input name="{{{pre}}}[type]" type="hidden" value="contactform7">
			<div class="edit-content">
				<div class="pt-pb-option">
					<label for="form_id"><?php _e( 'Select Form', 'quest-plus' ); ?>: </label>

					<div class="pt-pb-option-container">
						<select name="{{{pre}}}[form_id]" >
							<?php foreach ( $cf7_forms as $form ) { ?>
								<option value="<?php echo $form->ID; ?>" {{{ form_id == '<?php echo $form->ID; ?>' ? 'selected' : void 0 }}} >
									<?php echo $form->ID . " - " . ucwords( $form->post_title ); ?>
								</option>
							<?php } ?>
						</select>

						<p class="description"><?php _e( 'Select the Contact Form 7 you want to show', 'quest-plus' ) ?></p>
					</div>
				</div>


				<div class="pt-pb-option">
					<label for="title"><?php _e( 'Form Title', 'quest-plus' ); ?>: </label>

					<div class="pt-pb-option-container">
						<input name="{{{pre}}}[title]" class="regular-text" type="text" value="{{{ title }}}"/>

						<p class="description"><?php _e( 'Title for the Form', 'quest-plus' ) ?></p>
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
				<input type="button" class="button button-primary save-cf7 save-module" value="Save"/>
				<input type="button" class="button close-model" value="Close"/>
			</div>
		</div>
	</div>
</script>