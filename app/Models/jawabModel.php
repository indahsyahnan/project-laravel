<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Tanya;

class JawabModel {
	public static function get_all($pertanyaan_id){
		$jawab = DB::table('jawab')
			->join('tanya','tanya.id','=','jawab.pertanyaan_id')
			->where('tanya.id','=',$pertanyaan_id)
			->select('jawab.*')
			->orderBy('vote','desc')
			->get();
		$tanya = Tanya::find($pertanyaan_id);
		$vote = DB::table('votejawab')->where('pengguna_id',Auth::user()->id)->get();

		return view('tanya.jawabindex',['jawab'=>$jawab->all(),'tanya'=>$tanya,'vote'=>$vote]);
	}
	public static function store($request){
		DB::table('jawab')->insert($request);
		return JawabModel::get_all($request['pertanyaan_id']);
	}
}