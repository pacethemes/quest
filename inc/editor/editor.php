<?php

if ( !function_exists( 'quest_mce_buttons' ) ):

	/**
	 * Add MCE filters for Trcoo custom buttons
	 *
	 */
	function quest_mce_buttons() {

		//Abort early if the user will never see TinyMCE
		if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) && get_user_option( 'rich_editing' ) == 'true' ) return;

		add_filter( 'mce_external_plugins', 'quest_mce_add_buttons' );
		add_filter( 'mce_buttons', 'quest_mce_register_buttons' );
	}
	
endif;

add_action( 'init', 'quest_mce_buttons' );

if ( !function_exists( 'quest_mce_add_buttons' ) ):

	/**
	 * Hook the Requires Plugin JS files into $plugin_array
	 *
	 */
	function quest_mce_add_buttons( $plugin_array ) {
		$plugin_array['quest_icon_picker'] = get_template_directory_uri() . '/inc/editor/icon-picker/icon-picker.js';
		$plugin_array['quest_button'] = get_template_directory_uri() . '/inc/editor/button/button.js';
		return $plugin_array;
	}

endif;

if ( !function_exists( 'quest_mce_register_buttons' ) ):

	/**
	 * Register the buttons
	 *
	 */
	function quest_mce_register_buttons( $buttons ) {
		array_push( $buttons, 'quest_icon_picker' );
		array_push( $buttons, 'quest_button' );
		return $buttons;
	}

endif;
?>
