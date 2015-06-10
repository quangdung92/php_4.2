<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('new');
	}
	
	public function create()
	{
		$all = 	Request::all();
		$vali = $this->validate($all);
		if ($vali->fails()) {
			$messages = $vali->messages();
			return Redirect::to('register')-> with('msg',$messages ->first('email'));
		} else {
		User::create([
			'username' => $all['name'],
			'email' => $all['email'],
			'password' => Hash::make($all['password']),
		]);
			return Redirect::to('/')-> with('msg', Lang::get('messages.register.sucess'));
		}
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function profile()
	{
		return View::make('profile')->with(array('current_user' => Auth::user()));
	}
	
	public function update()
	{
		$all = 	Request::all();
		if ($all['email'] == Auth::user()['email']) {
			DB::table('users')
	            ->where('id', Auth::id())
	            ->update(array(
	            				'username' => $all['name'], 
	            				'password' => Hash::make($all['password'])
							));
			return Redirect::to('profile')-> with('msg', Lang::get('messages.register.sucess'));
		} else {
			$vali = $this->validate($all);
			if ($vali->fails()) {
				$messages = $vali->messages();
				return Redirect::to('profile')-> with('msg', $messages ->first('email'));
			} else {
				DB::table('users')
	            ->where('id', Auth::id())
	            ->update(array(
	            				'username' => $all['name'], 
	            				'email' => $all['email'],
	            				'password' => Hash::make($all['password'])
							));
			return Redirect::to('profile')-> with('msg', Lang::get('messages.register.sucess'));
			}
		}
	}
	
	public function login()
	{
		$results = Auth::attempt([
			'email' => Request::get('email'),
			'password' => Request::get('password'),
		]);
		Log::info(Auth::user());
		if ($results){
			App::make('ChatBoxController')->setchat();
			return Redirect::to('/post') -> with('msg', Lang::get('messages.login.sucess'));
		} else {
			return Redirect::to('/') -> with('msg', Lang::get('messages.login.error'));
		}
	}

	/**
	 * Display the specified resource.
	 * GET /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function search()
	{
		$find = Request::get('search');
		$names = Auth::user()->following()->where('username', 'LIKE', '%'.$find.'%')->lists('username');
		return Response::json(array('status' => 'success','search_list' => $names));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /user/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function avatar()
	{
		$user_id = Request::get("user_id");
		$image_id = User::find($user_id)->avatar_id;
		if ($image_id) {
			$dir = app()->environment();
			$image = Image::find($image_id);
			return Response::json(['status'=>'success','dat'=> ['dir'=>$dir, 'image' => $image]]);
		} else {
			return Response::json(['status'=>'null']);
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */

	/**
	 * Remove the specified resource from storage.
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		return Redirect::to('/');
	}
	
	
	public static function validate($data)
	{
		return Validator::make($data, [
			'email' => 'required|email|max:255|unique:users'
		]);
	}

}