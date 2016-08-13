<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controler;
use App\Http\Requests;
use App\Submap;

class AplicationController extends Controller
{
    
	// Show initial page
	public function index() {
		return view('welcome', [
			'submaps' => Submap::orderBy('name', 'asc')->get()	
		]);	
	}
}
