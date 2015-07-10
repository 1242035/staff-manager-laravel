@extends('layouts.master')

@section('content')

	<div class="container-fluid">
		<div>
			<div class="btn-toolbar pull-right">
				<a href="{{ route('employees.create') }}" class="btn btn-success"><i class="fa fa-lg fa-plus"></i><span class="hidden-xs"> Lägg till person</span></a>
			</div>
			<h1>Personal</h1>
		</div>
		@if($employees->count())
			<div class="table-responsive">
				<table class="table table-fixed">
					<thead>
						<th>Förnamn</th>
						<th>Efternamn</th>
						<th>Avdelningar</th>
						<th class="table-col-fa-fw"></th>
						<th class="table-col-fa-fw"></th>
						<th class="table-col-fa-fw"></th>
					</thead>
					<tbody>
						@foreach ($employees as $employee)
							<tr>
								<td>{{ $employee->first_name }}</td>
								<td>{{ $employee->last_name }}</td>
								<td>{{ implode(', ', $employee->departments()->get()->map(function($department) {return $department->name;})->toArray()) }}</td>
								<td class="table-col-fa-fw">
									<a href="{{ route('employees.show', $employee->id) }}" class="btn btn-link"><i class="fa fa-fw fa-eye"></i></a>
								</td>
								<td class="table-col-fa-fw">
									<a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-link"><i class="fa fa-fw fa-pencil"></i></a>
								</td>
								<td class="table-col-fa-fw">
									{!! BootForm::open(array(
										'route' => array('employees.destroy', $employee->id),
										'method' => 'delete',
										'data-confirm-submit' => 'Är du säker på att du vill ta bort personen? Det går inte att ångra.',
										'class' => 'form-inline',
									)) !!}
										<button class="btn btn-link" type="submit"><i class="fa fa-fw fa-trash"></i></button>
									{!! BootForm::close() !!}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@else
			<p>Det finns inga personer i databasen ännu.</p>
		@endif
	</div>

@endsection