<?php
use Illuminate\Database\Eloquent\Model;

class Image extends Model {

	protected $table = 'images';
	protected $fillable = ['user_id', 'filename', 'origilnal_filename', 'mine'];
	
	public function user()
	    {
	        return $this->belongsTo('User');
	    }
}