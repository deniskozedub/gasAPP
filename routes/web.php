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

Route::group([
    'middleware'=> 'role:admin',
    'prefix'    =>  'admin'
    ],
    function (){
    //-------------------------admin head page----------------------------//

    Route::get('/','Admin\AdminPanelController@index');

    //-----------------------driver's route------------------------------//

    Route::get('/drivers','Admin\AdminPanelController@drivers');
    Route::get('/driversadd','Admin\AdminPanelController@driversAdd');
    Route::get('/driversedit/{id}','Admin\AdminPanelController@driversEdit');
    Route::get('/driversall','Admin\AdminPanelController@driversAll');
    Route::get('/driversdeletehandler/{id}','Admin\AdminPanelController@driversDeleteHandler');
    Route::post('/driversaddhandler','Admin\AdminPanelController@driversAddHandler');
    Route::post('/driversedithandler','Admin\AdminPanelController@driversEditHandler');

    //------------------------car's route--------------------------------//

    Route::get('/cars','Admin\AdminPanelController@cars');
    Route::get('/carsall','Admin\AdminPanelController@carsAll');
    Route::get('/carsadd','Admin\AdminPanelController@carsAdd');
    Route::post('/carsaddhandler','Admin\AdminPanelController@carsAddHandler');
    Route::get('/carsdeletehandler/{id}','Admin\AdminPanelController@carsDeleteHandler');
    Route::get('/carssedit/{id}','Admin\AdminPanelController@carsEdit');
    Route::post('/carsedithandler','Admin\AdminPanelController@carsEditHandler');

    //------------------------map's route--------------------------------//

    Route::get('/maps','Admin\AdminPanelController@maps');
    Route::get('/mapsall','Admin\AdminPanelController@mapsAll');
    Route::get('/mapsadd','Admin\AdminPanelController@mapsAdd');
    Route::post('/mapsaddhandler','Admin\AdminPanelController@mapsAddHandler');
    Route::get('/mapsdeletehandler/{id}','Admin\AdminPanelController@mapsDeleteHandler');
    Route::get('/mapsedit/{id}','Admin\AdminPanelController@mapsEdit');
    Route::post('/mapsedithandler','Admin\AdminPanelController@mapsEditHandler');


    //------------------------order's route------------------------------//

    Route::get('/orders','Admin\AdminPanelController@orders');
    Route::get('/ordersall','Admin\AdminPanelController@ordersAll');
    Route::get('/ordersadd','Admin\AdminPanelController@ordersAdd');
    Route::post('/ordersaddhandler','Admin\AdminPanelController@ordersAddHandler');
    Route::get('/ordersdeletehandler/{id}','Admin\AdminPanelController@ordersDeleteHandler');


});
