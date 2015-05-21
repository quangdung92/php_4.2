@extends('app')

@section('content')
<div class="row" align="center">
	{{ Form::open(array('url' => 'post/create', 'method' => 'POST')) }}
		{{ Form::token() }}
		<h2>{{ $title }}</h2>
		{{ Session::get('msg') }}
		<div class="medium-4 medium-centered columns">
			{{ Form::label('status', Lang::get('messages.post.status')) }}
			{{ Form::textarea('status') }}
		</div>
		<div class="row">
			<div class="medium-4 medium-centered columns">
				{{ Form::submit(Lang::get('messages.post.button'), array('class'=>'button small')) }}
			</div>
		</div>
	{{ Form::close() }}
	<br />
	<div class="row" align="center">
		<div class="medium-4 medium-centered columns">
			<ul class="pricing-table">
				<li class="title" >
				</li>
				@foreach ($posts as $post)
				<li class="description">
					<span post_id="{{ $post->id }}" >{{ $post->status }}</span>
					<input type="button" id="update_post" value="Edit"/>
					<textarea id="update_box" style="display: none" ></textarea>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endsection
