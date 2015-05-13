<?php

class ExampleTest extends TestCase {

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
	
    public function test_login()
    {
    $credentials = array(
        'email'=>'sa1234@gmail.com',
        'password'=>'sa12345'
	);
	$response = $this->action('POST', 'UserController@login', $credentials); 
	
	$this->assertRedirectedTo('/post');
	$this->assertEquals("sa1234", Auth::user()['username']);
	
    }
	public function test_post()
	{
		//get login
		$this->test_login(); 
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
													'username' => "test1234",
													'password' => "123456",
													'email'	   => "sa1234@gmail.com"
													]); 
		$this->assertEquals("test1234", Request::get('username'));
		$this->assertRedirectedTo('/register');
	}

	public function test_upload() {
		$this->test_login(); 
		$fileupload= 
			new Symfony\Component\HttpFoundation\File\UploadedFile(public_path().'/uploads/download.jpg', 'download.jpg');
		$response = $this->call('POST', '/upload/create',[],['photo' => $fileupload]);
		$this->assertRedirectedTo('/upload');
		$this->assertEquals("download.jpg", $fileupload->getClientOriginalName());
	}
	
	
}
