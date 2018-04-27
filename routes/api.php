<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/cars','Api\CarController');
Route::apiResource('/drivers','Api\DriverController');
Route::apiResource('/maps','Api\MapController');
Route::apiResource('/orders','Api\OrderContoller');