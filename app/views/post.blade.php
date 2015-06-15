@extends('app')

@section('content')
<div class="medium-4 medium-left columns">
	{{ Form::open(array('url' => 'post/create', 'method' => 'POST')) }}
		{{ Form::token() }}
		<h1>{{ $title }}</h1>
		{{ Session::get('msg') }}
			{{ Form::label('status', Lang::get('messages.post.status')) }}
			{{ Form::textarea('status') }}
			{{ Form::submit(Lang::get('messages.post.button'), array('class'=>'button tiny radius')) }}
	{{ Form::close() }}
	<ul class="pricing-table" id="posts">
		<li class="title" style="padding: 0px; padding-top: 15px">
			<input type="checkbox" id="selecctall"/> Selecct All
		</li>
		@foreach ($posts as $post)
		<li class="description" style="text-align: left">
			<div post_id="{{ $post->id }}">
				<input class="kid_box" type="checkbox" value="{{ $post->id }}">
				<div id="alstatus">{{ $post->status }}</div>
			</div>
			<input type="button" id="update_post" value="Edit" style="float: right"/>
			<textarea id="update_box" style="display: none" ></textarea>
			<br />
		</li>
		@endforeach
	</ul>
	<input type="button" id="dl_post" class="button tiny radius" value="Delete"/>
</div>
<div class="medium-8 medium-left columns" id="wall_street">
	<ul class="pricing-table">
	@foreach ($all_posts as $all_post)	
	<li class="description" style="text-align: left" id="social_post" urs_id="{{$all_post->user_id}}">
		<h5><img src="/uploads/no_ava" id="img_ava"/> {{ $all_post->username }}</h5>
		<div id="alstatus" style="width: 600px">{{ $all_post->status }}</div>
		<span class="caption_date" style="float: right">{{ $all_post->updated_at }}</span>
	</li>
	@endforeach
	</ul>
	{{ $all_posts -> links()}}
</div>
@endsection

<div id="overlay"></div>
<div id="pop_box" style="padding-top: 10px">
  	<div class="medium-12 medium-centered columns" id="pop_title">
  		Send_to: <span></span>
	</div>
	<div class="medium-12 medium-centered columns">
		<textarea id="pop_text"></textarea>
	</div>
	<div class="medium-10 medium-centered columns">
		<input type="button" class="button tiny radius" style="float: left" id="pop_cancel"  value="Cancel" />
		<input type="button" class="button tiny radius" style="float: right" id="pop_send" value="Send" />
	</div>
</div>
