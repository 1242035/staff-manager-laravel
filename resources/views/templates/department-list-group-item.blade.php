<script type="text/template" id="department-list-group-item-template">
	<li class="list-group-item checked">
		<span class="list-group-item-label"></span>
		<label class="pull-right">
			{!! Form::checkbox('departments[]', '', true) !!}
			<i class="fa fa-fw fa-lg fa-times hide-if-unchecked"></i>
			<i class="fa fa-fw fa-lg fa-undo hide-if-checked"></i>
		</label>
	</li>
</script>