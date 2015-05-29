<?php

class QueueController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /queue
	 *
	 * @return Response
	 */
	public function post_create()
	{
		Queue::push('PostController@queue_post');
		return Redirect::to('post');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /queue/create
	 *
	 * @return Response
	 */
	public function post_delete()
	{
		$ids = Request::get('post_ids');
		Queue::push('PostController@queue_delete', array('ids' => $ids, 'current_user' => Auth::user()));
		return Response::json(array('status' => 'deleted'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /queue
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /queue/{id}
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
	 * GET /queue/{id}/edit
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
	 * PUT /queue/{id}
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
	 * DELETE /queue/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}