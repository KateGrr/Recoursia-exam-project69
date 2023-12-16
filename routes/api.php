<?php
use App\Http\Controllers\CardomatController;
use App\Http\Controllers\Postamat\PostamatsController;
use App\Http\Controllers\Postamat\DefectiveController;
use App\Http\Controllers\posterminalController;
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

Route::get('/cardomat/all', [CardomatController::class, 'index']);
Route::post('/cardomat/create', [CardomatController::class, 'create']);
Route::post('/cardomat/edit', [CardomatController::class,'edit']);
Route::delete('/cardomat/delete/{id}', [CardomatController::class, 'delete']);
Route::delete('/cardomat/delete/{id}', [CardomatController::class, 'delete']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(PostamatsController::class)->group(function() {
    Route::get('/postamat/index', 'index');
    Route::post('/postamat/create', 'create');
    Route::post('/postamat/edit', 'edit');
    Route::post('/postamat/delete', 'delete');
});

Route::controller(DefectiveController::class)->group(function() {
    Route::get('/postamat/defective/index', 'index');
    Route::post('/postamat/defective/create', 'create');
    Route::post('/postamat/defective/edit', 'edit');
    Route::post('/postamat/defective/delete', 'delete');
});

Route::controller(SolutionsController::class)->group(function() {
    Route::get('/postamat/solutions/index', 'index');
    Route::post('/postamat/solutions/create', 'create');
    Route::post('/postamat/solutions/edit', 'edit');
    Route::post('/postamat/solutions/delete', 'delete');
});

Route::group(['namespace' => 'App\Http\Controllers\Posterminal'], function() {
    Route::post('posterminal/showExisting',    'ShowExistingController');
    Route::post('posterminal/showRemote',    'ShowRemoteController');
    Route::post('posterminal/create',  'CreateController');
    Route::post('posterminal/update',  'UpdateController');
    Route::post('posterminal/delete',  'DeleteController');
    Route::post('posterminal/restore', 'RestoreController');
});
