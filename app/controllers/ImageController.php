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
		return View::make('upload/image');
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
		$extension = $file->getClientOriginalExtension();
		$filename = $file->getClientOriginalName();
		Log::info($file);
		//Store file
		$file->move('public/uploads/', $filename);
		//Insert into DB
		Image::create([
			'user_id' => Auth::user()['id'],
			'filename' => $file->getFilename().'.'.$extension,
			'mime' => $file->getClientMimeType(),
			'origilnal_filename' => $file->getClientOriginalName(),
		]);
		Log::info($filename);
		return Redirect::to('upload')->with('msg', Lang::get('messages.upload.sucess'));
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

	/**
	 * Display the specified resource.
	 * GET /image/{id}
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