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
<div class="medium-10 medium-centered columns">
	<fieldset>
		<legend style="padding-left: 10px; padding-right: 10px">
			Your Images
		</legend>
		<div align="center">
		@foreach ($images as $image)
		<figure class="cap-bot">
			<img src="/uploads/{{app()->environment()}}/{{Auth::id()}}/{{$image->origilnal_filename}}"/>
			<figcaption>
				<p>You are watching {{$image->origilnal_filename}}, you can delete or choose avata with buttons bellow.</p>
				<input type="button" id="update_btn" image_id = "{{$image->id}}" value="Delete"/>
				<input type="button" id="update_btn" image_id = "{{$image->id}}" value="Avatar"/>
			</figcaption>
		</figure>
		@endforeach
		</div>
	</fieldset>
</div>
@endsection