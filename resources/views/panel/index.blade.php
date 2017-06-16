@extends('panel.main')
@section('title','Dashboard')

@section('nav')
@if(Auth::user()->isAdmin())
	@include('layouts.nav-admin')
@else
	@include('layouts.nav-user')
@endif
@endsection

@section('content')

<div class="row mt-30">
	@if(isset(Auth::user()->image))
	has it
	@endif
{{-- 	<div class="col s12 m3">
		<div class="card center-align">
			<div class="col s8 offset-s2">
				<img src="{{asset('images/user.jpg')}}" class="circle responsive-img">
			</div>
			<div class="clearfix"></div>
			<div class="divider"></div>
			<p class="mt-15 mb-0 black-text"><b>{{ Auth::user()->name }}</b></p>
			<p><i>{{ Auth::user()->email }}</i></p>
		</div>
	</div> --}}
	@if(Auth::user()->isAdmin())
	<p class="p-col mb-30 fs-13">Información General</p>
	<div class="col s12 m3">
		<div class="col s12 card card-dashboard teal">
			<div class="col s4">
				<i class="fa fa-user white-text"></i>
			</div>
			<div class="col s8 white">
				<h4>{{ $users['total'] }}</h4>
				<p>Usuarios</p>				
			</div>
		</div>
	</div>

	<div class="col s12 m3">
		<div class="col s12 card card-dashboard orange">
			<div class="col s4">
				<i class="fa fa-flask white-text"></i>
			</div>
			<div class="col s8 white">
				<h4>{{ $users['projects'] }}</h4>
				<p>Proyectos</p>				
			</div>
		</div>
	</div>

	<div class="col s12 m3">
		<div class="col s12 card card-dashboard purple">
			<div class="col s4">
				<i class="fa fa-server white-text"></i>
			</div>
			<div class="col s8 white">
				<h4>{{ $users['datasets'] }}</h4>
				<p>Datasets</p>				
			</div>
		</div>
	</div>

	<div class="col s12 m3">
		<div class="col s12 card card-dashboard brown">
			<div class="col s4">
				<i class="fa fa-tag white-text"></i>
			</div>
			<div class="col s8 white">
				<h4>-</h4>
				<p>Tareas pendientes</p>				
			</div>
		</div>
	</div>
	
	@endif
</div>

@endsection























