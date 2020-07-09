<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;
use App\Tanya;

class PenggunaController extends Controller
{
    public function index()
    {
    	$pengguna = Pengguna::get();
    	$tanya = Tanya::get();
    	return view('pengguna', ['pengguna' => $pengguna, 'tanya' => $tanya]);
    }
}
