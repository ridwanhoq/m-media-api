<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginApiController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix' => 'v1'], function(){

    Route::post('login', LoginApiController::class);

    Route::resource('users', UserController::class);

    Route::resource('categories', CategoryController::class);

    // Route::group(['middlewire' => 'auth:sanctum'], function(){

    // });

});

// Route::middleware('auth:sanctum')->get('v1/user', function (Request $request) {
//     return $request->user();
// });
