@extends('layouts.master')

@section('content')

	<div class="container-fluid">
		<h1>Lägg till person</h1>
		{!! BootForm::open(array('route' => 'employees.store')) !!}

			{!! BootForm::text('first_name', 'Förnamn') !!}
			{!! BootForm::text('last_name', 'Efternamn') !!}
			<div class="form-group">
				<label>Avdelningar</label>
				<ul class="list-group" id="department-list-group">
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