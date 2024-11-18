<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\ExamController;
// backend
Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('backend.login');
    })->name('admin.login');

    Route::middleware(['admin'])->group(function () {
        Route::get('/', function () {
            return view('backend.exams.index');
        })->name('admin.dashboard');

        Route::get('/exams', [ExamController::class, 'index'])->name('admin.exams.index');
        Route::post('/exams', [ExamController::class, 'store'])->name('admin.exams.store');
        Route::put('/admin/exams/{exam}', [ExamController::class, 'update'])->name('admin.exams.update');
        Route::delete('/admin/delete_exams/{exam}', [ExamController::class, 'destroy'])->name('admin.exams.delete');
    });

    // check login
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
});







// frontend
Route::get('/trangchu', function () {
    return view('frontend.home');
});
