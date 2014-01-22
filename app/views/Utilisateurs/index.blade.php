@extends('layouts.scaffold')

@section('main')

<h1>All Utilisateurs</h1>

<p>{{ link_to_route('Utilisateurs.create', 'Add new Utilisateur') }}</p>

@if ($Utilisateurs->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>IdUtilisateurs</th>
				<th>UEmail</th>
				<th>ULogin</th>
				<th>UPassword</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Utilisateurs as $Utilisateur)
				<tr>
					<td>{{{ $Utilisateur->idUtilisateurs }}}</td>
					<td>{{{ $Utilisateur->uEmail }}}</td>
					<td>{{{ $Utilisateur->uLogin }}}</td>
					<td>{{{ $Utilisateur->uPassword }}}</td>
                    <td>{{ link_to_route('Utilisateurs.edit', 'Edit', array($Utilisateur->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Utilisateurs.destroy', $Utilisateur->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no Utilisateurs
@endif

@stop
