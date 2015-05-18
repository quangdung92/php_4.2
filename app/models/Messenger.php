<?php
use Illuminate\Database\Eloquent\Model;

class Messenger extends Model {

	protected $table = 'messengers';
	protected $fillable = ['content', 'user_id', 'box_id'];
	
	public function user()
	    {
	        return $this->belongsTo('User');
	    }
	public function chat_box()
	    {
	        return $this->belongsTo('ChatBox');
	    }	
}