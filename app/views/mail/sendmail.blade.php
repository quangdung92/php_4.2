@extends('app')

@section('content')

	<div class="row" align="center" style="margin-top: 20px">
		<div class="medium-4 medium-centered columns">
			<ul class="pricing-table">
				<li class="title">
					Profile
				</li>
				<li class="description">
					{{ $acc['id'] }}
				</li>
				<li class="description">
					{{ $acc['email'] }}
				</li>
				<li class="description">
					{{ $acc['username'] }}
				</li>
			</ul>
		</div>
	</div>
@endsection