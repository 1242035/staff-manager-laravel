@extends('layouts.master')

@section('content')

	<div class="container-fluid">
		<div>
			<div class="btn-toolbar pull-right">
				<a href="{{ route('departments.create') }}" class="btn btn-success"><i class="fa fa-lg fa-plus"></i><span class="hidden-xs"> Lägg till avdelning</span></a>
			</div>
			<h1>Avdelningar</h1>
		</div>
		@if($departments->count())
			<div class="table-responsive">
				<table class="table table-fixed">
					<thead>
						<th>Namn</th>
						<th>Antal personer</th>
						<th class="table-col-fa-fw"></th>
						<th class="table-col-fa-fw"></th>
						<th class="table-col-fa-fw"></th>
					</thead>
					<tbody>
						@foreach ($departments as $department)
							<tr>
								<td>{{ $department->name }}</td>
								<td>{{ $department->employees()->count() }}</td>
								<td class="table-col-fa-fw">
									<a href="{{ route('departments.show', $department->id) }}" class="btn btn-link"><i class="fa fa-fw fa-eye"></i></a>
								</td>
								<td class="table-col-fa-fw">
									<a href="{{ route('departments.edit', $department->id) }}" class="btn btn-link"><i class="fa fa-fw fa-pencil"></i></a>
								</td>
								<td class="table-col-fa-fw">
									{!! BootForm::open(array(
										'route' => array('departments.destroy', $department->id),
										'method' => 'delete',
										'data-confirm-submit' => 'Är du säker på att du vill ta bort avdelningen? Det går inte att ångra.',
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