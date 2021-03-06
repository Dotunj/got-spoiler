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

$api->version('v1', ['middleware'=> 'cors', 'auth.apikey'], function($api){
	 $api->get('/numbers', 'App\Http\Controllers\NumberController@index');
	 $api->get('/', 'App\Http\Controllers\NumberController@test');
	 $api->post('number', 'App\Http\Controllers\NumberController@store');
});
