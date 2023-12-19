<?php
use App\Http\Controllers\Cardomat\CardomatController;
use App\Http\Controllers\Cardomat\CardomatThemeController;
use App\Http\Controllers\Cardomat\CardomatSolutionsController;
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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cardomat/solutions/all', [CardomatSolutionsController::class, 'index']);
Route::post('/cardomat/solutions/create', [CardomatSolutionsController::class, 'create']);
Route::post('/cardomat/solutions/edit', [CardomatSolutionsController::class,'edit']);
Route::get('/cardomat/themes/find', [CardomatThemeController::class, 'find']);
Route::delete('/cardomat/solutions/delete/{id}', [CardomatSolutionsController::class, 'delete']);

Route::get('/cardomat/theme/all', [CardomatThemeController::class, 'index']);
Route::post('/cardomat/theme/create', [CardomatThemeController::class, 'create']);
Route::post('/cardomat/theme/edit', [CardomatThemeController::class,'edit']);
Route::delete('/cardomat/theme/delete/{id}', [CardomatThemeController::class, 'delete']);

Route::get('/cardomat/all', [CardomatController::class, 'index']);
Route::post('/cardomat/create', [CardomatController::class, 'create']);
Route::post('/cardomat/edit', [CardomatController::class,'edit']);
Route::delete('/cardomat/delete/{id}', [CardomatController::class, 'delete']);
Route::get('/cardomat/deleted', [CardomatController::class, 'getDeletedCards']);
Route::post('/cardomat/restore/{id}', [CardomatController::class, 'restore']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/all', [PostamatsController::class, 'index']);
Route::post('/create', [PostamatsController::class, 'create']);
Route::post('/edit', [PostamatsController::class,'edit']);
Route::post('/delete', [PostamatsController::class,'delete']);


Route::group(['namespace' => 'App\Http\Controllers\Posterminal'], function() {
    Route::post('posterminal/lol',            'PosterminalController@show');
    Route::post('posterminal/create',          'PosterminalController@create');
    Route::post('posterminal/update',          'PosterminalController@update');
    Route::post('posterminal/delete',          'PosterminalController@delete');

    Route::post('posterminal/restore',         'PosterminalController@restore');
    Route::post('posterminal/deleted/show',  'PosterminalController@deletedShow');

    Route::post('posterminal/theme/show',      'ThemeController@show');
    Route::post('posterminal/theme/create',    'ThemeController@create');
    Route::post('posterminal/theme/update',    'ThemeController@update');
    Route::post('posterminal/theme/delete',    'ThemeController@delete');

    Route::post('posterminal/solution/show',   'SolutionController@show');
    Route::post('posterminal/solution/create', 'SolutionController@create');
    Route::post('posterminal/solution/update', 'SolutionController@update');
    Route::post('posterminal/solution/delete', 'SolutionController@delete');
});
