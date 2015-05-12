@extends('app')

@section('content')


<div class="row" align="center">
	<form id="form_feeds">
		<div class="medium-4 medium-centered columns">
			<fieldset>
				<legend>
					{{ Lang::get('messages.upload.title') }}
				</legend>
				<label>{{ Lang::get('messages.post.status') }}
					<textarea id="text_feed"></textarea>
				</label>
			</fieldset>
		</div>
		<div class="medium-4 medium-centered columns">
			<button type="submit" id="btn_feed" class="btn btn-primary">
				{{ Lang::get('messages.post.button') }}
			</button>
		</div>
	</form>
</div>
<br />
<div class="row" align="center">
 <table>
  <thead>
    <tr>
      <th width="750">Status</th>
      <th width="150">Date</th>
      <th width="150">Provider</th>
    </tr>
  </thead>
  @if ($tweets)
	  @foreach ($tweets as $tweet)
	  <tbody>
	    <tr>
	      <td>{{ $tweet['text'] }}</td>
	      <td>{{ date("d-m-Y",strtotime($tweet['created_at'])) }}</td>
	      <td>
			{{ HTML::image($tweet['user']['profile_image_url']) }}
	      </td>
	    </tr>
	    </tbody>
	   @endforeach
   @endif
  @if ($feeds)
	  @foreach ($feeds['statuses']['data'] as $feed)
	  <tbody>
	    <tr>
	      <td>{{ $feed['message'] }}</td>
	      <td>{{ date("d-m-Y",strtotime($feed['updated_time'])) }}</td>
	      <td>
	      	{{ HTML::image($fb_picture['url']) }}
	      </td>
	    </tr>
	    </tbody>
	   @endforeach
   @endif   
    </table>
 </div>
@endsection