

<?php

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

Route::get('word/{id}',[WordController::class,'show']);
Route::get('words',[WordController::class,'index']);
Route::post('word',[WordController::class,'store']);
Route::put('word/{id}',[WordController::class,'update']);
Route::delete('word/{id}',[WordController::class,'delete']);
