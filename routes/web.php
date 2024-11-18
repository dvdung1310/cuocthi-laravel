<?php

use Illuminate\Support\Facades\Route;


// backend
Route::prefix('admin')->group(function () {

    Route::get('/login', function () {
        return view('backend.login');
    })->name('admin.login');

    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('admin.dashboard');

    // Exams
    Route::get('/exams', function () {
        return view('backend.exams.index');
    })->name('admin.exams.index');
});







// frontend
Route::get('/trangchu', function () {
    return view('frontend.home');
});
