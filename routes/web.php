<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PlaylistController;

Route::prefix("")->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('site.home');
    Route::get('/login', [LoginController::class, 'index'])->name('site.login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('site.login.authenticate');
    Route::get('/logout', [LoginController::class, 'logout'])->name('site.logout');
    Route::get('/video/{id}', [VideoController::class, 'show'])->name('site.video.show');
    Route::get('/playlist/{id}', [PlaylistController::class, 'show'])->name('site.playlist.show');
});
