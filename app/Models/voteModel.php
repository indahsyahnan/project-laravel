<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class VoteModel {
	public static function update($id){
		$jawabanSekarang = DB::table('jawab')->where('id',$id)->first();
		//Ganti status semua jawaban yang ada di soal itu menjadi 2
		DB::table('jawab')->where('pertanyaan_id',$jawabanSekarang->pertanyaan_id)->update(['status'=>2]);
		//Ganti status sekarang jadi 1
		DB::table('jawab')->where('id',$id)->update(['status'=>1]);
		//Ambil nilai reputasi user
		$user = DB::table('jawab')
			->join('users','users.id','=','jawab.pengguna_id')
			->where('users.id','=',$jawabanSekarang->pengguna_id)
			->select('users.*')
			->first();
		//$vote = DB::table('user')->where('id',$jawabanSekarang->pengguna_id)->first();
		//Ganti reputasi
		$vote = DB::table('users')->where('id',$jawabanSekarang->pengguna_id)->update(['reputasi'=>$user->reputasi + 10]);
		return $vote;
	}
}