<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function index()
    {
    	// mengambil semua data pengguna
    	$profile = Profile::all();
    	// return data ke view
    	return view('profile', ['profile' => $profile]);
    }
}
