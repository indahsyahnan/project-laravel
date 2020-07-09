<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class JawabModel {
	public static function get_all($pertanyaan_id){
		$jawab = DB::table('jawab')
			->join('tanya','tanya.id','=','jawab.pertanyaan_id')
			->where('tanya.id','=',$pertanyaan_id)
			->select('jawab.*')
			->get();
		$tanya = DB::table('tanya')
			->where('id','=',$pertanyaan_id)
			->get();
		return view('items.jawabindex',['jawab'=>$jawab->all(),'tanya'=>$tanya->all()]);
	}
	public static function store($request){
		DB::table('jawab')->insert($request);
		return JawabModel::get_all($request['pertanyaan_id']);
	}
	
}