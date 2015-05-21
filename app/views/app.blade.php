<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/foundation.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/foundation.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/form.css') }}" rel="stylesheet">	
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">{{app()->environment()}}</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">{{ Lang::get('messages.home.title')}}</a></li>
				</ul>
				@if (Auth::user())
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/post') }}">{{ Lang::get('messages.home.post') }}</a></li>
					</ul>
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/upload') }}">{{ Lang::get('messages.home.upload') }}</a></li>
					</ul>
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/mail') }}">Mail</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-left">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Feeds<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/oauth/twitter') }}">Twitter</a></li>
							<li><a href="{{ url('/oauth/facebook') }}">Facebook</a></li>
						</ul>
					</li>
					</ul>
				@endif
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Lang::get('messages.lang') }}<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/en') }}" lang="en">English</a></li>
							<li><a href="{{ url('/ja') }}" lang="ja">Japan</a></li>
							<li><a href="{{ url('/fr') }}" lang="fr">France</a></li>
						</ul>
					</li>
					@if (Auth::guest())
						<li><a href="{{ url('/') }}">{{ Lang::get('messages.home.login') }}</a></li>
						<li><a href="{{ url('/register') }}">{{ Lang::get('messages.home.register') }}</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/profile') }}">{{ Lang::get('messages.profile.link') }}</a></li>
								<li><a href="{{ url('/logout') }}">{{ Lang::get('messages.home.logout') }}</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	
	@yield('content')
	@if (Auth::user())
		@include('chatbox')
    @endif
    
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="/javascripts/jquery.validate.js"></script>
	<script src="/javascripts/register_form.js"></script>
	<script src="/javascripts/oauth.js"></script>
	<script src="/javascripts/chat_box.js"></script>
	<script src="/javascripts/jquery.validate.min.js"></script>
</body>
</html>
