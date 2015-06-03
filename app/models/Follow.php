<?php
use Illuminate\Database\Eloquent\Model;

class Follow extends Model {

	protected $table = 'follows';
	protected $fillable = ['user_id', 'following_id'];
	
	public function user()
	    {
	        return $this->belongsTo('User');
	    }
}