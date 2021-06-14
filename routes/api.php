<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\UserController;

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

Route::get('/wizard1', [App\Http\Controllers\UserController::class, 'index']);
Route::patch('/wizard/{id}', [App\Http\Controllers\UserController::class, 'update']);
Route::post('/wizard/otherPhoto', [App\Http\Controllers\OtherPhotoController::class, 'store']);
Route::get('/userInfo/{id}', [App\Http\Controllers\UserController::class, 'show']);

Route::post('/second/socialMedia', [App\Http\Controllers\SocialMediaController::class, 'store']);
Route::post('/second/projects', [App\Http\Controllers\ProjectController::class, 'store']);

Route::patch('/project/{id}', [App\Http\Controllers\ProjectController::class, 'update']);



