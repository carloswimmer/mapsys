<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SwitchModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewSwitchModelController extends Controller
{
    // Show NewSwitchModel Dashboard
	public function index() {
		return view('newswitchmodel.index', [
			'switchModels' => SwitchModel::orderBy('created_at', 'asc')->get()
		]);
	}

	// Add NewSwitchModel
	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required|max:255',
		]);

		$switchModel = new SwitchModel;
		$switchModel->name = $request->name;
		$switchModel->save();

		return redirect('/newswitchmodel');
	}

	// Delete NewSwitchModel
	public function destroy(SwitchModel $id) {
		$id->delete();

		return redirect('/newswitchmodel');
	}

	// Show NewSwitchModel Edit Form
	public function edit(SwitchModel $id) {

		return view('newswitchmodel.edit', ['switchModel' => $id]);	
	}

	// Update NewSwitchModel
	public function update(Request $request) {
		$switchModel = SwitchModel::find($request->id);
		$switchModel->name = $request->name;
		$switchModel->save();

		return redirect('/newswitchmodel');	
	}
}
