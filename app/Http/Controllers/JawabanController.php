<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JawabModel;
use Illuminate\Foundation\Console\Presents\React;
use DB;

class JawabanController extends Controller
{
    public function index($pertanyaan_id){
    	return JawabModel::get_all($pertanyaan_id);
    }
    
    public function store($pertanyaan_id, Request $request){
	   	$request = $request->all();
	   	unset($request['_token']);
	   	$request['pertanyaan_id']=$pertanyaan_id;
	   	return JawabModel::store($request);
    }
}
