<?php

class MailController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /mail
	 *
	 * @return Response
	 */
	public function index() {
		return View::make('mail/sendmail');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /mail/create
	 *
	 * @return Response
	 */
	public function create() {
		$data = Auth::user();
		$mail = Request::get('email');
		Mail::send('mail.tem', array('acc' => $data), function($message) use ($mail) {
			$message -> to($mail) -> subject(Lang::get('messages.mailsend.title'));
		});
		return Redirect::to('mail') -> with('msg', Lang::get('messages.mail.sucess') . $mail);
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

	// Queue Test Basic
	//	public function auto($job, $data) {
	//		$user = User::find(1);
	//		$mail = 'mayone.sama92@gmail.com';
	//		Mail::send('mail.tem', array('acc' => $user), function($message) use ($mail, $data) {
	//			$message -> to($mail) -> subject($data['msg']);
	//		});
	//	}

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
