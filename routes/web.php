<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\MerchandiseController;

Route::get('/', function () {
    return view('mainpage');
});

//Authentication middleware
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

//All music part
Route::get('/music', [MusicController::class, 'index']) ->name('music.index') ;
Route::get('/music/create', [MusicController::class, 'create']);
Route::get('/music/{music}/edit', [MusicController::class, 'edit']);
Route::post('/music', [MusicController::class, 'store']);

//All merchandise part
Route::get('/merchandise', [MerchandiseController::class, 'index']) ->name('merchandise.index');
Route::get('/merchandise/create', [MerchandiseController::class, 'create']);
Route::post('/merchandise', [MerchandiseController::class, 'store']);
Route::get('/merchandise/{merchandise}/edit', [MerchandiseController::class, 'edit']);

//Music Update and Delete
Route::put('/music/{music}', [MusicController::class, 'update']);
Route::delete('/music/{music}', [MusicController::class, 'destroy']);

//Merchandise Update and Delete
Route::put('/merchandise/{merchandise}', [MerchandiseController::class, 'update']);
Route::delete('/merchandise/{merchandise}', [MerchandiseController::class, 'destroy']);

//All other page
    Route::get('/home', function () {
        return view('home');
        });
    
    Route::get('/about', function () {
        return view('about'); 
    });

    Route::get('/contact', function () {
        return view('contact'); 
    });

});
