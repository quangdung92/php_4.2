@extends('app')

@section('content')
		<div class="medium-4 medium-left columns">
			<ul class="pricing-table">
				<li class="title" id="test_li">
					List User
				</li>
				@foreach ($all_users as $user)
				<li class="description switch tiny" id="follow_box" style="text-align: left">
					<span>{{$user->username}}</span>
					<input id="switch{{$user->id}}" type="checkbox" value="{{$user->id}}">
					<label for="switch{{$user->id}}" style="float: right"></label>
				</li>
				@endforeach
			</ul>
			<ul class="pricing-table">
				<li class="title">
					Following
				</li>
				@foreach ($followings as $following)
				<li class="description" id="following_box" style="text-align: left">
					<span>{{$following->username}}</span>
					<input type="button" id="follow_btn" value="Unfollow" f_id= "{{$following->id}}" style="float: right"/>
				</li>
				@endforeach
			</ul>
			<ul class="pricing-table">
				<li class="title">
					Selecct All
				</li>
				<li class="description" style="text-align: left">
				</li>
			</ul>
		</div>
		<div class="medium-8 medium-left columns">
			<ul class="pricing-table">
				<li class="title">
					Selecct All
				</li>
				<li class="description" style="text-align: left"></li>
			</ul>
		</div>
@endsection