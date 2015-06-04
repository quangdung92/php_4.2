@extends('app')

@section('content')
		<div class="medium-4 medium-left columns">
			<ul class="pricing-table">
				<li class="title">
					Following
				</li>
				@foreach ($followings as $following)
				<li class="description" id="following_box" style="text-align: left">
					<span id="link_follow" f_id= "{{$following->id}}">{{$following->username}}</span>
					<input type="button" id="follow_btn" value="Unfollow" style="float: right"/>
				</li>
				@endforeach
			</ul>
			<ul class="pricing-table">
				<li class="title">
					Follower
				</li>
				@foreach ($followers as $follower)
				<li class="description" style="text-align: left">
					<span>{{$follower->username}}</span>
				</li>
				@endforeach
			</ul>
		</div>
		<div class="medium-8 medium-left columns">
			<ul class="pricing-table">
				<li class="title">
					List User
				</li>
				@foreach ($all_users as $user)
				<li class="description" id="follow_box" style="text-align: left">
					<span>{{$user->username}}</span>
					<div class="switch tiny" id="switch_btn">
					<input id="switch{{$user->id}}" type="checkbox" value="{{$user->id}}">
					<label for="switch{{$user->id}}" style="float: right"></label>
					</div>
				</li>
				@endforeach
			</ul>
		</div>
@endsection