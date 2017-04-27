(function ($) {
	'use strict';
	$('input[name=randommemberonindex_close]').on('click init_toggle', function () {
		$('.randommemberonindex_toggle').toggle($('#randommemberonindex_close').prop('id="randommemberonindex_enable" checked="checked"'));
	}).trigger('init_toggle');
})(jQuery);
