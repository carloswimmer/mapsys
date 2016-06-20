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
		$data['hosts'] = Host::orderBy('created_at', 'desc')->get();
		$data['submaps'] = Submap::orderBy('name', 'asc')->get();
		$data['switchmodels'] = Switchmodel::orderBy('name', 'asc')->get();
		
		return view('host.index', $data); 
	}

	// Add new Host
	public function store(Request $request) {
		$host = new Host;
		$host->elementid = $request->elementid;
		$host->name = $request->name;

		$switchmodel = new Switchmodel;
		$switchmodel = Switchmodel::find($request->switchmodel_id);
		$host->switchmodel()->associate($switchmodel);

		$submap = new Submap;
		$submap = Submap::find($request->submap_id);
		$host->submap()->associate($submap);

//		$host = $this->_createHost($request);

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
//		$host = new Host;
//		$host = Host::find($id);
//		$data['hosts'] = $host;

		$data['submaps'] = Submap::orderBy('name', 'asc')->get();
		$data['switchmodels'] = Switchmodel::orderBy('name', 'asc')->get();

            return view('host.edit', ['host' => $id], $data);
        }
	
	// Update Host
	public function update(Request $request) {
		$host = Host::find($request->id);
		$host->elementid = $request->elementid;
		$host->name = $request->name;

		$switchmodel = new Switchmodel;
		$switchmodel = Switchmodel::find($request->switchmodel_id);
		$host->switchmodel()->associate($switchmodel);

		$submap = new Submap;
		$submap = Submap::find($request->submap_id);
		$host->submap()->associate($submap);

		$host->save();

		return redirect('/host');
	}

//	private function _createHost(Request $request) {
//		$host = new Host;
//		$host->elementid = $request->elementid;
//		$host->name = $request->name;
//		$host->switchmodel_id = $request->switchmodel_id;
//		$host->submap_id = $request->submap_id;
//
//		$switchmodel = Switchmodel::find($request->switchmodel_id);
//		$submap = Submap::find($request->submap_id);

		//$host->switchmodel = $switchmodel;
		//$host->submap = $submap;
//		return $host;
//	}
}
