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
use App\Host;
use App\SwitchModel;
use App\Port;
use App\Oid;
use App\Link;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {

	// Show initial page
	Route::get('/', 'AplicationController@index');

	// Route::resource('submap', 'SubmapController', ['except' => ['create', 'show']]);

	/*
	 * SUBMAP
	 */

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

	/*
	 * HOST
	 */
	 
	// Show Host Dashboard
	Route::get('/host', 'HostController@index');
	
	// Add new Host
	Route::post('/host', 'HostController@store');

	// Edit Host
	Route::get('/host/{id}/edit', 'HostController@edit');

	// Update Host
	Route::put('/host/{id}', 'HostController@update');

	// Delete Host
	Route::delete('/host/{id}', 'HostController@destroy');

	/*
	 * SWITCH MODEL
	 */
	 
	// Show switchmodel Dashboard
	Route::get('/switchmodel', 'SwitchModelController@index');
	
	// Add new switchmodel
	Route::post('/switchmodel', 'SwitchModelController@store');

	// Edit switchmodel
	Route::get('/switchmodel/{id}/edit', 'SwitchModelController@edit');

	// Update switchmodel
	Route::put('/switchmodel/{id}', 'SwitchModelController@update');

	// Delete switchmodel
	Route::delete('/switchmodel/{id}', 'SwitchModelController@destroy');

	/*
	 * LINK 
	 */
	 
	// Show link Dashboard
	Route::get('/link', 'LinkController@index');
	
	// Add new link
	Route::post('/link', 'LinkController@store');

	// Edit link
	Route::get('/link/{id}/edit', 'LinkController@edit');

	// Update link
	Route::put('/link/{id}', 'LinkController@update');

	// Delete link
	Route::delete('/link/{id}', 'LinkController@destroy');

});
