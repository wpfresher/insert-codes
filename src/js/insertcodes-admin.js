(function ($) {
	'use strict';
	$(window).on('load', function () {
		$.ready.then(function () {
			var defaultSettings = wp.codeEditor.defaultSettings ? _.clone(wp.codeEditor.defaultSettings) : {};

			// HTML Editor.
			var htmlSettings = _.extend({}, defaultSettings, {
				codemirror: _.extend({}, defaultSettings.codemirror, {
					mode: 'htmlmixed'
				})
			});
			// PHP Editor.
			var phpSettings = _.extend({}, defaultSettings, {
				codemirror: _.extend({}, defaultSettings.codemirror, {
					mode: 'application/x-httpd-php' // Or use "php" instead.
				})
			});

			// Initialize the code editors.
			wp.codeEditor.initialize($('#insertcodes_header'), htmlSettings);
			wp.codeEditor.initialize($('#insertcodes_body'), htmlSettings);
			wp.codeEditor.initialize($('#insertcodes_footer'), htmlSettings);
			wp.codeEditor.initialize($('#insertcodes_php'), phpSettings);
		});
	});
})(jQuery);
