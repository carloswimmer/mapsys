<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web"middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Submap;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {

	// Show initial page
	Route::get('/', 'AplicationController@index');

	// Route::resource('submap', 'SubmapController', ['except' => ['create', 'show']]);

	// Show Submap Dashboard
	Route::get('/submap', 'SubmapController@index');

	// Add new Submap
	Route::post('/submap', 'SubmapController@store');

	// Edit Submap
	Route::get('/submap/{id}/edit', 'SubmapController@edit');

	// Update Submap
	Route::put('/submap/{id}', 'SubmapController@update');

	// Delete Submap
	Route::delete('/submap/{id}', 'SubmapController@destroy');

});
