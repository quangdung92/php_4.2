<?php
use Illuminate\Database\Eloquent\Model;

class ChatBox extends Model {

	protected $table = 'chat_boxs';
	protected $fillable = ['user_id', 'follower_id'];
	
	public function user()
	    {
	        return $this->belongsTo('User');
	    }
	public function follower()
		{
			return $this->hasOne('User', 'id', 'follower_id');
		}
}