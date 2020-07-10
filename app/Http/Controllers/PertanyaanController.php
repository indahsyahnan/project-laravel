<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TanyaModel; // Custom Model
use App\Tanya; // Eloquent Model
use App\Models\Tag;

class PertanyaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    public function index(){
        $tanya = Tanya::all();
    	return view('tanya.index',compact('tanya'));
    }
    public function create(){
    	return view('tanya.form');
    }
    public function store(Request $request){
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
        return redirect('/pertanyaan');
    }
    public function show($id){
        $tanya = Tanya::find($id);
        $jawab = TanyaModel::find_by_id_pertanyaan($id);
        return view('tanya.show', compact('tanya','jawab'));
    }
    public function edit($id){
        $tanya = Tanya::find($id);
        return view('tanya.edit', compact('tanya'));
    }
    public function update($id, Request $request){
        $tanya = TanyaModel::update($id, $request->all());
        return redirect('/pertanyaan');
    }
    public function destroy($id){
        $deleted = TanyaModel::destroy($id);
        return redirect('/pertanyaan'); 
    }
}





