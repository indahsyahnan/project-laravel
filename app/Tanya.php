<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanya extends Model
{
    protected $table ='tanya';
    protected $guarded = [];
    public function jawab(){
        return $this->hasMany('App\Jawab');
    }

    public function pengguna()
    {
    	return $this->belongsToMany('App\Pengguna');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'tanya_tag', 'tanya_id', 'tag_id');
    }
}
