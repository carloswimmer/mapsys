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
        $port->save();

        $switchModel = new SwitchModel;
        $switchModel->name = $request->name;
        $switchModel->save();

		$port->oids()->attach($oid);
		$switchModel->ports()->attach($port);

        return redirect('/switchmodel');
    }

    // Delete SwitchModel
    public function destroy($id) {
        SwitchModel::find($id)->delete();
        Port::find($id)->delete();
        Oid::find($id)->delete();

        return redirect('/switchmodel');
    }

    // Show SwitchModel Edit Form
    public function edit($id) {
		$data['switchModel'] = SwitchModel::find($id);
		$data['port'] = Port::find($id);
		$data['oid'] = Oid::find($id);

        return view('switchmodel.edit', $data);
    }

    // Update SwitchModel
    public function update(Request $request) {
        $switchModel = SwitchModel::find($request->id);
        $switchModel->name = $request->name;
        $switchModel->save();

		$port = Port::find($request->id);
        $port->name = $request->port;
		$port->save();

        $oid = Oid::find($request->id);
		$oid->number = $request->oid;
		$oid->save();

        return redirect('/switchmodel');
    }

}
