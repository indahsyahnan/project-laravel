<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use App\Tanya;

class KomentartanyaModel {
	public static function get_all($pertanyaan_id){
		$komentartanya = DB::table('komentartanya')
			->join('tanya','tanya.id','=','komentartanya.pertanyaan_id')
			->where('tanya.id','=',$pertanyaan_id)
			->select('komentartanya.*')
			->get();
		$tanya = Tanya::find($pertanyaan_id);
		// return view('tanya.komentartanya',['komentartanya'=>$komentartanya->all(),'tanya'=>$tanya]);
		return redirect()->back();
	}
	public static function store($request){
		DB::table('komentartanya')->insert($request);
		return KomentartanyaModel::get_all($request['pertanyaan_id']);
	}
	
	public static function find_by_id($id){
		$komentartanya = DB::table('komentartanya')
			->join('tanya','tanya.id','=','komentartanya.pertanyaan_id')
			->where('tanya.id','=',$id)
			->select('komentartanya.*')
			->get();
		return $komentartanya;
	}
}