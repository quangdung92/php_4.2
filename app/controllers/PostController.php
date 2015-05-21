<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /post
	 *
	 * @return Response
	 */
	public function index()
	{
		$current_user = Auth::user();
		$title = Lang::get('messages.post.title');
		if ($current_user) {
			$posts = User::find($current_user['id'])->post()->get();
			return View::make('post')->with(array('title'=>$title, 'posts'=>$posts));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /post/create
	 *
	 * @return Response
	 */
	public function create()
	{
		Post::create([
			'user_id' => Auth::user()['id'],
			'status' => Request::get('status')
		]);
		return Redirect::to('post');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /post
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /post/{id}/edit
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
	 * PUT /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$post_id = Request::get('post_id');
		$up_text = Request::get('up_text');
		DB::table('posts')
				->where("id","=",$post_id)
				->update(array(
						"status" => $up_text
						));
		return Response::json(array('status' => 'success'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}