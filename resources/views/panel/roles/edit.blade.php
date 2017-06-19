@extends('panel.main')
@section('title','Edit rol')

@section('nav')
@if(Auth::user()->isAdmin())
	@include('layouts.nav-admin')
@else
	@include('layouts.nav-user')
@endif
@endsection

@section('content')

	<div class="row mt-30">
		<div class="col s12 m8 offset-m1 border-bottom">
			<h5><b>Editar rol</b></h5>
		</div>
	</div>
	<div class="row">
		
		{!! Form::open(['route' => ['roles.update', $rol->id], 'method' => 'PUT', 'class' => 'col s10 m8 offset-m1']) !!}
			<div class="row col s12 white z-depth-1">
				<div class="input-field col s12">
					{!! Form::label('name', 'Nombre') !!}
					{!! Form::text('name', $rol->name, ['class'=>'validate', 'required']) !!}					
				</div>
				<div class="input-field col s12">
					{!! Form::label('permissions', 'Permisos (Separados por comas)') !!}
					{!! Form::textarea('permissions', $rol->permissions, ['class'=>'materialize-textarea','required']) !!}				
				</div>
			</div>

			<div class="input-field col s6 m4">
		      {!! Form::submit('Guardar',['class'=>'btn btn-block btn-block-large waves-effect waves-light']) !!}
		    </div>
		{!! Form::close() !!}
		<div class="clearfix"></div>
		<div class="col s12 m10 offset-m1">
			<p class="mt-30">Permisos disponibles:</p>
			<p>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">dashboard</span>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">add_users</span>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">list_users</span>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">delete_users</span>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">edit_users</span>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">manage_roles</span>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">manage_fields</span>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">manage_projects</span>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">moderate</span>
			</p>
		</div>

	</div>


@endsection