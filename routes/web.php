<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Models\CreateEdit;
use App\Http\Controllers\PlaylistController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/video',[VideoController::class,'index'])->name('video.index');
// Route::get('/creat-edit',[VideoController::class, 'form'])->name('video.form');
Route::get('video/create', [VideoController::class, 'create'])->name('video.create');
Route::get('/video/{id}/edit', [VideoController::class, 'edit'])->name('video.edit');

Route::post('/video',[VideoController::class, 'insert'])->name('video.insert'); 
Route::put('/video',[VideoController::class, 'update'])->name('video.update');
Route::delete('/video/{id}', [VideoController::class, 'delete'])->name('video.delete');  

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index'); 
Route::get('categories/create', [CategoryController::class, 'create' ])->name('categories.create'); 
Route::get('categories/{id}/edit', [CategoryController::class, 'edit' ])->name('categories.edit'); 

Route::post('/categories', [CategoryController::class, 'insert'])->name('categories.insert'); 
Route::put('/categories', [CategoryController::class, 'update'])->name('categories.update'); 
Route::delete('/categories/{id}', [CategoryController::class, 'delete'])->name('categories.delete');  

Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index'); 