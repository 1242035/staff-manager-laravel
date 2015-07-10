@extends('layouts.master')

@section('content')

	<div class="container-fluid">
		<h1>{{ $department->name }}</h1>
		<div class="btn-toolbar">
			<a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary">
				Redigera
			</a>
			{!! BootForm::open(array(
				'route' => array('departments.destroy', $department->id),
				'method' => 'delete',
				'data-confirm-submit' => 'Är du säker på att du vill ta bort avdelningen? Det går inte att ångra.',
				'class' => 'form-inline',
			)) !!}
				{!! BootForm::submit('Ta bort', array('class' => 'btn btn-danger')) !!}
			{!! BootForm::close() !!}
		</div>
	</div>


@endsection