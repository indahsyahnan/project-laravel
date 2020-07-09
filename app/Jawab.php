<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawab extends Model
{
	protected $table ='jawab';
    public function tanya(){
    	return $this->belongsTo('App\Tanya');
    }
}
