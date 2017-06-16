@extends('panel.main')
@section('title','Reasearch Area Edit')

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
			<h5><b>Editar area de investigación</b></h5>
		</div>
	</div>
	<div class="row">
		
		{!! Form::open(['route' => ['researcharea.update', $ra->id], 'method' => 'PUT', 'class' => 'col s12 white z-depth-1', 'style' => 'padding: 30px', 'files' => true]) !!}
			<div class="row">
				<div class="input-field col s12 m4">
					{!! Form::label('title_es', 'Nombre (es)') !!}
					{!! Form::text('title_es', $ra->title_es, ['class'=>'validate', 'required']) !!}					
				</div>
				<div class="input-field col s12 m4">
					{!! Form::label('title', 'Nombre (en)') !!}
					{!! Form::text('title', $ra->title, ['class'=>'validate', 'required']) !!}					
				</div>
				<div class="col s12 m4">
					<div class="input-fields">
						<p>Display</p>
						@if($ra->display)
						{!! Form::radio('display', 1, true, ['id' => 'display1', 'class' => 'with-gap']) !!}
						{!! Form::label('display1', 'Si') !!}
						{!! Form::radio('display', 0, false, ['id' => 'display2', 'class' => 'with-gap']) !!}
						{!! Form::label('display2', 'No') !!}
						@else
						{!! Form::radio('display', 1, false, ['id' => 'display1', 'class' => 'with-gap']) !!}
						{!! Form::label('display1', 'Si') !!}
						{!! Form::radio('display', 0, true, ['id' => 'display2', 'class' => 'with-gap']) !!}
						{!! Form::label('display2', 'No') !!}
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m4">
					<img src="{{ asset('images/researcharea') .'/'. $ra->image }}" class="responsive-img">
				</div>
				<div class="col s12 m8">
					<div class="input-field file-field">
						<div class="btn">
							<span>
								Imagen        
							</span>
							{!! Form::file('image') !!}
						</div>
						<div class="file-path-wrapper">
							{!! Form::text('image',null,['class'=>'file-path validate','placeholder'=>'Selecciona una imagen']) !!}
						</div>
					</div>
				</div>
			</div>
			<div class="input-field">
		      {!! Form::submit('Guardar',['class'=>'btn btn-block btn-block-large waves-effect waves-light']) !!}
		    </div>
		{!! Form::close() !!}

	</div>


@endsection