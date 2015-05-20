<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function()
{
	$environment = app()->environment();
	return View::make('index')->with('env','You are on '.$environment);
});
//User login
Route::post('user/login', array('before'=>'csrf', 'uses'=>'UserController@login'));

//profile
Route::get('profile', 'UserController@profile');
Route::post('profile/update', array('before'=>'csrf', 'uses'=>'UserController@update'));

//User create
Route::get('register', 'UserController@index');
Route::post('user/create', array('before'=>'csrf', 'uses'=>'UserController@create'));

//Mails
Route::get('mail', 'MailController@index');
Route::post('mail/send', array('before'=>'csrf', 'uses'=>'MailController@create'));

//Post
Route::get('post','PostController@index');
Route::post('post/create', array('before'=>'csrf', 'uses'=>'PostController@create'));
Route::post('post/update', array('uses'=>'PostController@update'));
//Logout
Route::get('logout', 'UserController@destroy');

//Upload
Route::get('upload', 'ImageController@index');
Route::post('upload/create', array('before'=>'csrf', 'uses'=>'ImageController@create'));

//Oauth
Route::get('oauth/twitter','OauthController@twitter');
Route::get('oauth/facebook','OauthController@facebook');
Route::get('oauth/status', 'OauthController@status');

//Languages
Route::get('/{lang}', 'HomeController@setLang');

//Chatbox
Route::post('invite/user', array('uses'=>'ChatBoxController@create'));
Route::post('send/message', array('uses'=>'ChatBoxController@store_message'));
Route::post('check/room', array('uses'=>'ChatBoxController@set_room'));