<?php

class ChatBoxController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /chatbox
	 *
	 * @return Response
	 */
	public function setchat()
	{
		$all_users = DB::table('users')->where('id', '!=', Auth::id())->get();
		$user_rooms = DB::table('chat_boxs')-> where('user_id', Auth::id())-> get();
		$data = array('all_users' => $all_users, 'user_rooms' => $user_rooms);
		Session::put('data', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /chatbox/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$ids = Request::get('ids');
		ChatBox::create([
				'follower_id' => $ids,
				'user_id' => Auth::user()["id"]
		]);
		App::make('ChatBoxController')->setchat();
		return Response::json(array('status' => 'sucess'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /chatbox
	 *
	 * @return Response
	 */
	public function store_message()
	{
		$message = Request::get('message');
		Log::info($message);
		$room = Request::get('room');
		Log::info($room);
		Message::create([
			'content' => $message,
			'box_id' => $room,
			'user_id' => Auth::id()
		]);
		return Response::json(array('status' => 'sucess', 'user' => User::find(Auth::id())->username) );
	}

	/**
	 * Display the specified resource.
	 * GET /chatbox/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function set_room()
	{
		//
	}
	
	
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /chatbox/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /chatbox/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /chatbox/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}