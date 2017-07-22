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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function($api){
	 $api->get('/numbers', 'middleware'=>['cors'], 'App\Http\Controllers\NumberController@index');
	 $api->get('/', 'middleware'=>['cors'], 'App\Http\Controllers\NumberController@test');
	 $api->post('number', 'middleware'=>['cors'], 'App\Http\Controllers\NumberController@store');
});
