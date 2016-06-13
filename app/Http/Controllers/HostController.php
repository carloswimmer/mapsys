<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Host;
use App\Submap;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HostController extends Controller
{
    // Show Host Dashboard
	public function index() {
		return view('host.index', [
			'submaps' => Submap::orderBy('name', 'asc')->get()
		], [
			'hosts' => Host::orderBy('created_at', 'desc')->get()
		]);	
	}

	// Add new Host
	public function store(Request $request) {
		//$submap = new Submap;
		//$submap->id = $request->submap_id;

		$host = new Host;
		$host->elementid = $request->elementid;
		$host->name = $request->name;
		$host->submap_id = $request->submap_id;
		//$host->submap = $submap;

		$host->save();

		return redirect('/host');
	}
}
