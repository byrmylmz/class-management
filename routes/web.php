<?php

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/classrooms', function () {
        return view('dashboard');
    })->name('classrooms');

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
