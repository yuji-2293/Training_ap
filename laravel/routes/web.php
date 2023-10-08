<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;
use Illuminate\Http\Request;

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

 Route::get('/Mymenu',[App\Http\Controllers\TrainingController::class,'Mymenu'])->name('trainings.Mymenu');





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


