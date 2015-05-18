<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	protected $fillable = ['username', 'email', 'password'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	public function post()
    {
        return $this->hasMany('Post');
    }
	public function image()
    {
        return $this->hasMany('Image');
    }
	public function chatbox()
    {
        return $this->hasMany('ChatBox');
    }
	public function messenger()
    {
        return $this->hasMany('Messenger');
    }
	public function follow_chat()
	{
		return $this->belongsTo('ChatBox', 'follower_id');
	}
}
