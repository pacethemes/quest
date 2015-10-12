<?php
/**
 * Theme info page
 *
 * @package quest
 */

//Add the theme page
add_action('admin_menu', 'quest_add_theme_info');
function quest_add_theme_info(){
	$theme_info = add_theme_page( __('Quest Info','quest'), __('Quest Info','quest'), 'manage_options', 'quest-info', 'quest_info_page' );
}

//Callback
function quest_info_page() {
?>
	<div class="info-container">
		<h2 class="info-title"><?php _e('Quest Info','quest'); ?></h2>
		<div class="info-block"><a href="http://quest.demo.pacethemes.com/" target="_blank"><div class="dashicons dashicons-desktop info-icon"></div><p class="info-text"><?php _e('Theme demo','quest'); ?></p></a></div>
		<div class="info-block"><a href="http://pacethemes.com/knowledgebase/" target="_blank"><div class="dashicons dashicons-book-alt info-icon"></div><p class="info-text"><?php _e('Documentation','quest'); ?></p></a></div>
		<div class="info-block"><a href="http://pacethemes.com/support/forums/" target="_blank"><div class="dashicons dashicons-sos info-icon"></div><p class="info-text"><?php _e('Support','quest'); ?></p></a></div>
		<div class="info-block"><a href="http://pacethemes.com/quest-download-pricing/" target="_blank"><div class="dashicons dashicons-smiley info-icon"></div><p class="info-text"><?php _e('Quest Plus','quest'); ?></p></a></div>	
	</div>
<?php
}