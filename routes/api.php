<?php

use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\VisitorController;
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

Route::prefix('menu-items')->group(function () {
    Route::get('/', [MenuItemController::class, 'index']);
    Route::post('/', [MenuItemController::class, 'store']);
    Route::get('/{id}', [MenuItemController::class, 'show']);
    Route::post('/{id}/add-item', [MenuItemController::class, 'add']);
    Route::put('/{id}/update-name', [MenuItemController::class, 'update']);
    Route::put('/{id}/delete-item', [MenuItemController::class, 'delete']);
    Route::delete('/{id}', [MenuItemController::class, 'destroy']);
});

Route::prefix('visitors')->group(function () {
    Route::get('/', [VisitorController::class, 'index']);
    Route::post('/', [VisitorController::class, 'store']);
    Route::get('/{id}', [VisitorController::class, 'show']);
    Route::put('/{id}', [VisitorController::class, 'update']);
    Route::delete('/{id}', [VisitorController::class, 'destroy']);
});
