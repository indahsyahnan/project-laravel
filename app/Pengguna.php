<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table='pengguna';
    protected $guarded = [];
   	public function profile()
   	{
   		return $this->belongsTo('App\Profile');
   	}
   	public function tanya()
    {
    	return $this->belongsToMany('App\Tanya', 'likedislike', 'pengguna_id', 'pertanyaan_id');
    }
}
