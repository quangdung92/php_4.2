<?php
	$data = Session::get('data');
	$all_users = $data['all_users'];
	$all_rooms = $data['user_rooms'];
?>
<!-- Open chat room-->
<div class="chat-box" id="box" style="display: none">
	<input type="checkbox" />
	<label data-expanded="Close Chatbox" data-collapsed="Open Chatbox"></label>
	<div class="chat-box-content">
		<p id= "chat_box">
			<span style="opacity: 0.5">Username:</span> Ciluk baaa!!!
		</p>
		<input type="text" id="message" />
		<input type="submit" id="send_chat" value="Send"/>
	</div>
</div>

<!-- Show chat room-->
<div class="chat-box" id="room" style="display: block">
	<input type="checkbox" />
	<label data-expanded="Rooms" data-collapsed="Rooms"></label>
	<div class="chat-box-content">
		@if (!empty($all_rooms))
			@foreach ($all_rooms as $room)
			<span id="room_name" >
				<input type="radio" value="{{ $room->id }}" name="check_room"/>
			</span>
			{{ ChatBox::find($room->id)->follower()->first()->username }}
			<hr />
			@endforeach
		@else
			You don't have any room yet! please invite!
			<hr />
		@endif
		<input type="button" id="invite" value="invite"/>
		<input type="button" id="check_room" value="OK"/>
	</div>
</div>

<!-- Show friends list-->
<div class="chat-box" id="friend_list" style="display: none">
	<input type="checkbox" />
	<label data-expanded="List User" data-collapsed="List User"></label>
	<div class="chat-box-content">
		@if ($all_users)
		@foreach ($all_users as $user)
		<span>
			<input type="radio" value="{{ $user->id }}" name="check_user"/>
		</span>
		{{ $user->username }}
		<hr style="border-top: 1px dotted "/>
		@endforeach
		@endif
		<input type="button" id="check_invited" value="invite" />
		<input type="button" id="back_to_rooms" value="Back" />
	</div>
</div>