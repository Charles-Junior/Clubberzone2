@extends('layouts.scaffold')

@section('main')

<h1>Edit Utilisateur</h1>
{{ Form::model($Utilisateur, array('method' => 'PATCH', 'route' => array('Utilisateurs.update', $Utilisateur->id))) }}
	<ul>
        <li>
            {{ Form::label('idUtilisateurs', 'IdUtilisateurs:') }}
            {{ Form::text('idUtilisateurs') }}
        </li>

        <li>
            {{ Form::label('uEmail', 'UEmail:') }}
            {{ Form::text('uEmail') }}
        </li>

        <li>
            {{ Form::label('uLogin', 'ULogin:') }}
            {{ Form::text('uLogin') }}
        </li>

        <li>
            {{ Form::label('uPassword', 'UPassword:') }}
            {{ Form::text('uPassword') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('Utilisateurs.show', 'Cancel', $Utilisateur->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
