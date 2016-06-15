<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Switchmodel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SwitchmodelController extends Controller
{
    // Show Switchmodel Dashboard
    public function index() {
        return view('switchmodel.index', [
            'switchmodels' => Switchmodel::orderBy('created_at', 'asc')->get()
        ]);
    }
//
//    // Add new Switchmodel
//    public function store(Request $request) {
//        $this->validate($request, [
//            'name' => 'required|max:255',
//        ]);
//
//        $switchmodel = new Switchmodel;
//        $switchmodel->name = $request->name;
//        $switchmodel->save();
//
//        return redirect('/switchmodel');
//    }
//
//    // Delete Switchmodel
//    public function destroy(Switchmodel $id) {
//        $id->delete();
//
//        return redirect('/switchmodel');
//    }
//
//    // Show Switchmodel Edit Form
//    public function edit(Switchmodel $id) {
//
//        return view('switchmodel.edit', ['submap' => $id]);
//    }
//
//    // Update Switchmodel
//    public function update(Request $request) {
//        $switchmodel = Switchmodel::find($request->id);
//        $switchmodel->name = $request->name;
//        $switchmodel->save();
//
//        return redirect('/switchmodel');
//    }

}
