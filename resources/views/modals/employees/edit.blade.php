@extends('layouts.modal')

@section('modal-id', 'edit-employee-modal')

@section('modal-heading', 'Redigera person')

@section('modal-body-and-footer')
	{!! BootForm::open(array('route' => 'employees.store')) !!}

		<div class="modal-body">
			{!! BootForm::text('first_name', 'Förnamn') !!}
			{!! BootForm::text('last_name', 'Efternamn') !!}
		</div>
		<div class="modal-footer">
			{!! BootForm::submit('Spara') !!}
		</div>
	{!! BootForm::close() !!}
@endsection