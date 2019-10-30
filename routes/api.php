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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'ProductAdminController@login');
    Route::post('signup', 'ProductAdminController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'ProductAdminController@logout');
        Route::post('add_category', 'ProductAdminController@add_category');
        Route::get('list_category', 'ProductAdminController@list_category');
        Route::get('user', 'ProductAdminController@user');
    });
});
