<?php
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model {

	protected $table = 'inboxs';
	protected $fillable = ['unread', 'send_id', 'context'];
	
	public function user()
	    {
	        return $this->belongsTo('User');
	    }
}