<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\UserController;

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])
->prefix("")->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/video',[VideoController::class,'index'])->name('video.index');
    Route::get('video/create', [VideoController::class, 'create'])->name('video.create');
    Route::get('/video/{id}/edit', [VideoController::class, 'edit'])->name('video.edit');
    
    Route::post('/video',[VideoController::class, 'insert'])->name('video.insert'); 
    Route::put('/video',[VideoController::class, 'update'])->name('video.update');
    Route::delete('/video/{id}', [VideoController::class, 'delete'])->name('video.delete');  
    
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index'); 
    Route::get('/categories/create', [CategoryController::class, 'create' ])->name('categories.create'); 
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit' ])->name('categories.edit'); 
    
    Route::post('/categories', [CategoryController::class, 'insert'])->name('categories.insert'); 
    Route::put('/categories', [CategoryController::class, 'update'])->name('categories.update'); 
    Route::delete('/categories/{id}', [CategoryController::class, 'delete'])->name('categories.delete');  
    
    Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index'); 
    Route::get('/playlists/create', [PlaylistController::class, 'create' ])->name('playlists.create'); 
    Route::get('/playlists/{id}/edit', [PlaylistController::class, 'edit' ])->name('playlists.edit');
    Route::get('/playlists/{id}/show', [PlaylistController::class, 'show'])->name('playlists.show');
    
    Route::post('/playlists', [PlaylistController::class, 'insert'])->name('playlists.insert'); 
    Route::put('/playlists', [PlaylistController::class, 'update'])->name('playlists.update'); 
    Route::delete('/playlists/{id}', [PlaylistController::class, 'delete'])->name('playlists.delete');  

    Route::get('/users', [UserController::class, 'index'])->name('users.index');


});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/', function () {
        return view('');
    })->name(name: 'dashboard');
});
    Route::get('/', [HomeController::class, 'index'])->name('site.home');