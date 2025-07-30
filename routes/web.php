<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PlaylistController;

Route::get('/', [HomeController::class, 'index'])->name('site.home');
Route::get('/videos', [VideoController::class, 'index'])->name('site.videos');

Route::post('/videos/like', [VideoController::class, 'like'])->name('videos.like');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->prefix("")->group(function () {});
