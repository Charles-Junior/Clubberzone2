@extends('layouts.scaffold')

@section('main')

<h1>Create Utilisateur</h1>

{{ Form::open(array('route' => 'Utilisateurs.store')) }}
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
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


