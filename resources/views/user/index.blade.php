@extends('main')
@section('title','Dashboard')

@section('nav')
@include('user.nav')
@endsection

@section('content')

<div class="row mt-30">
	<div class="col s12 border-bottom">
		<h5><b>Bienvenido {{ Auth::user()->name }}</b></h5>
	</div>
</div>
<div class="row">
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
</div>

@endsection