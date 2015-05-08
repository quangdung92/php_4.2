@extends('app')

@section('content')

<div class="row" align="center">
	{{ Form::open(array('url' => 'user/login', 'method' => 'POST')) }}
		{{ Form::token() }}
		<h2>Login!</h2>
		{{ Session::get('msg') }}
		<div class="small-4 small-centered columns">
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email') }}
		</div>
		<div class="small-4 small-centered columns">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password' )}}
		</div>
		<div class="row">
			<div class="small-4 small-centered columns">
				{{ Form::submit('Login', array('class'=>'button tiny')) }}
			</div>
		</div>
	{{ Form::close() }}
</div>
@endsection
