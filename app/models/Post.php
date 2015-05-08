<?php
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $table = 'posts';
	protected $fillable = ['user_id', 'status'];
	
	public function user()
	    {
	        return $this->belongsTo('User');
	    }
}