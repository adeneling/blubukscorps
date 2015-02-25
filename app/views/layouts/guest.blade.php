<!DOCTYPE html>
<html>
	<head>
		<title>Blubuks | Customer Intimacy System</title>
		<link rel="stylesheet" href="{{ asset('packages/uikit/css/uikit.almost-flat.min.css')}}" />
        
        <script src="{{ asset('components/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('packages/uikit/js/uikit.min.js')}}"></script>

	<body>
	
	<div class="uk-container uk-container-center uk-margin-top">
		<nav class="uk-navbar">
			<a href="/" class="uk-navbar-brand uk-hidden-small">BLUBUKS</a>
			<div class="uk-navbar-flip uk-navbar-content">
			    <div class="uk-button-group">
    				<a class="uk-button" href="{{ URL::to('login') }}">Login</a>
    				<a class="uk-button" href="{{ URL::to('signup') }}">Sign Up</a>    				
				</div>
				
			</div>
			<div class="uk-navbar-brand uk-navbar-center uk-visible-small">BlUBUKS</div>
		</nav>

		<div class="uk-container-center uk-margin-top">
			@include('layouts.partials.alert')
			@yield('content')
		</div>
	</div>

	</body>

</html>