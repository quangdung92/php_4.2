@extends('app')

@section('content')
<div class="medium-4 medium-left columns">
	{{ Form::open(array('url' => 'post/create', 'method' => 'POST')) }}
		{{ Form::token() }}
		<h2>{{ $title }}</h2>
		{{ Session::get('msg') }}
			{{ Form::label('status', Lang::get('messages.post.status')) }}
			{{ Form::textarea('status') }}
			{{ Form::submit(Lang::get('messages.post.button'), array('class'=>'button tiny radius')) }}
	{{ Form::close() }}
	<ul class="pricing-table">
		<li class="title" style="padding: 0px; padding-top: 15px">
			<input type="checkbox" id="selecctall"/> Selecct All
		</li>
		@foreach ($posts as $post)
		<li class="description" style="text-align: left">
			<div post_id="{{ $post->id }}">
				<input class="kid_box" type="checkbox" value="{{ $post->id }}">
				{{ $post->status }}
			</div>
			<input type="button" id="update_post" value="Edit" style="float: right"/>
			<textarea id="update_box" style="display: none" ></textarea>
		</li>
		@endforeach
	</ul>
	<input type="button" id="dl_post" class="button tiny radius" value="Delete"/>
</div>
<div class="medium-8 medium-left columns" id="wall_street">
	<ul class="pricing-table">
	@foreach ($all_posts as $all_post)	
	<li class="description" style="text-align: left">
		<h4>{{ $all_post->username }}</h4>
		<div style="width: 600px">{{ $all_post->status }}</div>
		<span style="float: right">{{ $all_post->updated_at }}</span>
	</li>
	@endforeach
	</ul>
</div>
@endsection