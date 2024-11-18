<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\ExamController;
use App\Http\Controllers\backend\QuestionController;
use App\Http\Controllers\backend\ContactController;

use App\Http\Controllers\frontend\ExamController as ExamFrontend;
use App\Http\Controllers\frontend\ContactController as ContactFrontend;
// backend
Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('backend.login');
    })->name('admin.login');

    Route::middleware(['admin'])->group(function () {
        Route::get('/', function () { return view('backend.exams.index');})->name('admin.dashboard');
        Route::get('/exams', [ExamController::class, 'index'])->name('admin.exams.index');
        Route::post('/exams', [ExamController::class, 'store'])->name('admin.exams.store');
        Route::put('/admin/exams/{exam}', [ExamController::class, 'update'])->name('admin.exams.update');
        Route::delete('/admin/delete_exams/{exam}', [ExamController::class, 'destroy'])->name('admin.exams.delete');

        // danh sách các câu hỏi

        Route::get('/questions/{exam}', [QuestionController::class, 'index'])->name('admin.questions.index');
        Route::post('/questions', [QuestionController::class, 'store'])->name('admin.questions.store');
        Route::get('/questions_edit/{exam}/{question}', [QuestionController::class, 'edit'])->name('admin.questions.edit');
        Route::put('/admin/questions/{question}', [QuestionController::class, 'update'])->name('admin.questions.update');
        Route::delete('/admin/delete_questions/{exam}', [QuestionController::class, 'destroy'])->name('admin.questions.delete');

        // liên hệ
        Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
    });

    // check login
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
});

Route::post('/store_images',[QuestionController::class,'storeImages'])->name('store_images');




// frontend
Route::get('/', function () {
    return view('frontend.home');
});

Route::get('thi-trac-nhiem', [ExamFrontend::class, 'index'])->name('user.exam');
Route::get('lien-he', [ContactFrontend::class, 'index'])->name('user.contact');
Route::post('gui-lien-he', [ContactFrontend::class, 'store'])->name('user.contact.store');
Route::get('gui-lien-he-thanh-cong', [ContactFrontend::class, 'success'])->name('user.contact.success');