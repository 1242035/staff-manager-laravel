$(function() {
	$('#site-search-input').selectize({
		valueField: 'url',
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
		optgroups: [
			{value: 'employee', label: 'Personer'},
			{value: 'department', label: 'Avdelningar'}
		],
		optgroupField: 'type',
		optgroupOrder: ['employee','department'],
		load: function(query, callback) {
			if (!query.length) return callback();
			$.ajax({
				url: root+'/api/search',
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
			window.location = this.items[0];
			this.clear(true);
		}
	});
})