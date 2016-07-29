<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SwitchModel;
use App\Port;
use App\Oid;
use App\PortPlusOid;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SwitchModelController extends Controller
{
    // Show complete SwitchModel Dashboard
    public function index() {
		$data['switchModels'] = SwitchModel::orderBy('name', 'asc')->get();
		$data['ports'] = Port::orderBy('name', 'asc')->get();
		$data['oids'] = Oid::orderBy('number', 'asc')->get();
		$data['portPlusOids'] = PortPlusOid::orderBy('id', 'asc')->get();

        return view('switchmodel.index', $data);
    }

    // Add new complete SwitchModel
    public function store(Request $request) {
        $this->validate($request, [
            'switchModel' => 'required',
            'port' => 'required',
            'oid' => 'required',
        ]);

		$switchModel = SwitchModel::find($request->switchModel);
		$port = Port::find($request->port);
		$oid = Oid::find($request->oid);

		$port->oids()->attach($oid);
		$switchModel->ports()->attach($port);

        return redirect('/switchmodel');
    }

    // Delete SwitchModel pivots
    public function detach(Request $request) {
        $switchModel = SwitchModel::find($request->switchModel);
        $port = Port::find($request->port);
        $oid = Oid::find($request->oid);



		$port->oids()->detach($oid);
		$switchModel->ports()->detach($port);

        return redirect('/switchmodel');
    }

	// Call Oid value to input
	public function callOid($portPlusOidId) {
		$portPlusOids = PortPlusOid::find($portPlusOidId);
		$oid = $portPlusOids->oid;
		
		return response()->json($oid);
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
