<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class KomentartanyaModel {
	public static function get_all($pertanyaan_id){
		$komentartanya = DB::table('komentartanya')
			->join('tanya','tanya.id','=','komentartanya.pertanyaan_id')
			->where('tanya.id','=',$pertanyaan_id)
			->select('komentartanya.*')
			->get();
		$tanya = DB::table('tanya')
			->where('id','=',$pertanyaan_id)
			->get();
		return view('items.komentartanya',['komentartanya'=>$komentartanya->all(),'tanya'=>$tanya->all()]);
	}
	public static function store($request){
		DB::table('komentartanya')->insert($request);
		return KomentartanyaModel::get_all($request['pertanyaan_id']);
	}
	
}