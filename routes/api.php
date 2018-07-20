<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Get All Customers
Route::get('customers','CustomerController@index');

//Get a Custtomer
Route::get('customer/{id}','CustomerController@show');

//New Customer
Route::post('customer','CustomerController@store');

//Update Customer
Route::put('customer','CustomerController@store');

//Delete Customer 
Route::delete('customer/{id}','CustomerController@destroy');