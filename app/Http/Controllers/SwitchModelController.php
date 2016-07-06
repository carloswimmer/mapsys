<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SwitchModel;
use App\Port;
use App\Oid;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SwitchModelController extends Controller
{
    // Show SwitchModel Dashboard
    public function index() {
		$data['switchModels'] = SwitchModel::orderBy('name', 'asc')->get();
		$data['ports'] = Port::all();
		$data['oids'] = Oid::all();

        return view('switchmodel.index', $data);
    }

    // Add new SwitchModel
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'port' => 'required|max:255',
            'oid' => 'required|max:255',
        ]);

		$oid = new Oid;
		$oid->number = $request->oid;
        $oid->save();

		$port = new Port;
		$port->name = $request->port;
		$port->oid_id = $oid->id;
        $port->save();

        $switchModel = new SwitchModel;
        $switchModel->name = $request->name;
		$switchModel->port_id = $port->id;
        $switchModel->save();

        return redirect('/switchmodel');
    }

    // Delete SwitchModel
    public function destroy(SwitchModel $id) {
        $id->delete();

        return redirect('/switchmodel');
    }

    // Show SwitchModel Edit Form
    public function edit(SwitchModel $id) {

        return view('switchmodel.edit', ['switchmodel' => $id]);
    }

    // Update SwitchModel
    public function update(Request $request) {
        $switchModel = SwitchModel::find($request->id);
        $switchModel->name = $request->name;
        $switchModel->port = $request->port;
        $switchModel->oid = $request->oid;
        $switchModel->save();

        return redirect('/switchmodel');
    }

}
