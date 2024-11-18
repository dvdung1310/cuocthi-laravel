<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exams';
    protected $fillable = [
        'name',
        'description',
        'image',
        'status',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
    ];

    // Quan hệ 1-n với Question
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // Quan hệ n-n với Employee qua bảng exam_user
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'exam_user')
            ->withPivot('list_question', 'selected_answers', 'point')
            ->withTimestamps();
    }
}
