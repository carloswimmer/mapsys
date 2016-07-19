<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Port;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewPortController extends Controller
{
    // Show Port Dashboard
	public function index() {
		return view('newport.index', [
			'ports' => Port::orderBy('name', 'asc')->get()
		]);
	}

	// Add new Port
	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required|max:255',
		]);

		$port = new Port;
		$port->name = $request->name;
		$port->save();

		return redirect('/newport');
	}

	// Delete Port
	public function destroy(Port $id) {
		$id->delete();

		return redirect('/newport');
	}

	// Show Port Edit Form
	public function edit(Port $id) {

		return view('newport.edit', ['port' => $id]);	
	}

	// Update Port
	public function update(Request $request) {
		$port = Port::find($request->id);
		$port->name = $request->name;
		$port->save();

		return redirect('/newport');	
	}
}
