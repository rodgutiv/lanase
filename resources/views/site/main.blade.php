<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Lanase | @yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
		{!! Html::style('css/normalize.css') !!}
		{!! Html::style('http://fonts.googleapis.com/icon?family=Material+Icons') !!}
		{!! Html::style('css/materialize.min.css') !!}
		{!! Html::style('css/main.css') !!}
		{!! Html::style('css/site.css') !!}
		{!! Html::script('js/modernizr-2.8.3.min.js') !!}
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <header>
        	<!-- Perfil -->
			<ul id="perfil" class="dropdown-content">
				<li><a href="{{ url('/panel/dashboard') }}">Dashboard</a></li>
				<li class="divider"></li>
				<li>{!! Html::link('logout', 'Salir', ['onclick' => 'event.preventDefault();document.getElementById("logout-form").submit();']) !!}</li>
				
				{!! Form::open(['url' => '/logout', 'method' => 'POST', 'id' => 'logout-form', 'style' => 'display: none']) !!}
				{!! Form::close() !!}
			</ul>

			<a href="#" data-activates="mobile-nav" class="button-collapse" id="menu-trigger"><i class="material-icons">menu</i></a>
			<div class="navbar-fixed hide-on-med-and-down">
				<nav class="white navbar-fixed">
					<div class="nav-wrapper row">
						<a href="{{ url('/') }}" class="brand-logo col s2">
							<img src="{{ asset('images/logo-texto.png') }}" class="responsive-img">
						</a>
						<ul id="nav-mobile" class="right hide-on-med-and-down">
							<li><a href="{{ route('investigadores') }}">Investigadores</a></li>
							@if(Auth::guest())
								<li><a href="{{ url('/login') }}">Login</a></li>
							@else
								<li><a class="dropdown-button" href="#!" data-activates="perfil">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
							@endif
							<!-- Dropdown Trigger -->
							
				
						</ul>
					</div>
				</nav>
			</div>
			<ul class="side-nav white" id="mobile-nav">
				<li><a href="!#">Module 1</a></li>
				<li><a href="{{ url('/login') }}">Login</a></li>
			</ul>
        </header>

        <main>
			@include('flash::message')
			@yield('content')
		</main>

		<footer>
    		<div class="row">
    			<p class="center-align">Derechos reservados 2017</p>
    		</div>
		</footer>

        {!! Html::script('js/jquery-3.1.1.min.js') !!}        
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.1.1.min.js"><\/script>')</script>
        {!! Html::script('js/materialize.min.js') !!}
        <script type="text/javascript">
		
			@if($errors)
			@foreach($errors->all() as $error)
			  Materialize.toast('{{ $error }}', 4000, 'grey darken-3 white-text');
			@endforeach
			@endif

			$(".button-collapse").sideNav({
				edge: 'left', // Choose the horizontal origin
			// closeOnClick: true
			});

		</script>
        <script type="text/javascript">
			@yield('scripts')		
		</script>
    </body>
</html>
