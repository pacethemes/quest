var trIconPicker;

( function ($) {

	trIconPicker = {
		//stores the callback function for insert button click
		callback : {},

		$reveal: $('#quest_icon_picker_reveal'),

		open: function(editor, callback) {
			trIconPicker.callback = callback;
			if( trIconPicker.$reveal.length === 0 ) {
				$('body').append('<div id="quest_icon_picker_reveal" class="reveal-modal icon-picker-reveal"><h2>Insert Icon</h2><div class="edit-content">'+ptIcons+'</div></div>');
				trIconPicker.$reveal = $('#quest_icon_picker_reveal')
										.on('click', '.fa-hover a', function(){
											trIconPicker.callback( $(this).attr('href').replace('#', '') );
											trIconPicker.$reveal.trigger('reveal:close');
										})
										.on('click', '.close-model, .close-reveal-modal', function(e){
									    	e.preventDefault();
									    	trIconPicker.$reveal.trigger('reveal:close');
									    });
			}
			trIconPicker.$reveal.reveal();
		}
	}


}) ( jQuery );


( function( tinymce ) {
	if ( 'undefined' !== typeof window.trIconPicker ) {
		tinymce.PluginManager.add('quest_icon_picker', function (editor, url) {
			editor.addCommand('Quest_Icon_Picker', function () {
				window.trIconPicker.open(editor, function (value) {
					if ('undefined' !== value) {
						editor.insertContent('<i class="fa ' + value + '">&nbsp;</i> ');
					}
				});
			});

			editor.addButton('quest_icon_picker', {
				icon   : 'fa fa fa-flag',
				tooltip: 'Insert Icon',
				cmd    : 'Quest_Icon_Picker'
			});
		});

	}
} )( tinymce );