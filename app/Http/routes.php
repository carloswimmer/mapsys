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
	Route::post('/switchmodel/delete', 'SwitchModelController@detach');

	/*
	 * NEW SWITCH MODEL
	 */

	// Show New Switch Model Dashboard
	Route::get('/newswitchmodel', 'NewSwitchModelController@index');

	// Add new New Switch Model 
	Route::post('/newswitchmodel', 'NewSwitchModelController@store');

	// Edit New Switch Model
	Route::get('/newswitchmodel/{id}/edit', 'NewSwitchModelController@edit');

	// Update New Switch Model
	Route::put('/newswitchmodel/{id}', 'NewSwitchModelController@update');

	// Delete New Switch Model
	Route::delete('/newswitchmodel/{id}', 'NewSwitchModelController@destroy');

	/*
	 * NEW PORT 
	 */

	// Show New Port Dashboard
	Route::get('/newport', 'NewPortController@index');

	// Add new New Port 
	Route::post('/newport', 'NewPortController@store');

	// Edit New Port
	Route::get('/newport/{id}/edit', 'NewPortController@edit');

	// Update New Port
	Route::put('/newport/{id}', 'NewPortController@update');

	// Delete New Port
	Route::delete('/newport/{id}', 'NewPortController@destroy');

	/*
	 * NEW OID
	 */

	// Show New Oid Dashboard
	Route::get('/newoid', 'NewOidController@index');

	// Add new New Oid 
	Route::post('/newoid', 'NewOidController@store');

	// Edit New Oid
	Route::get('/newoid/{id}/edit', 'NewOidController@edit');

	// Update New Oid
	Route::put('/newoid/{id}', 'NewOidController@update');

	// Delete New Oid
	Route::delete('/newoid/{id}', 'NewOidController@destroy');

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
