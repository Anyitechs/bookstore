<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => ['auth:admin']], function () {
    Route::apiResource('books', 'BookController');
    Route::post('books/{id}/reviews', 'ReviewController@store');
});

Route::group(['middleware' => ['auth:user']], function () {
    Route::post('books/{id}/reviews', 'ReviewController@store');
});



