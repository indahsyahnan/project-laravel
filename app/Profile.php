<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table ='profile';
    public function pengguna(){
    	return $this->hasOne('App\Pengguna');
    }
}
