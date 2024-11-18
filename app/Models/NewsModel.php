<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    use HasFactory;
    protected $table='news';
    protected $primaryKey = 'news_id';
    protected $fillable=[
        'news_title','news_slug','news_description','news_content','news_avatar','category_id','news_status'
    ];
}
