(function ($) {
	'use strict';

	$(window).on('load', function () {
		$.ready.then(function () {

			// wp.codeEditor.initialize($('[id="wpheaderandfooter_basics[wp_header_textarea]"]'));
			// wp.codeEditor.initialize($('[id="wpheaderandfooter_basics[wp_body_textarea]"]'));
			// wp.codeEditor.initialize($('[id="wpheaderandfooter_basics[wp_footer_textarea]"]'));

			var defaultSettings = wp.codeEditor.defaultSettings ? _.clone(wp.codeEditor.defaultSettings) : {};

			// HTML Editor
			var htmlSettings = _.extend({}, defaultSettings, {
				codemirror: _.extend({}, defaultSettings.codemirror, {
					mode: 'htmlmixed'
				})
			});
			 wp.codeEditor.initialize($('#ic_html_editor'), htmlSettings);

			// CSS Editor
			var cssSettings = _.extend({}, defaultSettings, {
				codemirror: _.extend({}, defaultSettings.codemirror, {
					mode: 'css'
				})
			});
			wp.codeEditor.initialize($('#ic_css_editor'), cssSettings);

			// PHP Editor
			var phpSettings = _.extend({}, defaultSettings, {
				codemirror: _.extend({}, defaultSettings.codemirror, {
					mode: 'application/x-httpd-php' // Or use "php" instead.
				})
			});
			wp.codeEditor.initialize($('#ic_php_editor'), phpSettings);

			// JS Editor
			var jsSettings = _.extend({}, defaultSettings, {
				codemirror: _.extend({}, defaultSettings.codemirror, {
					mode: 'javascript'
				})
			});
			wp.codeEditor.initialize($('#ic_js_editor'), jsSettings);
		});
	});

})(jQuery);
