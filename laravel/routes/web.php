<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrainingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CalendarController;
use Illuminate\Http\Request;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


 Route::get('/Mymenu',[App\Http\Controllers\PostController::class,'Mymenu'])->name('trainings.Mymenu');
 Route::POST('/store',[App\Http\Controllers\PostController::class,'store'])->name('part_store');
 Route::get('/create_post',[App\Http\Controllers\PostController::class,'create'])->name('part_create');
 Route::get('/edit/{id}' ,[App\Http\Controllers\PostController::class, 'edit'])->name('part_edit');
 Route::PUT('/edit/{id}' ,[App\Http\Controllers\PostController::class, 'update'])->name('part_update');
 Route::delete('/edit/{id}' ,[App\Http\Controllers\PostController::class, 'destroy'])->name('part_destroy');


Route::resource('trainings', App\Http\Controllers\TrainingController::class);
Route::get('/index', [App\Http\Controllers\TrainingController::class,'index']);
Route::get('/Json', [App\Http\Controllers\TrainingController::class, 'Json'])
->name('Json');
Route::get('/Json{id}', [App\Http\Controllers\TrainingController::class, 'Json'])->name('Json');
Route::post('/create', [App\Http\Controllers\TrainingController::class, 'store'])->name('store');
Route::get('/create', [App\Http\Controllers\TrainingController::class, 'create'])->name('create');
Route::get('/events/{id}' ,[App\Http\Controllers\TrainingController::class, 'show'])->name('events.show');
Route::DELETE('/events/{id}' ,[App\Http\Controllers\TrainingController::class, 'destroy'])->name('trainings.delete');

Route::post('/event',[App\Http\Controllers\CalendarController::class, 'store'])->name('calendar.store')
->middleware(['no-redirect']);

Route::post('/event',[App\Http\Controllers\CalendarController::class, 'store'])->name('calendar.store')
->withoutMiddleware(['web','throttle','csrf']);
// Route::post('/event',[App\Http\Controllers\CalendarController::class, 'store'])->name('calendar.store')
// ->Middleware(['web','throttle','csrf']);

Route::get('/calendar',[App\Http\Controllers\CalendarController::class, 'index'])->name('calendar.index');
Route::get('/calendar/{id}' ,[App\Http\Controllers\CalendarController::class, 'destroy'])->name('calendar.delete');


