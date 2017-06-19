<!-- Perfil -->
<ul id="perfil" class="dropdown-content">
	<li><a href="#!">Perfil</a></li>
	<li class="divider"></li>
	{{-- <li>{!! Html::link('logout', 'Salir', ['onclick' => 'event.preventDefault();document.getElementById("logout-form").submit();']) !!} </li> --}}
	
	<li><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Salir <i class="fa fa-sign-out right" aria-hidden="true"></i></a></li>

	{!! Form::open(['url' => '/logout', 'method' => 'POST', 'id' => 'logout-form', 'style' => 'display: none']) !!}
	{!! Form::close() !!}
	{{-- <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form> --}}
</ul>

<a href="#" data-activates="mobile-nav" class="button-collapse hide-on-large-only" id="menu-trigger"><i class="material-icons">menu</i></a>
<nav class="white hide-on-small-only">
	<div class="nav-wrapper container">
		<ul class="right">
			<li><a class="dropdown-button" href="#!" data-activates="perfil">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
		</ul>
	</div>
</nav>

<ul class="side-nav fixed" id="mobile-nav">
	<div id="panel-logo">
		<a href="{{ url('/') }}" class="no-padding"><img src="{{ asset('images/logo-texto.png') }}" class="responsive-img"></a>
	</div>
	<p>GENERAL</p>
	<li @if(str_contains(Route::getCurrentRoute()->getName(), 'dashboard')) class="active1" @endif><a href="{{ url('/panel/dashboard') }}"><i class="fa fa-circle-o-notch" aria-hidden="true"></i> Dashboard</a></li>
	{{-- <li @if(str_contains(Route::getCurrentRoute()->getName(), 'users')) class="active1" @endif><a href="{{ route('users.index') }}"><i class="fa fa-user-o" aria-hidden="true"></i> Users</a></li> --}}
	<li class="no-padding">
		<ul class="collapsible collapsible-accordion">
			<li>
			<a class="collapsible-header 
				@if(str_contains(Route::getCurrentRoute()->getName(), ['users', 'roles']))
				active 
				@endif">
				<i class="fa fa-user-o" aria-hidden="true"></i> Usuarios <i class="fa fa-angle-down right" aria-hidden="true"></i>
			</a>
				<div class="collapsible-body">
					<ul>
						<li @if(str_contains(Route::getCurrentRoute()->getName(), 'users')) class="active2" @endif><a href="{{ route('users.index') }}">Usuarios</a></li>
						<li @if(str_contains(Route::getCurrentRoute()->getName(), 'roles')) class="active2" @endif><a href="{{ route('roles.index') }}">Roles</a></li>
					</ul>
				</div>
			</li>
		</ul>
	</li>
	<li class="no-padding">
		<ul class="collapsible collapsible-accordion">
			<li>
			<a class="collapsible-header 
				@if(str_contains(Route::getCurrentRoute()->getName(), ['researcharea', 'projects', 'datasets']))
				active 
				@endif">
				<i class="fa fa-file-o" aria-hidden="true"></i> Investigación <i class="fa fa-angle-down right" aria-hidden="true"></i>
			</a>
				<div class="collapsible-body">
					<ul>
						<li @if(str_contains(Route::getCurrentRoute()->getName(), 'researcharea')) class="active2" @endif><a href="{{ route('researcharea.index') }}">Areas de investigacion</a></li>
						<li @if(str_contains(Route::getCurrentRoute()->getName(), 'projects')) class="active2" @endif><a href="{{ route('projects.index') }}">Proyectos</a></li>
						<li @if(str_contains(Route::getCurrentRoute()->getName(), 'datasets')) class="active2" @endif><a href="{{ route('datasets.index') }}">Datasets</a></li>
					</ul>
				</div>
			</li>
		</ul>
	</li>
	<li>
		<div class="divider"></div>
	</li>
	<li class="no-padding">
		<ul class="collapsible collapsible-accordion">
			<li>
			<a class="collapsible-header">
				Opciones <i class="fa fa-angle-down right" aria-hidden="true"></i>
			</a>
				<div class="collapsible-body">
					<ul>
						<li><a href="#!">Perfil</a></li>
						<li></li>
						<li><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Salir <i class="fa fa-sign-out right" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</li>
		</ul>
	</li>
</ul>