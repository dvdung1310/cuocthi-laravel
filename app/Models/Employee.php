<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['name', 'cccd', 'phone', 'city', 'district', 'county', 'address'];

    // Quan hệ n-n với Exam qua bảng exam_user
    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_user')
                    ->withPivot('list_question', 'selected_answers', 'point')
                    ->withTimestamps();
    }
}
