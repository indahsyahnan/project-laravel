<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
		$vote = DB::table('users')->where('id',$jawabanSekarang->pengguna_id)->update(['reputasi'=>$user->reputasi + 15]);
		return $vote;
	}

	public static function upjawab($id){
		$jawabanSekarang = DB::table('jawab')->where('id',$id)->first();
		DB::table('jawab')->where('id',$id)->update(['vote'=>$jawabanSekarang->vote +1]);
		//Ganti status sekarang jadi 1
		DB::table('votejawab')->insertOrIgnore(['pengguna_id'=>Auth::user()->id, 'jawaban_id'=>$id,'jenis'=>1]);
		//Ambil data user
		$user = DB::table('jawab')
			->join('users','users.id','=','jawab.pengguna_id')
			->where('users.id','=',$jawabanSekarang->pengguna_id)
			->select('users.*')
			->first();
		//Ganti reputasi
		$vote = DB::table('users')->where('id',$jawabanSekarang->pengguna_id)->update(['reputasi'=>$user->reputasi + 10]);
		return $jawabanSekarang;
	}

	public static function downjawab($id){
		$jawabanSekarang = DB::table('jawab')->where('id',$id)->first();
		DB::table('jawab')->where('id',$id)->update(['vote'=>$jawabanSekarang->vote -1]);
		//Ganti status sekarang jadi 1
		DB::table('votejawab')->insertOrIgnore(['pengguna_id'=>Auth::user()->id, 'jawaban_id'=>$id,'jenis'=>-1]);
		//Ambil data user
		$user = DB::table('jawab')
			->join('users','users.id','=','jawab.pengguna_id')
			->where('users.id','=',$jawabanSekarang->pengguna_id)
			->select('users.*')
			->first();
		//Ganti reputasi
		$vote = DB::table('users')->where('id',$jawabanSekarang->pengguna_id)->update(['reputasi'=>$user->reputasi - 1]);
		return $jawabanSekarang;
	}

	public static function hitungvotejawab($id){
		$jawabanSekarang = DB::table('jawab')->where('id',$id)->first();
		
		$up = DB::table('votejawab')->where(['jawaban_id','=',$id],['jenis','=',1])->count();
		$down = DB::table('votejawab')->where(['jawaban_id','=',$id],['jenis','=',-1])->count();
		return $up-$down;
	}

	public static function uptanya($id){
		$pertanyaanSekarang = DB::table('tanya')->where('id',$id)->first();
		DB::table('tanya')->where('id',$id)->update(['vote'=>$pertanyaanSekarang->vote +1]);
		//Ganti status sekarang jadi 1
		DB::table('votetanya')->insertOrIgnore(['pengguna_id'=>Auth::user()->id, 'pertanyaan_id'=>$id,'jenis'=>1]);
		//Ambil data user
		$user = DB::table('tanya')
			->join('users','users.id','=','tanya.pengguna_id')
			->where('users.id','=',$pertanyaanSekarang->pengguna_id)
			->select('users.*')
			->first();
		//Ganti reputasi
		$vote = DB::table('users')->where('id',$pertanyaanSekarang->pengguna_id)->update(['reputasi'=>$user->reputasi + 10]);
		return $pertanyaanSekarang;
	}

	public static function downtanya($id){
		$pertanyaanSekarang = DB::table('tanya')->where('id',$id)->first();
		DB::table('tanya')->where('id',$id)->update(['vote'=>$pertanyaanSekarang->vote -1]);
		//Ganti status sekarang jadi 1
		DB::table('votetanya')->insertOrIgnore(['pengguna_id'=>Auth::user()->id, 'pertanyaan_id'=>$id,'jenis'=>-1]);
		//Ambil data user
		$user = DB::table('tanya')
			->join('users','users.id','=','tanya.pengguna_id')
			->where('users.id','=',$pertanyaanSekarang->pengguna_id)
			->select('users.*')
			->first();
		//Ganti reputasi
		$vote = DB::table('users')->where('id',$pertanyaanSekarang->pengguna_id)->update(['reputasi'=>$user->reputasi - 1]);
		return $pertanyaanSekarang;
	}
}