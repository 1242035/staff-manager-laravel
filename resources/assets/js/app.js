$(function() {
	$('form[data-confirm-submit]').on('submit', function() {
		if(!confirm($(this).data('confirm-submit'))) return false;
	});
});

//=include site-search.js
//=include department-list-group.js
