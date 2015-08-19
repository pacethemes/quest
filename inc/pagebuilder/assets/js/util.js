var ptPbApp = ptPbApp || {};

(function ($, _) {
	
	/**
	 * ptPbApp.template( id )
	 *
	 * Fetch a JavaScript template for an id, and return a templating function for it.
	 *
	 * @param  {string} id   A string that corresponds to a DOM element with an id prefixed with "tmpl-".
	 *                       For example, "attachment" maps to "tmpl-attachment".
	 * @return {function}    A function that lazily-compiles the template requested.
	 */
	ptPbApp.template = _.memoize(function ( id ) {
		var compiled,
			/*
			 * Underscore's default ERB-style templates are incompatible with PHP
			 * when asp_tags is enabled, so WordPress uses Mustache-inspired templating syntax.
			 *
			 * @see trac ticket #22344.
			 */
			options = {
				evaluate:    /<#([\s\S]+?)#>/g,
				interpolate: /\{\{\{([\s\S]+?)\}\}\}/g,
				escape:      /\{\{([^\}]+?)\}\}(?!\})/g,
				// variable:    'data'
			};

		return function ( data ) {
			compiled = compiled || _.template( $( '#pt-pb-tmpl-' + id ).html(), null, options );
			return compiled( data );
		};
	});

	ptPbApp.partial = function(which, data) {
	    return ptPbApp.template(which)(data);
	};

	ptPbApp.generateOption = function(selected, value, name) {
	    if (!name)
	        name = value;
	    return '<option value="' + value + '" ' + (value == selected ? 'selected' : '') + ' >' + name + '</option>';
	};

}(jQuery, _));
