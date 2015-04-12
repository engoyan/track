<?php namespace App;

use Jenssegers\Mongodb\Model as Eloquent;

class Data extends Eloquent {

    
    protected $collection = 'data';

	protected $fillable = array(
		'device_id', 
		'temperature', 
		'level',
	);
    
    protected $hidden = ['updated_at'];

}
