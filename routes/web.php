<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Maintenance;

Route::get('/', function () {
    return view('Landing');
});

Route::get('/tenants', 'Controller@Tenants');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('admin/dashboard', 'AdminController@dashboard')->middleware('auth');

Route::get('/tenant', 'Controller@Tenants')->middleware('auth');

Route::get('admin/bills', 'AdminController@bills')->middleware('auth');

Route::get('admin/add-bill', 'AdminController@addBill')->middleware('auth');

Route::post('admin/add-bill', 'AdminController@updateBill')->middleware('auth');

Route::get('admin/payments', 'AdminController@payments')->middleware('auth');

Route::get('admin/add-payment', 'AdminController@addPayment')->middleware('auth');

Route::post('admin/add-payment', 'AdminController@updatePayment')->middleware('auth');

Route::get('admin/tenants', 'AdminController@tenants')->middleware('auth');

Route::get('admin/tenant-form', 'AdminController@tenantForm')->middleware('auth');

Route::post('admin/add_tenant', 'AdminController@addTenant')->middleware('auth');

Route::get('admin/settings', 'AdminController@settings')->middleware('auth');

Route::post('admin/settings', 'AdminController@updateSettings')->middleware('auth');

Route::get('admin/logout', 'AdminController@logout');

Route::get('/hello', function() {
    return view('layouts/admin');
});

Route::get('test', function() {
    return view('admin/home');
});

Route::get('/form', function() {
    return view('admin/bill-form-test');
});

Route::get('dash-test', function() { return view('admin/dash-test');});


/**** RESTFUL API ROUTES ****/

//Utility URLs
Route::get('/utility', 'restfulapi@getAllUtilities');

Route::get('utility/{id}','restfulapi@getOneUtility');

Route::get('utility/home/{id}','restfulapi@getHomeUtilities');



//Bill URLs
Route::get('/bills', 'restfulapi@getAllBills');

Route::get('bills/{id}', 'restfulapi@getOneBill');

Route::get('bills/utility/{id}', 'restfulapi@getUtilityBill');

//Sandbox URLS

Route::get('sandbox', 'AdminController@TestEnvironment');

Route::get('MaterialDash', function() {
		return(view('MaterialDash'));
	});


//App URLs
Route::get('landing', function() {
    return(view('landing'));
});
Route::get('app/user', 'AppController@user')->middleware('auth');
Route::get('app/bills', 'AppController@bills')->middleware('auth');
Route::get('app/maintenance', 'AppController@maintenance')->middleware('auth');
Route::get('app/logout', 'AppController@logout')->middleware('auth');
Route::get('app/dashboard', 'AppController@dashboard')->middleware('auth');

Route::post('/app/bills', 'AppController@bills')->middleware('auth');
Route::post('app/maintenance','AppController@maintenance')->middleware('auth');
Route::post('app/maintenance/delete','AppController@deleteMaintenance')->middleware('auth');

Route::get('Vue', function() {
    $data['maintenance'] = Maintenance::all();
    return(view('Vue',$data));
});

Route::get('Maintenance', function() {
    $data['maintenance'] = Maintenance::all();
    return($data);
});
