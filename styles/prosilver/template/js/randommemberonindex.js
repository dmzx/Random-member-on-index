phpbb.addAjaxCallback('close_randommemberonindex', function(res) {
	'use strict';
	if (res.success) {
		phpbb.toggleDisplay('randommemberonindex', -1);
	}
});
