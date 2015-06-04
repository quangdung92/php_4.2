<?php

class ListUserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /listuser
	 *
	 * @return Response
	 */
	public function index()
	{
		//get following, follower
		$all_followings = Auth::user()->following()->get();
		$all_followers = Auth::user()->follower()->get();
		Log::info($all_followers);
		// Check list users
		$all_followings_id = Auth::user()->following()->lists('following_id');
		$all_users = User::whereNotIn('id', $all_followings_id)->where('id','!=',Auth::id())->get();
		return View::make('user/listuser')->with(array('all_users' => $all_users,
													   'followings' => $all_followings,
													   'followers' => $all_followers));
	}

	public function following()
	{
		$following_id = Request::get('following_id');
		$following_user = User::find($following_id);
		Auth::user()->following()->save($following_user);
		return Response::json(array('status' => 'success'));
	}

	public function unfollow()
	{
		$unfollow_id = Request::get('following_id');
		$unfollow_user = User::find($unfollow_id);
		Auth::user()->follow_list()->where('following_id','=',$unfollow_id)->delete();
		return Response::json(array('status' => 'unfollowed'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /listuser/{id}/edit
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
	 * PUT /listuser/{id}
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
	 * DELETE /listuser/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
