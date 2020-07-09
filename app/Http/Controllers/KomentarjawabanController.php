<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KomentarjawabModel;
use Illuminate\Foundation\Console\Presents\React;
use DB;

class KomentarjawabanController extends Controller
{
    public function index($jawaban_id){
    	return KomentarjawabModel::get_all($jawaban_id);
    }
    
    public function store($jawaban_id, Request $request){
	   	$request = $request->all();
	   	unset($request['_token']);
	   	$request['jawaban_id']=$jawaban_id;
	   	return KomentarjawabModel::store($request);
    }
}
