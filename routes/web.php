<?php

use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\NewsController;
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
    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('admin.dashboard');
    // Exams
    Route::get('/exams', function () {
        return view('backend.exams.index');
    })->name('admin.exams.index');
    //Danh mục tin tức
    Route::get('category-news', [CategoryNewsController::class, 'index'])->name('admin.category-news');
    Route::get('active_category_news/{category_id}', [CategoryNewsController::class, 'active_category_news'])->name('admin.active_category_news');
    Route::get('unactive_category_news/{category_id}', [CategoryNewsController::class, 'unactive_category_news'])->name('admin.unactive_category_news');
    Route::post('store_category_news', [CategoryNewsController::class, 'store'])->name('admin.store_category_news');
    Route::post('update_category_news', [CategoryNewsController::class, 'update'])->name('admin.update_category_news');
    //Tin tức
    Route::get('news', [NewsController::class, 'index'])->name('admin.news');
    Route::get('news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::get('news/edit/{news_id}', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::post('news/store', [NewsController::class, 'store'])->name('admin.news.store');
    Route::put('news/update/{news_id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::get('active_news/{news_id}', [NewsController::class, 'active_news'])->name('admin.active_news');
    Route::get('unactive_news/{news_id}', [NewsController::class, 'unactive_news'])->name('admin.unactive_news');
    Route::get('delete_news/{news_id}', [NewsController::class, 'delete_news'])->name('admin.delete_news');
});

Route::post('/store_images', [NewsController::class, 'storeImages'])->name('store_images');


// frontend
// Route::get('/trangchu', function () {
//     return view('frontend.home');
// });
Route::get('/trangchu', [HomeController::class, 'home']);
Route::get('/tin-tuc', [HomeController::class, 'news']);
Route::get('/tin-tuc/{category_slug}', [HomeController::class, 'category_news'])->name('tin-tuc.category');
Route::get('tin-tuc/{category_slug}/{news_slug}-{news_id}.html', [HomeController::class, 'news_detail'])
    ->where([
        'category_slug' => '.*', 
        'news_slug' => '.*',
        'news_id' => '[0-9]+' 
    ])
    ->name('tin-tuc.chi-tiet');

Route::middleware(['admin'])->group(function () {
    Route::get('/', function () {
        return view('backend.exams.index');
    })->name('admin.dashboard');
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
Route::post('/store_images', [QuestionController::class, 'storeImages'])->name('store_images');




// frontend
Route::get('/', function () {
    return view('frontend.home');
});

Route::get('thi-trac-nhiem', [ExamFrontend::class, 'index'])->name('user.exam');
Route::get('lien-he', [ContactFrontend::class, 'index'])->name('user.contact');
Route::post('gui-lien-he', [ContactFrontend::class, 'store'])->name('user.contact.store');
Route::get('gui-lien-he-thanh-cong', [ContactFrontend::class, 'success'])->name('user.contact.success');
