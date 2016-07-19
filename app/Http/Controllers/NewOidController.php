<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oid;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewOidController extends Controller
{
    // Show Oid Dashboard
	public function index() {
		return view('newoid.index', [
			'oids' => Oid::orderBy('number', 'asc')->get()
		]);
	}

	// Add new Oid
	public function store(Request $request) {
		$this->validate($request, [
			'number' => 'required|max:255',
		]);

		$oid = new Oid;
		$oid->number = $request->number;
		$oid->save();

		return redirect('/newoid');
	}

	// Delete Oid
	public function destroy(Oid $id) {
		$id->delete();

		return redirect('/newoid');
	}

	// Show Oid Edit Form
	public function edit(Oid $id) {

		return view('newoid.edit', ['oid' => $id]);	
	}

	// Update Oid
	public function update(Request $request) {
		$oid = Oid::find($request->id);
		$oid->number = $request->number;
		$oid->save();

		return redirect('/newoid');	
	}
}
