<?php

class OauthController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /oauth
	 *
	 * @return Response
	 */
	public function index()
	{
	}
	
	public function twitter()
	{
		//get token, verify
		$token = Request::get('oauth_token');
		$verify = Request::get('oauth_verifier');
		
		if (!empty($token) && !empty($verify)) {
			$tw = OAuth::consumer( 'Twitter');
			$tw->requestAccessToken($token, $verify);
			$tweets = json_decode( $tw->request( 'statuses/user_timeline.json' ), true );
			Session::put('tweets', $tweets);
			Session::forget('feeds');
			return Redirect::to('oauth/status');
		} else {
			$tw = OAuth::consumer( 'Twitter', 'http://localhost:8000/oauth/twitter' );
			$reqToken = $tw->requestRequestToken();
			$url = $tw->getAuthorizationUri(array('oauth_token' => $reqToken->getRequestToken()));
			return Redirect::to( (string)$url );
		}
	}
	
	public function facebook()
	{
		//get token
		$code = Request::get('code');
		if (!empty($code)) {
			$fb = OAuth::consumer('Facebook');
			$fb->requestAccessToken($code);
			$feeds = json_decode( $fb->request( '/me?fields=statuses.limit(5),picture' ), true );
			Session::put('feeds', $feeds);
			Session::forget('tweets');
			return Redirect::to('oauth/status');
		} else {
			$fb = OAuth::consumer('Facebook', 'http://localhost:8000/oauth/facebook');
			$url = $fb->getAuthorizationUri();
			return Redirect::to( (string)$url );
		}
	}
	
	public function status()
	{
		$tweets = Session::get('tweets');
		$feeds = Session::get('feeds');
		$fb_picture = $feeds['picture']['data'];
		return View::make('oauth/status')->with(array(
			'tweets'=> $tweets,
		 	'feeds'=> $feeds,
		  	'fb_picture'=> $fb_picture
		));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /oauth
	 *
	 * @return Response
	 */

	/**
	 * Display the specified resource.
	 * GET /oauth/{id}
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
	 * GET /oauth/{id}/edit
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
	 * PUT /oauth/{id}
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
	 * DELETE /oauth/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}