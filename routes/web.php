<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\EventController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/powergrid', 'powergrid-demo');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

   Route::Get('/events',[EventController::class,'index'])->name('events');
    
    // Classroom
    Route::Get('/classroom',[ClassroomController::class,'index'])->name('classroom');
    Route::Get('/classroom/show/{classroom}',[ClassroomController::class,'show'])->name('classroom.show');
    Route::Get('/classroom/create',[ClassroomController::class,'create'])->name('classroom.create');
    Route::Get('/classroom/edit/{classroom}',[ClassroomController::class,'edit'])->name('classroom.edit');
    Route::Post('/classroom',[ClassroomController::class,'store'])->name('classroom.store');
    Route::Put('/classroom/{classroom}',[ClassroomController::class,'update'])->name('classroom.update');
    Route::Delete('/classroom/{classroom}',[ClassroomController::class,'destroy'])->name('classroom.destroy');

    // Lesson
    Route::Get('/lesson',[LessonController::class,'index'])->name('lesson');
    Route::Get('/lesson/show/{lesson}',[LessonController::class,'show'])->name('lesson.show');
    Route::Get('/lesson/create',[LessonController::class,'create'])->name('lesson.create');
    Route::Get('/lesson/assign',[LessonController::class,'assign'])->name('lesson.assign');
    Route::Get('/lesson/edit/{lesson}',[LessonController::class,'edit'])->name('lesson.edit');
    Route::Post('/lesson',[LessonController::class,'store'])->name('lesson.store');
    Route::Put('/lesson/{lesson}',[LessonController::class,'update'])->name('lesson.update');
    Route::Delete('/lesson/{lesson}',[LessonController::class,'destroy'])->name('lesson.destroy');

    //calendar source
    Route::Get('/source',[LessonController::class,'source'])->name('source');

    Route::get('/exam', function () {
        return view('dashboard');
    })->name('exam');

    Route::get('/activity', function () {
        return view('dashboard');
    })->name('activity');
    
});
