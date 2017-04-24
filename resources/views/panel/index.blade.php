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
	<div class="card col s2 p-1rem">
		<div class="col s8 offset-s2">
			<img src="{{asset('images/user.jpg')}}" class="circle responsive-img">
		</div>
		<div class="col s12 mt-15 center-align">
			<div class="divider"></div>
			<p class="mt-15 mb-0 black-text"><b>{{ Auth::user()->name }}</b></p>
			<p><i>{{ Auth::user()->email }}</i></p>
		</div>
	</div>
	@if(Auth::user()->isAdmin())
	<div class="card col s2 offset-s1 pb-15">
		<h4 class="teal-text"><b>{{ $users['activos'] }}</b> 
		{{-- <small>Usuarios activos</small> --}}
		</h4>
		<p>USUARIOS ACTIVOS</p>
		<div class="divider strong teal"></div>
	</div>
	<div class="card col s2 offset-s1 pb-15">
		<h4 class="teal-text"><b>{{ $users['activos'] }}</b> 
		{{-- <small>Usuarios activos</small> --}}
		</h4>
		<p>USUARIOS ACTIVOS</p>
		<div class="divider strong teal"></div>
	</div>
	<div class="card col s2 offset-s1 pb-15">
		<h4 class="teal-text"><b>{{ $users['activos'] }}</b> 
		{{-- <small>Usuarios activos</small> --}}
		</h4>
		<p>USUARIOS ACTIVOS</p>
		<div class="divider strong teal"></div>
	</div>
	@endif
</div>
<div class="row">
	@if(Auth::user()->isAdmin())
	{{-- <div class="col s6 z-depth-2 nopadding">
		<div class="panel-heading teal">
			<h6><a href="{{ route('users.index') }}" class="white-text">Usuarios</a></h6>
		</div>
		<div class="panel-body">
			<ul class="collection noborder">
				<li class="collection-item">Total <span class="badge teal br-15 white-text">{{ $users['total'] }}</span></li>
				<li class="collection-item">Activo <span class="badge blue br-15 white-text">{{ $users['activos'] }}</span></li>
				<li class="collection-item">Inactivo <span class="badge orange br-15 white-text">{{ $users['inactivos'] }}</span></li>
			</ul>
		</div>

	</div> --}}
	@else
	<div class="col s6 z-depth-2 nopadding">
		<div class="panel-heading teal">
			<h6><a href="users.php" class="white-text">Generales</a></h6>
		</div>
		<div class="panel-body">
			{{-- <ul class="collection noborder">
				<li class="collection-item">Total <span class="badge teal br-15 white-text">{{ $users['total'] }}</span></li>
				<li class="collection-item">Activo <span class="badge blue br-15 white-text">{{ $users['activos'] }}</span></li>
				<li class="collection-item">Inactivo <span class="badge orange br-15 white-text">{{ $users['inactivos'] }}</span></li>
			</ul> --}}
		</div>

	</div>
	@endif
</div>


@endsection























