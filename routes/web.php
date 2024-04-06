<?php

use App\Entities\Word;
use App\Http\Controllers\API\V1\AdjectiveController;
use App\Http\Controllers\API\V1\NounController;
use App\Http\Controllers\API\V1\VerbController;
use App\Services\AdjectiveService;
use App\Services\NounService;
use App\Services\VerbService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use LaravelDoctrine\ORM\Facades\EntityManager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert-word', function () {
    return view('InsertWord');
});
Route::get('/insert-translation-view', function () {
    $words = EntityManager::getRepository(Word::class)->findAll();
    return view('InsertTranslation', compact('words'));
});

Route::post('/insert-translation',function(Request $request){
    switch ($request->get('translation_type')) {
        case 'Verb':
            $service = new VerbService();
            $controller = new VerbController($service);
            return $controller->store($request);
            break;
        case 'Noun':
            $service = new NounService();
            $controller = new NounController($service);
            return $controller->store($request);
            break;
        case 'Adjective':
            $service = new AdjectiveService();
            $controller = new AdjectiveController($service);
            return $controller->store($request);
            break;
        
        default:
            # code...
            break;
    }
});

