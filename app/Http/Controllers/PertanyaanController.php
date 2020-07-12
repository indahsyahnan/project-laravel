<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\TanyaModel; // Custom Model
use App\Tanya; // Eloquent Model
use App\Models\Tag;
use App\Models\komentartanyaModel;

class PertanyaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    public function index(){
        $tanya = Tanya::latest()->paginate(5);
        // $tanya = TanyaModel::get_all()->all();
        $vote = DB::table('votetanya')->where('pengguna_id',Auth::user()->id)->get();
    	return view('tanya.index',compact('tanya','vote'));
    }
    public function create(){
    	return view('tanya.form');
    }
    public function store(Request $request){
        $this->validate(request(), [
            "judul" => "required",
            "isi" => "required"
        ]);

        $new_tanya = Tanya::create([
            "judul"=>$request["judul"],
            "isi"=>$request["isi"],
            "pengguna_id"=>$request["pengguna_id"]
        ]);
        $tagArr = explode(',', $request->tags);
        $tagsMulti = [];
        foreach ($tagArr as $stringTag) {
            $tagArrAssc["tag_name"] = $stringTag;
            $tagsMulti[] = $tagArrAssc;
        } 
        //create tags baru
        foreach ($tagsMulti as $tagCheck) {
            $tag = Tag::firstOrCreate($tagCheck);
            $new_tanya->tags()->attach($tag->id);
        }
        return redirect('/pertanyaan')->with('success', 'Pertanyaan Berhasil ditambahkan!');
    }
    public function show($id){
        $tanya = Tanya::find($id);
        $jawab = TanyaModel::find_by_id_pertanyaan($id);
        $komentartanya = komentartanyaModel::find_by_id($id);
        return view('tanya.show', compact('tanya','jawab', 'komentartanya'));
    }
    public function edit($id){
        $tanya = Tanya::find($id);
        return view('tanya.edit', compact('tanya'));
    }
    public function update($id, Request $request){
        $this->validate(request(), [
            "judul" => "required",
            "isi" => "required"
        ]);
        
        $tanya = TanyaModel::update($id, $request->all());
        return redirect('/pertanyaan')->with('success', 'Pertanyaan Berhasil diubah!');
    }
    public function destroy($id){
        $deleted = TanyaModel::destroy($id);
        return redirect('/pertanyaan')->with('success', 'Pertanyaan Berhasil dihapus!'); 
    }
}





