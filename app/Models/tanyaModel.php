<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class TanyaModel {
	public static function get_all(){
		$tanya = DB::table('tanya')->get();
		return $tanya;
	}
	public static function save($data){
		$new_tanya = DB::table('tanya')->insert($data);
		return $new_tanya;
	}
	public static function find_by_id($id){
		$tanya = DB::table('tanya')
			->where('id',$id)
			->first();
		return $tanya;
	}
	public static function find_by_id_pertanyaan($id){
		$jawab = DB::table('jawab')
			->join('tanya','tanya.id','=','jawab.pertanyaan_id')
			->where('tanya.id','=',$id)
			->select('jawab.*')
			->get();
		return $jawab;
	}
	public static function update($id, $request){
		$tanya = DB::table('tanya')
				->where('id',$id)
				->update([
					'judul'=>$request["judul"],
					'isi'=>$request["isi"],
					'tag'=>$request["tag"],
				]);
		return $tanya;
	}
	public static function destroy($id){
		$deleted = DB::table('tanya')
				->where('id',$id)
				->delete();
		return $deleted;
	}
}