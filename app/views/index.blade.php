@extends('app')

@section('content')
<div class="row" align="center">
	{{ Form::open(array('url' => 'user/login', 'method' => 'POST')) }}
		{{ Form::token() }}
		<h2>{{ Lang::get('messages.login.title') }}</h2>
		{{ Session::get('msg') }}
		<div class="medium-4 medium-centered columns">
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email') }}
		</div>
		<div class="medium-4 medium-centered columns">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password' )}}
		</div>
		<div class="row">
			<div class="medium-4 medium-centered columns">
				{{ Form::submit(Lang::get('messages.login.button'), array('class'=>'button tiny')) }}
			</div>
		</div>
	{{ Form::close() }}
</div>
@endsection
