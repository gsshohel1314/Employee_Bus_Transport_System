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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

  Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>'auth'],function(){
  Route::get('', 'AdminController@index');

  // start user route
  // Route::get('user/pending', 'UserController@pending');
  Route::resource('user', 'UserController');
  Route::put('user/status/{id}', 'UserController@status');

  Route::get('recycle/user', 'UserRecycleBinController@index');
  Route::get('recycle/user/{id}', 'UserRecycleBinController@restore');
  Route::get('recycle/user/view/{id}', 'UserRecycleBinController@show');
  Route::delete('recycle/user/{id}', 'UserRecycleBinController@delete');
  // end user route

  // start pick up route
  Route::resource('pickUp', 'PickUpController');
  // end pick up route

  // start busRoute route
  Route::resource('route', 'BusRouteController');
  // end busRoute route

  // start request bus route
  Route::get('requestBus/pending', 'RequestBusController@pending');
  Route::resource('requestBus', 'RequestBusController');
  Route::get('requestBus/assign/{id}', 'RequestBusController@assign');
  Route::post('requestBus/assign', 'RequestBusController@assignBus');
  Route::put('requestBus/approve/{id}', 'RequestBusController@approve');
  // end request bus route


Route::resource('adminMessage', 'AdminMessageController');
Route::get('allAdminMessage', 'AdminMessageController@allMessage');
Route::get('adminMessage/send/{id}', 'AdminMessageController@view');


Route::resource('employeeMessage', 'EmployeeMessageController');
// Route::get('employeeMessage/send', 'EmployeeMessageController@view');
// Route::get('employeeMessage/send', 'EmployeeMessageController@shohel');
// Route::get('adminMessage/send/{id}', 'MessageController@view');
// Route::get('employeeMessage', 'MessageController@employeeMessage');
// Route::get('employeeMessage/view/{id}', 'MessageController@viewEmployeeMessage');

});


Route::group(['prefix'=>'website','namespace'=>'website','middleware'=>'auth'],function(){
  Route::get('', 'WebsiteController@index');
});
