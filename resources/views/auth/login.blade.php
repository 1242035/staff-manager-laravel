@extends('layouts.master')

@section('content')

	<div class="container-fluid">
		{!! BootForm::open(array('url' => '/auth/login')) !!}

			{!! BootForm::email('email', 'E-postadress', old('email')) !!}
			{!! BootForm::password('password', 'Lösenord') !!}
			{!! BootForm::checkbox('remember', 'Kom ihåg mig') !!}
			{!! BootForm::submit('Logga in') !!}
		{!! BootForm::close() !!}
	</div>

@endsection