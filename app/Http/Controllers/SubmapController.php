<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submap;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SubmapController extends Controller
{
    // Show Submap Dashboard
	public function index() {
		return view('submap.index', [
			'submaps' => Submap::orderBy('created_at', 'asc')->get()
		]);
	}

	// Add new Submap
	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required|max:255',
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
