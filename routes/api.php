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

Route::group(['prefix'=>'v1'],function(){
        Route::post('auth','AuthController@LoginActivity');
        Route::post('register','AuthController@RegisterActivity');
        Route::post('getsaldo','AuthController@GetSaldo');

        Route::post('buy_pulsa','ActivityController@buy_pulsa');
        Route::post('buy_kuota','ActivityController@buy_kuota');
        Route::post('buy_token','ActivityController@buy_token');
        Route::post('permintaan_topup','ActivityController@permintaan');
       

            
    });
    