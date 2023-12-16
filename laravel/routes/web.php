<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrainingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\LikeController;
use App\Models\OtherUserWorkout;
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

// PostControllerルート
 Route::get('/Mymenu',[App\Http\Controllers\PostController::class,'Mymenu'])->name('trainings.Mymenu');
 Route::POST('/store',[App\Http\Controllers\PostController::class,'store'])->name('part_store');
 Route::get('/create_post',[App\Http\Controllers\PostController::class,'create'])->name('part_create');
 Route::get('/edit/{id}' ,[App\Http\Controllers\PostController::class, 'edit'])->name('part_edit');
 Route::PUT('/edit/{id}' ,[App\Http\Controllers\PostController::class, 'update'])->name('part_update');
 Route::delete('/edit/{id}' ,[App\Http\Controllers\PostController::class, 'destroy'])->name('part_destroy');


//TrainingControllerルート
Route::resource('trainings', App\Http\Controllers\TrainingController::class);
Route::get('/index', [App\Http\Controllers\TrainingController::class,'index']);

Route::post('/create', [App\Http\Controllers\TrainingController::class, 'store'])->name('store');
Route::get('/my-menu/chest', [App\Http\Controllers\TrainingController::class, 'chest'])->name('chest');
Route::get('/my-menu/back', [App\Http\Controllers\TrainingController::class, 'back'])->name('back');
Route::get('/my-menu/legs', [App\Http\Controllers\TrainingController::class, 'legs'])->name('legs');
Route::get('/my-menu/arms_shoulders', [App\Http\Controllers\TrainingController::class, 'arms_shoulders'])->name('arms_shoulders');
Route::get('/my-menu/other', [App\Http\Controllers\TrainingController::class, 'other'])->name('other');
Route::get('/my-menu/all',[App\Http\Controllers\TrainingController::class, 'allTrainings'])->name('all');



//calendarControllerルート//
Route::post('/event',[App\Http\Controllers\CalendarController::class, 'store'])->name('calendar.store');

Route::get('/calendar',[App\Http\Controllers\CalendarController::class, 'index'])->name('calendar.index');
Route::get('/calendar/{id}' ,[App\Http\Controllers\CalendarController::class, 'destroy'])->name('calendar.delete');

Route::get('workouts',[App\Http\Controllers\TrainingController::class,'showOtherWorkouts'])->name('workouts');

Route::post('/trainings/{trainingId}/like',[App\Http\Controllers\LikeController::class,'toggleLike'])->name('training.like');

