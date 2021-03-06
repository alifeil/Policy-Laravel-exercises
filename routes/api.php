<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\LoginController;
use App\Http\Controllers\API\v1\PostController;


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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group(['prefix' => 'v1'],function () {
    Route::post(
        '/register',
        [LoginController::class, 'register']

    );
    Route::post(
        '/login',
        [LoginController::class, 'login']

    );

    Route::group(['middleware' => 'auth:api'], function(){
        Route::post(
            'logout',
            [LoginController::class, 'logout']
        );

        Route::post('post',
         [PostController::class, 'create']
        );

        Route::delete(
            'post/{post}',
            [PostController::class, 'delete']
        );

        Route::put(
            'post/{post}',
            [PostController::class,'update']
        );
    });
});


