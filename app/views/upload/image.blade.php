@extends('app')

@section('content')

{{ Session::get('msg') }}
<div class="row" align="center">
	<form action="upload/create" class="form-horizontal" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
		<div class="small-4 small-centered columns">
			<fieldset>
				<legend>
					Upload
				</legend>
				<label>Input file
					<input type="file" name="photo">
				</label>
			</fieldset>
		</div>
		<div class="small-4 small-centered columns">
			<button type="submit" class="btn btn-primary">
				Post
			</button>
		</div>
	</form>
</div>
@endsection