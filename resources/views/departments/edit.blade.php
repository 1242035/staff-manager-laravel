@extends('layouts.master')

@section('content')

	<div class="container-fluid">
		<h1>Redigera avdelning</h1>
		{!! Form::model($department, ['method' => 'put', 'route' => ['departments.update', $department->id]]) !!}

			{!! BootForm::text('name', 'Namn') !!}
			{!! BootForm::submit('Spara') !!}
		{!! BootForm::close() !!}
	</div>

@endsection