<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsController;
use App\Models\CategoryNewsModel;
use App\Models\NewsModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $news = NewsModel::join('category_news', 'news.category_id', '=', 'category_news.category_id')
            ->select('category_news.category_name','category_news.category_slug', 'news.*')
            ->orderBy('created_at', 'desc')->where('category_slug', 'ket-qua')->take(3)->get();
        return view('frontend.home', compact('news'));
    }
    public function news()
    {
        $news = NewsModel::join('category_news', 'news.category_id', '=', 'category_news.category_id')
            ->select('category_news.category_name', 'news.*')
            ->orderBy('created_at', 'desc')->get();
        return view('frontend.news.index', compact('news'));
    }
    public function news_detail($category_slug, $news_slug, $news_id)
    {
        $news_detail = NewsModel::where('news_id', $news_id)->first();
        $new_news = NewsModel::join('category_news', 'news.category_id', '=', 'category_news.category_id')
            ->select('category_news.category_name', 'news.*')
            ->orderBy('created_at', 'desc')
            ->where('news_id', '!=', $news_id)
            ->where('category_slug', $category_slug)->take(5)->get();

        $other_new = NewsModel::join('category_news', 'news.category_id', '=', 'category_news.category_id')
            ->select('category_news.category_name', 'category_news.category_slug', 'news.*')
            ->where('news_id', '!=', $news_id)
            ->orderBy('created_at', 'desc')
            ->inRandomOrder()
            ->take(4)
            ->get();
        return view('frontend.news.news_detail', compact('news_detail', 'new_news', 'other_new', 'category_slug'));
    }
    public function category_news($category_slug)
    {
        // Lấy danh sách tin tức dựa trên category_slug
        $news = NewsModel::join('category_news', 'news.category_id', '=', 'category_news.category_id')
            ->select('category_news.category_name', 'news.*')
            ->orderBy('created_at', 'desc')
            ->where('category_slug', $category_slug)
            ->get();
        // Trả về view với dữ liệu cần thiết
        return view('frontend.news.index', compact('news', 'category_slug'));
    }
}
