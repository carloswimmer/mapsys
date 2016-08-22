<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Host;
use App\SwitchModel;
use App\Submap;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HostController extends Controller
{
    // Show Host Dashboard
	public function index() {
		$data['hosts'] = Host::orderBy('elementid', 'desc')->get();
		$data['submaps'] = Submap::orderBy('name', 'asc')->get();
		$data['switchModels'] = SwitchModel::orderBy('name', 'asc')->get();
		
		return view('host.index', $data); 
	}

	// Add new Host
	public function store(Request $request) {
		$this->validate($request, [
			'elementid' => 'required',
			'name' => 'required',
			'switch_model_id' => 'required',
			'submap_id' => 'required',
		]);

		$host = new Host;
		$host->elementid = $request->elementid;
		$host->name = $request->name;

		//$switchModel = new SwitchModel;
		$switchModel = SwitchModel::find($request->switch_model_id);
		$host->switchModel()->associate($switchModel);

		//$submap = new Submap;
		$submap = Submap::find($request->submap_id);
		$host->submap()->associate($submap);

		$host->save();

		return redirect('/host');
	}

    // Delete Host
    public function destroy(Host $id) {
        $id->delete();

        return redirect('/host');
    }

	// Show Host Edit Form
    public function edit($id) {
		$data['host'] = Host::find($id);
		$data['submaps'] = Submap::orderBy('name', 'asc')->get();
		$data['switchModels'] = SwitchModel::orderBy('name', 'asc')->get();

            return view('host.edit', $data);
        }
	
	// Update Host
	public function update(Request $request) {
		$host = Host::find($request->id);
		$host->elementid = $request->elementid;
		$host->name = $request->name;

		//$switchModel = new SwitchModel;
		$switchModel = SwitchModel::find($request->switch_model_id);
		$host->switchModel()->associate($switchModel);

		//$submap = new Submap;
		$submap = Submap::find($request->submap_id);
		$host->submap()->associate($submap);

		$host->save();

		return redirect('/host');
	}
}
