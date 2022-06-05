<?php

use App\Http\Controllers\ClassroomController;
use Illuminate\Support\Facades\Route;

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

    //Classroom
    // Route::get('/classrooms', function () {
    //     return view('class');
    // })->name('classrooms');

    Route::Get('/classroom',[ClassroomController::class,'index'])->name('classroom');
    Route::Get('/classroom/show/{classroom}',[ClassroomController::class,'show'])->name('classroom.show');
    Route::Get('/classroom/create',[ClassroomController::class,'create'])->name('classroom.create');
    Route::Get('/classroom/edit/{classroom}',[ClassroomController::class,'edit'])->name('classroom.edit');
    Route::Post('/classroom',[ClassroomController::class,'store'])->name('classroom.store');
    Route::Put('/classroom/{classroom}',[ClassroomController::class,'update'])->name('classroom.update');
    Route::Delete('/classroom/{classroom}',[ClassroomController::class,'destroy'])->name('classroom.destroy');

    Route::get('/lessons', function () {
        return view('dashboard');
    })->name('lessons');

    Route::get('/exams', function () {
        return view('dashboard');
    })->name('exams');

    Route::get('/activities', function () {
        return view('dashboard');
    })->name('activities');
    
});
