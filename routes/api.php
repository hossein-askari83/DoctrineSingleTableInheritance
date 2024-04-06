

<?php

use App\Http\Controllers\API\V1\VerbController;
use App\Http\Controllers\API\V1\WordController;
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
Route::prefix('verb')->group(function () {
    Route::controller(VerbController::class)->group(function () {
        Route::post('/', 'store');
        Route::get('/', 'index');
        Route::put('/{id}', 'update');
        Route::get('/{id}', 'show');
        Route::delete('/{id}', 'delete');
    });
});
Route::prefix('word')->group(function () {
    Route::controller(WordController::class)->group(function () {
        Route::post('/', 'store');
        Route::get('/', 'index');
        Route::put('/{id}', 'update');
        Route::get('/{id}', 'show');
        Route::delete('/{id}', 'delete');
    });
});