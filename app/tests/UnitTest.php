<?php

class UnitTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}
	
	public function user() {
			$user = User::find(1);
			$this->be($user);
	}
	
    public function test_login()
    {
    	$this->user(); 
		$this->assertEquals("sa1234", Auth::user()['username']);
		$this->call('GET', '/post');
    }
	
	public function test_post()
	{
		//get login
		$this->user(); 
		$this->assertEquals("sa1234", Auth::user()['username']);
		//check post
		$response = $this->action('POST', 'PostController@create', ['status' => "This is test"]); 
		$this->assertEquals("This is test", Request::get('status'));
		//check view
		$this->call('GET', '/post');
		$this->assertViewHas('title');
		$this->assertViewHas('posts');
	}
	
	public function test_register() {
		$response = $this->action('POST', 'UserController@create', [
													'name' => "test1234",
													'password' => "123456",
													'email'	   => "test1234@gmail.com"
													]); 
		$this->assertEquals("test1234", Request::get('name'));
		$this->assertRedirectedTo('/register');
	}

	public function test_upload() {
		$this->user(); 
		$fileupload= 
			new Symfony\Component\HttpFoundation\File\UploadedFile(public_path().'/uploads/download.jpg', 'download.jpg');
		$response = $this->call('POST', '/upload/create',[],['photo' => $fileupload]);
		$this->assertRedirectedTo('/upload');
		$this->assertEquals("download.jpg", $fileupload->getClientOriginalName());
	}
	
	public function test_mail() {
		$this->user(); 
		$this->action('POST', 'MailController@create', ['email' => 'mayone.sama92@gmail.com']);
		$this->assertRedirectedTo('/mail');
	}
	
	public function test_lang() {
		$this->client->request('GET', '/post');
		//japanese
			$this->client->request('GET', '/ja');
			$lang = Session::get('lang'); 
			$this->assertEquals("ja", $lang);
		//france
			$this->client->request('GET', '/fr');
			$lang = Session::get('lang'); 
			$this->assertEquals("fr", $lang);	
	}
	
}
