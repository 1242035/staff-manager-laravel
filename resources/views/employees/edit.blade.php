@extends('layouts.master')

@section('content')

	<div class="container-fluid">
		<h1>Redigera person</h1>
		{!! Form::model($employee, ['method' => 'put', 'route' => ['employees.update', $employee->id]]) !!}

			{!! BootForm::text('first_name', 'Förnamn') !!}
			{!! BootForm::text('last_name', 'Efternamn') !!}
			<div class="form-group">
				<label>Avdelningar</label>
				<ul class="list-group" id="department-list-group">
					@foreach ($employee->departments as $department)
						<li class="list-group-item checked">
							<span class="list-group-item-label">{{ $department->name }}</span>
							<label class="pull-right">
								{!! Form::checkbox('departments[]', $department->id, true) !!}
								<i class="fa fa-fw fa-lg fa-times hide-if-unchecked"></i>
								<i class="fa fa-fw fa-lg fa-undo hide-if-checked"></i>
							</label>
						</li>
					@endforeach
					<li class="list-group-item" id="department-list-group-item-add">
						<input class="list-group-item-input" type="text" id="department-list-group-item-add-input" value="" placeholder="Lägg till...">
					</li>
				</ul>
			</div>
			{!! BootForm::submit('Spara') !!}
		{!! BootForm::close() !!}
	</div>

	@include('templates.department-list-group-item')

@endsection