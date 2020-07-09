<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class KomentarjawabModel {
	public static function get_all($jawaban_id){
		$komentarjawab = DB::table('komentarjawab')
			->join('jawab','jawab.id','=','komentarjawab.jawaban_id')
			->where('jawab.id','=',$jawaban_id)
			->select('komentarjawab.*')
			->get();
		$jawab = DB::table('jawab')
			->where('id','=',$jawaban_id)
			->get();
		return view('items.komentarjawab',['komentarjawab'=>$komentarjawab->all(),'jawab'=>$jawab->all()]);
	}
	public static function store($request){
		DB::table('komentarjawab')->insert($request);
		return KomentarjawabModel::get_all($request['jawaban_id']);
	}
	
}