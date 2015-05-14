@extends('app')

@section('content')

{{ Session::get('msg') }}
<div class="row" align="center">
	<form action="upload/create" class="form-horizontal" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
		<div class="medium-4 medium-centered columns">
			<fieldset>
				<legend>
					{{ Lang::get('messages.upload.title') }}
				</legend>
				<label class="fileUpload btn btn-primary">
					{{ Lang::get('messages.upload.input') }}
					<input type="file" name="photo" class="upload">
				</label>
			</fieldset>
		</div>
		<div class="medium-4 medium-centered columns">
			<button type="submit" class="btn btn-primary">
				{{ Lang::get('messages.upload.button') }}
			</button>
		</div>
	</form>
</div>
<br />
@endsection