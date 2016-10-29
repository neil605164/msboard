<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class information extends Model
{
    public function user()
    {
    	return $this->belongsTo('App/User');
    }
}
