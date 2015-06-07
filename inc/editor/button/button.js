( function( tinymce, $ ) {
	if ( 'undefined' !== typeof window.trIconPicker ) {

		tinymce.PluginManager.add('quest_button', function (editor) {
			editor.addCommand('Quest_Button', function () {
				var reveal = $('#quest_button_reveal');
				if(reveal.length === 0 ) {
					$('body').append('<div id="quest_button_reveal" class="reveal-modal"><h2>Insert Button</h2><div class="edit-content"><form><div class="pt-pb-option"><label for="btn_url">Button URL: </label><div class="pt-pb-option-container"><input name="btn_url" class="regular-text" type="text" value=""><p class="description">URL of the button</p></div></div><div class="pt-pb-option"><label for="btn_text">Button Text: </label><div class="pt-pb-option-container"><input name="btn_text" class="regular-text" type="text" value=""><p class="description">Text of the button</p></div></div></form></div><div class="edit-bottom"><input type="button" class="button button-primary insert-button" value="Insert"><input type="button" class="button close-model" value="Close"></div></div>');
					reveal = $('#quest_button_reveal');
					reveal
					.on('click', '.insert-button', function(){
						var data = reveal.find('form').serializeObject(),
							url = data.btn_url === '' ? '#' : (data.btn_url.match(/^https?:/) === null ? 'http://' + data.btn_url : data.btn_url);
						editor.insertContent('<a class="button" href="' + url + '">' + data.btn_text + '</a> ');
						reveal.trigger('reveal:close');
					})
					.on('click', '.close-model, .close-reveal-modal', function(e){
				    	e.preventDefault();
				    	reveal.trigger('reveal:close');
				    });
				}
				reveal.reveal();
			});

			editor.addButton('quest_button', {
				icon   : 'fa fa fa-hand-o-up',
				tooltip: 'Insert Button',
				cmd    : 'Quest_Button'
			});
		});

	}
} )( tinymce, jQuery );