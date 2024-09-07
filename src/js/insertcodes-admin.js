(function ($) {
	'use strict';
	$(window).on('load', function () {
		// HTML Code Editor.
		$.ready.then(function () {
			var defaultSettings = wp.codeEditor.defaultSettings ? _.clone(wp.codeEditor.defaultSettings) : {};
			var htmlSettings = _.extend({}, defaultSettings, {
				codemirror: _.extend({}, defaultSettings.codemirror, {
					mode: 'htmlmixed'
				})
			});
			// Initialize the code editors.
			wp.codeEditor.initialize($('#insertcodes_header'), htmlSettings);
			wp.codeEditor.initialize($('#insertcodes_body'), htmlSettings);
			wp.codeEditor.initialize($('#insertcodes_footer'), htmlSettings);
		});
		// Php Code Editor.
		$.ready.then(function () {
			var defaultSettings = wp.codeEditor.defaultSettings ? _.clone(wp.codeEditor.defaultSettings) : {};
			var phpSettings = _.extend({}, defaultSettings, {
				codemirror: _.extend({}, defaultSettings.codemirror, {
					mode: 'application/x-httpd-php'
				})
			});
			// Initialize the code editors.
			var phpEditor = wp.codeEditor.initialize($('#insertcodes_php'), phpSettings);

			// include <?php tag in the editor first line if not exists.
			var code = phpEditor.codemirror.getValue();
			if (code.indexOf('<?php') !== 0) {
				phpEditor.codemirror.setValue('<?php\n' + code);
			}

			// Make the first line read-only.
			phpEditor.codemirror.on('beforeChange', function (instance, change) {
				if (change.from.line === 0) {
					change.cancel();
				}
			});
		});
	});
})(jQuery);
