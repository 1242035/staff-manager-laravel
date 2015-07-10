@extends('layouts.master')

@section('content')

	<div class="container-fluid">
		<h1>Lägg till avdelning</h1>
		{!! BootForm::open(array('route' => 'departments.store')) !!}

			{!! BootForm::text('name', 'Namn') !!}
			{!! BootForm::submit('Spara') !!}
		{!! BootForm::close() !!}
	</div>

@endsection