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

Route::group([ 'middleware' => 'api', 'prefix' => '', 'namespace' => 'App\Http\Controllers' ], function ($router) {

    Route::get('/request-update/column', 'EmployeeController@request_update_column')->name('index-request-update-column-api');

    Route::get('/request-update/data', 'EmployeeController@request_update_data')->name('index-request-update-data-api');

    Route::get('/request-update/periode/exist', 'EmployeeController@request_update_periode_exist')->name('index-request-update-periode-exist-api');

    Route::post('/request-update/import', 'EmployeeController@request_update_import')->name('index-request-update-import-api');

    Route::post('/request-update/remove', 'EmployeeController@request_update_remove')->name('index-request-update-remove-api');
});
