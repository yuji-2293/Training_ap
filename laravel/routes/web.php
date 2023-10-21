<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;

 Route::get('/Mymenu',[App\Http\Controllers\PostController::class,'Mymenu'])->name('trainings.Mymenu');
 Route::POST('/store',[App\Http\Controllers\PostController::class,'store'])->name('part_store');
 Route::get('/create_post',[App\Http\Controllers\PostController::class,'create'])->name('part_create');

Route::resource('trainings', App\Http\Controllers\TrainingController::class);

Route::get('/', [App\Http\Controllers\TrainingController::class,'index']);
Route::get('/index', [App\Http\Controllers\TrainingController::class,'index']);
Route::get('/Json', [App\Http\Controllers\TrainingController::class, 'Json'])
->name('Json');
Route::get('/Json{id}', [App\Http\Controllers\TrainingController::class, 'Json'])->name('Json');
Route::post('/create', [App\Http\Controllers\TrainingController::class, 'store'])->name('store');
Route::get('/create', [App\Http\Controllers\TrainingController::class, 'create'])->name('trainings.create');
Route::get('/events/{id}' ,[App\Http\Controllers\TrainingController::class, 'show'])->name('events.show');
Route::DELETE('/events/{id}' ,[App\Http\Controllers\TrainingController::class, 'destroy'])->name('trainings.delete');




//  Route::get('/edit',[App\Http\Controllers\PostController::class,'edit'])->name('trainings.Mymenu');






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


