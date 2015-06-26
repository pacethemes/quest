<?php
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Quest_Customize_Misc_Control' ) ):

	/**
	 * Class Quest_Customize_Misc_Control
	 *
	 * Control for adding arbitrary HTML to a Customizer section.
	 *
	 * @since 1.0.0.
	 */
	class Quest_Customize_Misc_Control extends WP_Customize_Control {

		/**
		 * The current setting name.
		 *
		 * @var   string    The current setting name.
		 */
		public $settings = 'blogname';

		/**
		 * The current setting description.
		 *
		 * @var   string    The current setting description.
		 */
		public $description = '';

		/**
		 * The current setting group.
		 *
		 * @var   string    The current setting group.
		 */
		public $group = '';

		/**
		 * Render the description and title for the section.
		 *
		 * Prints arbitrary HTML to a customizer section. This provides useful hints for how to properly set some custom
		 * options for optimal performance for the option.
		 *
		 * @return void
		 */
		public function render_content() {
			switch ( $this->type ) {
				default:
				case 'text':
					echo '<p class="description">' . $this->description . '</p>';
					break;

				case 'heading':
					echo '<span class="customize-control-title section-title">' . $this->label . '</span>';
					break;

				case 'line':
					echo '<hr />';
					break;
			}
		}
	}
endif;
?>