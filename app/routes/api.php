<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\SeasoningController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/users', [UserController::class, 'create']);

Route::post('/groups', [GroupController::class, 'create']);

Route::get('/seasonings', [SeasoningController::class, 'index']);

Route::post('/seasonings', [SeasoningController::class, 'create']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
