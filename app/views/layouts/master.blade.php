<!DOCTYPE html>
<html >
	<head>
		<title> @yield('title') | PT. Blubuks</title>
		<link rel="stylesheet" href="{{ asset('packages/uikit/css/uikit.almost-flat.min.css')}}" />
		<link rel="stylesheet" href="{{ asset('css/app.css')}}" />
		<script src="{{ asset('components/jquery/jquery.min.js')}}" > </script>
		<script src="{{ asset('packages/uikit/js/uikit.min.js')}}" > </script>
		@yield( 'asset' )
	</head>
	<body>

		<div class="uk-container uk-container-center uk-margin-top" >
				<nav class="uk-navbar" >
				<a href="{{URL::to('/dashboard')}}" class="uk-navbar-brand uk-hidden-small" >BLUBUKS</a>
				<ul class="uk-navbar-nav uk-hidden-small" >
					@yield('nav')
				</ul>

				<div class="uk-navbar-flip uk-navbar-content">
				    <div class="uk-button-group">
				    <!--
				    	Menampilkan User yang sedang login
				    -->
				    	<div class="uk-button-group">
					    <!-- This is a button -->
						    <button class="uk-button uk-button-primary"><i class="uk-icon-user"> {{Sentry::getUser()->first_name. ' ' . Sentry::getUser()->last_name}}</i></button>

						    <!-- This is the container enabling the JavaScript -->
						    <div data-uk-dropdown="{mode:'click'}">

						        <!-- This is the button toggling the dropdown -->
						        <a class="uk-button">
						        	<i class="uk-icon-cog"></i>
						        </a>

						        <!-- This is the dropdown -->
						        <div class="uk-dropdown uk-dropdown-small">
						            <ul class="uk-nav uk-nav-dropdown">
						                <li>
						                	<a class="uk-button uk-button-danger uk-button-mini" href="{{ URL::to('logout') }}">
							                	<i class="uk-icon-sign-out"> Logout</i>
							                </a>
						                </li>
						                
						            </ul>
						        </div>

						    </div>
						</div>
						<!-- 
	    				<a class="uk-button uk-button-primary" href="">{{Sentry::getUser()->first_name. ' ' . Sentry::getUser()->last_name}}</a>

	    				<a class="uk-button uk-button-danger" href="{{ URL::to('logout') }}">Logout</a>    				
	    				-->
					</div>
				</div>

				<div class="uk-navbar-brand uk-navbar-center uk-visible-small">BLUBUKS</div>
			</nav>

			<div class="uk-container-center uk-margin-top" >
				@include('layouts.partials.alert')

				<!-- Tambahan Panel Box buat Breadcrumb-->
				<div class="uk-panel uk-panel-box uk-panel-box-secondary">
					<ul class="uk-breadcrumb" >
						@yield('breadcrumb')
					</ul>	
				</div>
				
				<h1 class="uk-heading-large" >					
					@yield('title') 
					@yield('title-button')
				</h1>
					@include('layouts.partials.validation')
					@yield('content')
			</div>
		</div>
	</body>
</html>