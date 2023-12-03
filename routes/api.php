<?php

use App\Http\Controllers\PostamatsController;
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

Route::get('/all', [PostamatsController::class, 'index']);
Route::post('/create', [PostamatsController::class, 'create']);
Route::post('/edit', [PostamatsController::class,'edit']);
Route::post('/delete', [PostamatsController::class,'delete']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers\Posterminal'], function() {
    Route::post('posterminal/showExisting',    'ShowExistingController');
    Route::post('posterminal/showRemote',    'ShowRemoteController');
    Route::post('posterminal/create',  'CreateController');
    Route::post('posterminal/update',  'UpdateController');
    Route::post('posterminal/delete',  'DeleteController');
    Route::post('posterminal/restore', 'RestoreController');
});
