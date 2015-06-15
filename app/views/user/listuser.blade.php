@extends('app')

@section('content')
		<div class="medium-4 medium-left columns">
			<ul class="pricing-table">
				<li class="title">
					Following
				</li>
				@foreach ($followings as $following)
				<li class="description" id="following_box" style="text-align: left">
					<h5 id="link_follow" f_id= "{{$following->id}}">{{$following->username}}</h5>
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
					<h5>{{$follower->username}}</h5>
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
					<h5>{{$user->username}}</h5>
					<div class="switch tiny" id="switch_btn">
					<input id="switch{{$user->id}}" type="checkbox" value="{{$user->id}}">
					<label for="switch{{$user->id}}" style="float: right"></label>
					</div>
				</li>
				@endforeach
			</ul>
		</div>
@endsection