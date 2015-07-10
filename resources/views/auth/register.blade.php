@extends('layouts.master')

@section('content')

	<div class="container-fluid">
		{!! BootForm::open(array('url' => '/auth/register')) !!}

			{!! BootForm::text('name', 'Namn', old('name')) !!}
			{!! BootForm::email('email', 'E-postadress', old('email')) !!}
			{!! BootForm::password('password', 'Lösenord') !!}
			{!! BootForm::password('password_confirmation', 'Upprepa lösenord') !!}
			{!! BootForm::submit('Skapa konto') !!}
		{!! BootForm::close() !!}
	</div>

@endsection