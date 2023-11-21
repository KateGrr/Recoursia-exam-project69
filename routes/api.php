<?php

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

Route::get('/all', function () {
    $postamats = [
        [
        'id' => 1,
        'status' => 1,
        'system_id' => 'PST0001',
        'address' => 'Abay st., 102',
        'serial_number' => 'S123456789',
        'created_at' => '01.01.2023',
        'updated_at' => '02.02.2023'
        ]
    ];

    return response()->json([
        'status' => true,
        'message' => 'Success',
        'postamats' => $postamats
    ], 200);
});
