<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Models\CreateEdit;


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
Route::get('video/create', [HomeController::class, 'create'])->name('video.create');
Route::get('/video/{id}/edit', [HomeController::class, 'edit'])->name('video.edit');

Route::post('/video',[VideoController::class, 'insert'])->name('video.insert'); 
Route::put('/video',[VideoController::class, 'update'])->name('video.update'); 

Route::get('/categories', [CategoryController::class, 'index'])->name('categorias'); 