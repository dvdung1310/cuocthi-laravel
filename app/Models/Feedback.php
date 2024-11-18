<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    protected $fillable = [
        'feedback_type', // Loại phản ánh
        'content',       // Nội dung phản ánh
        'full_name',     // Họ và tên
        'phone_number',  // Số điện thoại
        'address',       // Địa chỉ
    ];
}
