@extends('app')

@section('content')
	<div class="row" align="center">
		{{ Form::open(array('url' => 'user/create', 'method' => 'POST', 'id' => 'form_register')) }}
		{{ Form::token() }}
		<h2>{{ Lang::get('messages.register.title') }}</h2>
		{{ Session::get('msg') }}
		<div class="medium-4 medium-centered columns">
			{{ Form::label('name','Username') }}
			{{ Form::text('name')}}
		</div>
		<div class="medium-4 medium-centered columns">
			{{ Form::label('email', 'Email')}}
			{{ Form::text('email') }}
		</div>
		<div class="medium-4 medium-centered columns">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password' )}}
		</div>
		<div class="row">
			<div class="medium-4 medium-centered columns">
				{{ Form::submit(Lang::get('messages.register.button'), array('class'=>'button tiny')) }}
				<a href="/"> Back </a>
			</div>
		</div>
		{{ Form::close() }}
	</div>

@endsection