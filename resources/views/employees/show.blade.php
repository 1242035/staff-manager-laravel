@extends('layouts.master')

@section('content')

	<div class="container-fluid">
		<h1>{{ $employee->first_name }} {{ $employee->last_name }}</h1>
		<div class="btn-toolbar">
			<a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">
				Redigera
			</a>
			{!! BootForm::open(array(
				'route' => array('employees.destroy', $employee->id),
				'method' => 'delete',
				'data-confirm-submit' => 'Är du säker på att du vill ta bort personen? Det går inte att ångra.',
				'class' => 'form-inline',
			)) !!}
				{!! BootForm::submit('Ta bort', array('class' => 'btn btn-danger')) !!}
			{!! BootForm::close() !!}
		</div>
		<h2>Avdelningar</h2>
		<ul class="list-group">
			@foreach ($employee->departments as $department)
				<li class="list-group-item">
					{{ $department->name }}
				</li>
			@endforeach
		</ul>
	</div>


@endsection