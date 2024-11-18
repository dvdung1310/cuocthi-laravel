<?php

use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\NewsController;
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
    //Danh mục tin tức
    Route::get('category-news',[CategoryNewsController::class,'index'])->name('admin.category-news'); 
    Route::get('active_category_news/{category_id}',[CategoryNewsController::class,'active_category_news'])->name('admin.active_category_news'); 
    Route::get('unactive_category_news/{category_id}',[CategoryNewsController::class,'unactive_category_news'])->name('admin.unactive_category_news'); 
    Route::post('store_category_news', [CategoryNewsController::class, 'store'])->name('admin.store_category_news');
    Route::post('update_category_news', [CategoryNewsController::class, 'update'])->name('admin.update_category_news');
    //Tin tức
    Route::get('news',[NewsController::class,'index'])->name('admin.news'); 
    Route::get('news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::get('news/edit/{news_id}', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::post('news/store', [NewsController::class, 'store'])->name('admin.news.store');
    Route::put('news/update/{news_id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::get('active_news/{news_id}',[NewsController::class,'active_news'])->name('admin.active_news'); 
    Route::get('unactive_news/{news_id}',[NewsController::class,'unactive_news'])->name('admin.unactive_news'); 
    Route::get('delete_news/{news_id}',[NewsController::class,'delete_news'])->name('admin.delete_news'); 
});

Route::post('/store_images', [NewsController::class, 'storeImages'])->name('store_images');


// frontend
// Route::get('/trangchu', function () {
//     return view('frontend.home');
// });
Route::get('/trangchu',[HomeController::class,'home']);
Route::get('/tin-tuc',[HomeController::class,'news']);
Route::get('tin-tuc/{news_slug}-{news_id}.html', [HomeController::class, 'news_detail'])
    ->where(['news_slug' => '.*', 'news_id' => '[0-9]+'])
    ->name('tin-tuc.chi-tiet');