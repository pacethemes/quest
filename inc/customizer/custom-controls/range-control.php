<?php
/**
 * Customize for Range Slider, extend the WP customizer
 *
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}


class Quest_Customizer_Range_Control extends WP_Customize_Control {
    public $type = 'range';
    public function render_content() {
    ?>
        <label>
        	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        	<input <?php $this->link(); ?> name="<?php echo esc_html( $this->label ); ?>" type="range" min="<?php echo $this->choices['min']; ?>" max="<?php echo $this->choices['max']; ?>" step="<?php echo $this->choices['step']; ?>" value="<?php echo ( $this->value() ); ?>" class="quest-range" />
        	<input type="text" data-name="<?php echo esc_html( $this->label ); ?>" class="quest-range-output" value="<?php echo ( $this->value() ); ?>" disabled/>
        	<span class="description customize-control-description"><?php echo esc_html( $this->description ) ?></span>
        </label>
    <?php
    }
}