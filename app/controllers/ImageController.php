<?php

class ImageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /image
	 *
	 * @return Response
	 */
	public function index()
	{
		$images = Auth::user()->image()->get();
		return View::make('upload/image')->with(array('images'=>$images));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /image/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$file = Request::file('photo');
		if ($file) {
		$extension = $file->getClientOriginalExtension();
		$filename = $file->getClientOriginalName();
		//Store file
		$file->move(public_path().'/uploads/'.app()->environment().'/'.Auth::id(), $filename);
		//Insert into DB
		Image::create([
			'user_id' => Auth::user()['id'],
			'filename' => $file->getFilename().'.'.$extension,
			'mime' => $file->getClientMimeType(),
			'origilnal_filename' => $file->getClientOriginalName(),
		]);
		return Redirect::to('upload')->with('msg', Lang::get('messages.upload.sucess'));
		} else {
			return Redirect::to('upload')->with('msg', Lang::get('messages.upload.error'));
		}
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /image
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}
	
	public function delete()
	{
		return Response::json(array('status'=>'deleted'));
	}
	
	public function avatar()
	{
		$id = Request::get('image');	
		User::where('id','=',Auth::id())->update(array('avatar_id' => $id));
		return Response::json(array('status'=>'success'));
	}
	
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /image/{id}/edit
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
	 * PUT /image/{id}
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
	 * DELETE /image/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}