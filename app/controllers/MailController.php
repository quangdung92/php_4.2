<?php

class MailController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /mail
	 *
	 * @return Response
	 */
	public function index() {
		$data = Auth::user();
		Mail::send('mail.sendmail', array('acc' => $data), function($message) {
			$message -> to('mayone.sama92@gmail.com') -> subject('TEST');
		});
		return View::make('mail/sendmail') -> with('acc', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /mail/create
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /mail
	 *
	 * @return Response
	 */
	public function store() {
		//
	}

	/**
	 * Display the specified resource.
	 * GET /mail/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /mail/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /mail/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /mail/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
