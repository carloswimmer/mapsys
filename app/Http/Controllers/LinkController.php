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

		$linkA = new LinkA;
		$linkA->host_id = $request->hostA;
		$linkA->port_plus_oid_id = $request->portPlusOidA;

		$hostA = Host::find($request->hostA);
		$linkA->host()->associate($hostA);
		$portPlusOidA = PortPlusOid::find($request->portPlusOidA);
		$linkA->portPlusOid()->associate($portPlusOidA);

		$linkA->save();

		$linkB = new LinkB;
		$linkB->host_id = $request->hostB;
		$linkB->port_plus_oid_id = $request->portPlusOidB;

		$hostB = Host::find($request->hostB);
		$linkB->host()->associate($hostB);
		$portPlusOidB = PortPlusOid::find($request->portPlusOidB);
		$linkB->portPlusOid()->associate($portPlusOidB);
		$linkB->linkA()->associate($linkA);

		$linkB->save();

		return redirect('/link');
	}

	// Delete Link
	public function destroy(Request $request) {
		$linkA = LinkA::find($request->id);
		$linkB = LinkB::find($linkA->LinkB->id);
		$linkB->delete();
		$linkA->delete();

		return redirect('/link');
	}

	// Show Link Edit Form
	public function edit($id) {
		$data['linkA'] = LinkA::find($id);
		$data['hosts'] = Host::orderBy('name', 'asc')->get();
		$data['portPlusOids'] = PortPlusOid::orderBy('id', 'asc')->get();
		$data['ports'] = Port::orderBy('name', 'asc')->get();
		$data['linkAs'] = LinkA::orderBy('created_at', 'desc')->get();
		$data['linkBs'] = LinkB::orderBy('created_at', 'desc')->get();


		return view('link.edit', $data);	
	}

	// Update Link
	public function update(Request $request) {
		$linkA = LinkA::find($request->id);
		$linkA->host_id = $request->hostA;
		$linkA->port_plus_oid_id = $request->portPlusOidA;

		$linkA->save();

		$linkB = LinkB::find($linkA->linkB->id);
		$linkB->host_id = $request->hostB;
		$linkB->port_plus_oid_id = $request->portPlusOidB;

		$linkB->save();

		return redirect('/link');
	}
}
