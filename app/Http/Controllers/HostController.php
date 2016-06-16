<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Host;
use App\Switchmodel;
use App\Submap;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HostController extends Controller
{
    // Show Host Dashboard
	public function index() {
		$hosts = Host::orderBy('created_at', 'desc');
		$submaps = Submap::orderBy('name', 'asc');
		$switchmodels = Switchmodel::orderBy('name', 'asc');

		return view('host.index', compact('hosts', 'submaps', 'switchmodels'));
		//	['submaps' => Submap::orderBy('name', 'asc')->get()],
		//	['switchmodels' => Switchmodel::orderBy('name', 'asc')->get()],
		//	['hosts' => Host::orderBy('created_at', 'desc')->get()]
		//);	
	}

	// Add new Host
	public function store(Request $request) {

		$host = new Host;
		$host->elementid = $request->elementid;
		$host->name = $request->name;
		$host->submap = $request->submap;

		$host->save();

		return redirect('/host');
	}

    // Delete Host
    public function destroy(Host $id) {
        $id->delete();

        return redirect('/host');
    }

	// Show Host Edit Form
        public function edit(Host $id) {

            return view('host.edit', 
				['host' => $id], 
				['submaps' => Submap::orderBy('name')->get()]
			);
        }
	
	// Update Host
	public function update(Request $request) {
		$host = Host::find($request->id);
		$host->elementid = $request->elementid;
		$host->name = $request->name;
		$host->submap = $request->submap;
		$host->save();

		return redirect('/host');
	}
}
