<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsController;
use App\Models\NewsModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $news = NewsModel::join('category_news','news.category_id','=','category_news.category_id')
        ->select('category_news.category_name','news.*')
        ->orderBy('created_at','desc')->where('category_slug','ket-qua')->take(3)->get();
        return view('frontend.home',compact('news'));
    }
    public function news(){
        $news = NewsModel::join('category_news','news.category_id','=','category_news.category_id')
        ->select('category_news.category_name','news.*')
        ->orderBy('created_at','desc')->get();
        return view('frontend.news.index',compact('news'));
    }
    public function news_detail($news_slug, $news_id){
        $news_detail = NewsModel::where('news_id',$news_id)->first();
        $new_news = NewsModel::where('news_id', '!=', $news_id)
        ->orderBy('created_at', 'desc')->take(5)->get();
        $other_new = NewsModel::where('news_id', '!=', $news_id)  
                          ->orderBy('created_at', 'desc')     
                          ->inRandomOrder()                  
                          ->take(4)                        
                          ->get();
        return view('frontend.news.news_detail',compact('news_detail','new_news','other_new'));
    }
}
