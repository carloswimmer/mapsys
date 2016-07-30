<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Port;
use App\Oid;
use App\PortPlusOid;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PortPlusOidController extends Controller
{
    // Show Port Plus Oid Dashboard
    public function index() {
		//$data['portPlusOids'] = PortPlusOid::orderBy('id', 'asc')->get();
		$data['portPlusOids'] = \DB::table('port_plus_oids')->join('ports', 'ports.id', '=', 'port_plus_oids.port_id')->join('oids', 'oids.id', '=', 'port_plus_oids.oid_id')->select('port_plus_oids.*', 'ports.name', 'oids.number')->orderBy('name', 'asc')->get();
		$data['ports'] = Port::orderBy('name', 'asc')->get();
		$data['oids'] = Oid::orderBy('number', 'asc')->get();

        return view('portplusoid.index', $data);
    }

    // Add New Port Plus Oid
    public function store(Request $request) {
        $this->validate($request, [
            'port' => 'required',
            'oid' => 'required',
        ]);

		$port = Port::find($request->port);
		$oid = Oid::find($request->oid);
		
		$portPlusOid = new PortPlusOid;
		$portPlusOid->port()->associate($port);
		$portPlusOid->oid()->associate($oid);
		$portPlusOid->save();

        return redirect('/portplusoid');
    }

    // Delete Port Plus Oid pivots
    public function destroy(PortPlusOid $id) {
		$id->delete();

        return redirect('/portplusoid');
    }

    // Show complete SwitchModel Edit Form
    //public function edit($id) {
	//	$data['switchModel'] = SwitchModel::find($id);
	//	$data['port'] = Port::find($id);
	//	$data['oid'] = Oid::find($id);
	//
    //    return view('switchmodel.edit', $data);
    //}

    // Update complete SwitchModel
    //public function update(Request $request) {
    //    $switchModel = SwitchModel::find($request->id);
    //    $switchModel->name = $request->name;
    //    $switchModel->save();

	//	$port = Port::find($request->id);
    //    $port->name = $request->port;
	//	$port->save();

    //    $oid = Oid::find($request->id);
	//	$oid->number = $request->oid;
	//	$oid->save();

    //    return redirect('/switchmodel');
    //}

}
