<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Host;
use App\SwitchModel;
use App\PortPlusOid;
use App\Port;
use App\LinkA;
use App\LinkB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    // Show Link Dashboard
	public function index() {
		$data['hosts'] = Host::orderBy('name', 'asc')->get();
		$data['switchModels'] = SwitchModel::orderBy('name', 'asc')->get();
		$data['portPlusOids'] = PortPlusOid::orderBy('id', 'asc')->get();
		$data['ports'] = Port::orderBy('name', 'asc')->get();
		$data['linkAs'] = LinkA::orderBy('created_at', 'desc')->get();
		$data['linkBs'] = LinkB::orderBy('created_at', 'desc')->get();

		return view('link.index', $data);
	}

	// Call PortPlusOids to select
	public function callPortPlusOids($hostId) {
		$host = Host::find($hostId);
		$hostSwitchModel = $host->switchModel->id;
		//$switchModel = SwitchModel::find($hostSwitchModel);
		//$portPlusOids = $switchModel->portPlusOids;
		$portPlusOids = \DB::table('port_plus_oids')
			->join('port_plus_oid_switch_model', 'port_plus_oids.id', '=', 'port_plus_oid_switch_model.port_plus_oid_id')
			->join('ports', 'ports.id', '=', 'port_plus_oids.port_id')
			->select('port_plus_oids.id', 'ports.name')
			->where('switch_model_id', '=', $hostSwitchModel)
			->get();

		return response()->json($portPlusOids);
	} 

	// Add new Link
	public function store(Request $request) {
		$this->validate($request, [
			'hostA' => 'required',
			'portPlusOidA' => 'required',
			'hostB' => 'required',
			'portPlusOidB' => 'required',
		]);

		$submap = new Submap;
		$submap->name = $request->name;
		$submap->save();

		return redirect('/submap');
	}

	// Delete Submap
	public function destroy(Submap $id) {
		$id->delete();

		return redirect('/submap');
	}

	// Show Submap Edit Form
	public function edit(Submap $id) {

		return view('submap.edit', ['submap' => $id]);	
	}

	// Update Submap
	public function update(Request $request) {
		$submap = Submap::find($request->id);
		$submap->name = $request->name;
		$submap->save();

		return redirect('/submap');	
	}
}