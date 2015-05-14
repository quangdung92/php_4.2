@extends('app')

@section('content')

	<div class="row" align="center">
	<form action="mail/send" class="form-horizontal" method="POST" id = 'form_register'>
		{{ Session::get('msg') }}
		<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
		<div class="medium-4 medium-centered columns">
			<fieldset>
				<legend>
					{{ Lang::get('messages.profile.title') }}
				</legend>
				<label>
					Email
					<input type="text" name="email" placeholder="@e.g: example@gmail.com">
				</label>
			</fieldset>
		</div>
		<div class="medium-4 medium-centered columns">
			<button type="submit" class="btn btn-primary">
				{{ Lang::get('messages.mail.button') }}
			</button>
		</div>
	</form>
</div>
@endsection