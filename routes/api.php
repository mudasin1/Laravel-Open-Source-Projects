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

Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {
    Route::get('/health', function () {
        return response()->json(['status' => 'ok']);
    });

    Route::resource('projects', 'ProjectController', [
        'as' => 'api.v1',
        'except' => ['create', 'edit'],
    ]);
});
