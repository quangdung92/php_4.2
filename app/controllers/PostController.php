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
		$followings_id = Auth::user()->following()->lists('following_id');
		$title = Lang::get('messages.post.title');
		$all_posts = Post::whereIn('user_id',$followings_id)
						->orWhere('user_id','=',Auth::id())
						->join('users as user', 'user.id', '=', 'user_id')
						->select(array('posts.id','posts.updated_at','posts.status','user.username','user_id'))
						->orderBy('posts.updated_at','desc')
						->paginate(5);
		if (Auth::user()) {
			$posts = User::find(Auth::id())->post()->get();
			return View::make('post')->with(array('title'=>$title, 'posts'=>$posts, 'all_posts' => $all_posts));
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
		$post = Post::where('id','=',$post_id);
		$owner_id = $post->first()->user_id;
		if ($owner_id == Auth::id()) {
			$post->update(array("status" => $up_text));
			return Response::json(array('status' => 'success'));
		}
		
	}
	public function queue_post($job) {
		$rstring = str_random(6);
		Post::create([
				'user_id' => 1,
				'status' => $rstring
			]);
		Log::info($job->attempts());
		if ($job->attempts() > 5)
			{
				$job -> delete();
			} else {
				$job -> release(5);
			}
	}
	
	public function queue_delete($job,$data) {
		if (!empty($data['ids'])) {
		foreach ($data['ids'] as $id) {
			$post = Post::where('id','=',$id);
			$owner_id = $post->first()->user_id;
			if ($owner_id == $data['current_user']['id']) {
				$post -> delete();
			}
			}
		}
		$job -> delete();
	}
	
	public function send_inbox() {
		$context = Request::get('context');
		$address = Request::get('address');
		$send_id = User::where('username','=',$address)->lists("id");
		if ($send_id && $context) {
			$a = User::find(Auth::id());
			$a->send_inbox()->attach($send_id[0], array('context' => $context));
			return Response::json(array('status' => 'sended'));
		}
	}
	public function destroy($id)
	{
		//
	}
}