<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginApiController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UnionController;
use App\Http\Controllers\UpazilaController;
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

Route::group(['prefix' => 'v1'], function () {

    Route::post('register_user', [UserController::class, 'store']);

    Route::post('login', LoginApiController::class);

    Route::group(['middleware' => 'auth:sanctum'], function () {

        //set language as english or bengali
        Route::get('set_language/{locale}', [LanguageController::class, 'setLang']);

        //locations
        Route::resource('divisions', DivisionController::class);
        Route::resource('districts', DistrictController::class);
        Route::resource('upazilas', UpazilaController::class);
        Route::resource('unions', UnionController::class);
        Route::resource('areas', AreaController::class);

        //users
        Route::resource('users', UserController::class);

        //categories
        Route::resource('categories', CategoryController::class);

        //tasks
        Route::resource('tasks', TaskController::class);
        

    });
});

// Route::middleware('auth:sanctum')->get('v1/user', function (Request $request) {
//     return $request->user();
// });
