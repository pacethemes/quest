<?php

include( 'functions.php' );
include( 'class-pace-builder-module-slider.php' );

add_action( 'after_setup_theme', 'quest_pb_plugin_register_modules' );

function quest_pb_plugin_register_modules(){
	PTPB()->register_module( 'PTPB_Module_Slider' );
}