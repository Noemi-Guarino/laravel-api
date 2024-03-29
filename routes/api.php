<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ContactController;


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
Route::name('api.')->group(function() {
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    // Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    // Route::get('/posts', [PostController::class, 'show'])->name('posts.show');

    // OPPURE

    //con il resourse noi chiamavamo le 7 rotte delle crud con la funzionalità only gli passo le uniche due rotte che deve utilizzare
    Route::resource('posts', PostController::class)->only([
        'index',
        'show'
    ]);

    Route::post('/contact', [ContactController::class , 'store'])->name('contacts.store');

});