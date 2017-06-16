@extends('panel.main')
@section('title','Edit User')

@section('nav')
@if(Auth::user()->isAdmin())
	@include('layouts.nav-admin')
@else
	@include('layouts.nav-user')
@endif
@endsection

@section('content')

	<div class="row mt-30">
		<div class="col s12 border-bottom">
			<h5><b>Editar usuario</b></h5>
		</div>
	</div>
	<div class="row">
		
		{!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT', 'class' => 'col s12 white z-depth-1', 'style' => 'padding: 30px']) !!}
			<div class="row">
				<div class="input-field col s12 m6">
					{!! Form::label('name', 'Nombre') !!}
					{!! Form::text('name', $user->name, ['class'=>'validate', 'required']) !!}					
				</div>
				<div class="input-field col s12 m6">
					{!! Form::label('email', 'Email') !!}
					{!! Form::email('email', $user->email, ['class'=>'validate', 'required']) !!}					
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6 m2">
					{!! Form::select('role', ['1' => 'Admin', '2' => 'User'], $user->role, ['class' => 'select-dropdown', 'required', 'id' => 'role', 'placeholder' => 'Seleccione un rol']) !!}
				</div>
				<div class="input-fields col s6 m2 offset-m1">
					<p>Display</p>
					@if($user->display)
					{!! Form::radio('display', '1', true, ['id' => 'display1', 'class' => 'with-gap']) !!}
					{!! Form::label('display1', 'Si') !!}
					{!! Form::radio('display', '0', false, ['id' => 'display2', 'class' => 'with-gap']) !!}
					{!! Form::label('display2', 'No') !!}
					@else
					{!! Form::radio('display', '1', false, ['id' => 'display1', 'class' => 'with-gap']) !!}
					{!! Form::label('display1', 'Si') !!}
					{!! Form::radio('display', '0', true, ['id' => 'display2', 'class' => 'with-gap']) !!}
					{!! Form::label('display2', 'No') !!}
					@endif
				</div>	
			</div>
			<div class="input-field">
		      {!! Form::submit('Guardar',['class'=>'btn btn-block btn-block-large waves-effect waves-light']) !!}
		    </div>
		{!! Form::close() !!}

	</div>


@endsection