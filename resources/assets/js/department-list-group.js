function createDepartmentListGroupItem(item) {
	var listGroupItem = $($('#department-list-group-item-template').html()).insertBefore('#department-list-group-item-add');
	$('.list-group-item-label', listGroupItem).html(item.label);
	$('input', listGroupItem).val(item.id);
}
function getDepartmentListGroupValues() {
	return $('#department-list-group input[type="checkbox"]').map(function() {
		return $(this).val();
	}).get();
}

$(function() {
	$('#department-list-group').on('change', 'input[type="checkbox"]', function() {
		$(this).closest('li').toggleClass('checked', $(this).prop('checked')).toggleClass('unchecked', !$(this).prop('checked'));
	});
	$('#department-list-group-item-add-input').selectize({
		valueField: 'id',
		labelField: 'label',
		searchField: ['label'],
		maxOptions: 10,
		options: [],
		create: false,
		render: {
			option: function(item, escape) {
				return '<div>'+escape(item.label)+'</div>';
			}
		},
		// optgroups: [
		// 	{value: 'product', label: 'Products'},
		// 	{value: 'category', label: 'Categories'}
		// ],
		// optgroupField: 'class',
		// optgroupOrder: ['product','category'],
		load: function(query, callback) {
			if (!query.length) return callback();
			$.ajax({
				url: root+'/api/search/departments',
				type: 'GET',
				dataType: 'json',
				data: {
					q: query
				},
				error: function() {
					callback();
				},
				success: function(options) {
					var disabledValues = getDepartmentListGroupValues();
					options = _.filter(options, function(option) {
						console.log(disabledValues, option.id)
						return !_.contains(disabledValues, String(option.id));
					});
					callback(options);
				}
			});
		},
		onChange: function() {
			var id = this.items[0];
			var option = this.options[id];
			createDepartmentListGroupItem(option);
			this.clear(true);
		}
	});
});