<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TanyaModel;
use App\Tanya;

class PertanyaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    public function index(){
    	//$tanya = TanyaModel::get_all();
        $tanya = Tanya::all();
    	return view('items.index',compact('tanya'));
    }
    public function create(){
    	return view('items.form');
    }
    public function store(Request $request){
	   	//$data = $request->all();
	   	//unset($data["_token"]);
	   	//$item = TanyaModel::save($data);
        //Cara Eloquent
        /*
        $item = new Tanya;
        $item->judul = $request["judul"];
        $item->isi = $request["isi"];
        $item->save();
	   	if($item){
	   		return redirect('/pertanyaan');
	   	}*/
        $item = Tanya::create([
            "judul"=>$request["judul"],
            "isi"=>$request["isi"],
            "tag"=>$request["tag"],
        ]);
        if($item){
            return redirect('/pertanyaan');
        }
    }
    public function show($id){
        $tanya = TanyaModel::find_by_id($id);
        $jawab = TanyaModel::find_by_id_pertanyaan($id);
        return view('items.show', compact('tanya','jawab'));
    }
    public function edit($id){
        $tanya = TanyaModel::find_by_id($id);
        return view('items.edit', compact('tanya'));
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





