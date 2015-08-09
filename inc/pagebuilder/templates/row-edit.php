<script type="text/template" id="pt-pb-row-edit-template">
	<h2><?php _e( 'Edit Row', 'quest' ); ?></h2>
	<div class="edit-content">
		<form action="#">

			<div class="pt-pb-option">
				<label for="vertical_align"><?php _e( 'Columns Vertical Alignment', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<select name="vertical_align">
						<option value="default"
						<%= vertical_align == 'default' ? 'selected' : void 0 %>
						><?php _e( 'Default', 'quest' ); ?></option>
						<option value="top"
						<%= vertical_align == 'top' ? 'selected' : void 0 %>
						><?php _e( 'Top', 'quest' ); ?></option>
						<option value="middle"
						<%= vertical_align == 'middle' ? 'selected' : void 0 %>
						><?php _e( 'Middle', 'quest' ); ?></option>
						<option value="bottom"
						<%= vertical_align == 'bottom' ? 'selected' : void 0 %>
						><?php _e( 'Bottom', 'quest' ); ?></option>
					</select>

					<p class="description"><?php _e( 'Vertical Alignment of the columns', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="padding_top"><?php _e( 'Padding Top', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="padding_top" class="regular-text" type="text" value="<%= padding_top %>"/>

					<p class="description"><?php _e( 'Padding (Spacing) at the top', 'quest' ) ?></p>
				</div>
			</div>

			<div class="pt-pb-option">
				<label for="padding_bottom"><?php _e( 'Padding Bottom', 'quest' ); ?>: </label>

				<div class="pt-pb-option-container">
					<input name="padding_bottom" class="regular-text" type="text"
					       value="<%= padding_bottom %>"/>

					<p class="description"><?php _e( 'Padding (Spacing) at the Bottom', 'quest' ) ?></p>
				</div>
			</div>

		</form>
	</div>
	<div class="edit-bottom">
		<input type="button" class="button button-primary save-row" value="Save"/>
		<input type="button" class="button close-model" value="Close"/>
	</div>
</script>