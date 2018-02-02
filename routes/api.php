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

// get list of items
Route::get('items','ItemControllerApi@index');
// get specific item
Route::get('item/{id}','ItemControllerApi@show');
// delete a item
Route::delete('item/{id}','ItemControllerApi@destroy');
// update existing item
Route::put('item','ItemControllerApi@store');
// create new item
Route::post('item','ItemControllerApi@store');
