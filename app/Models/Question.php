<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = ['name', 'status', 'exam_id'];

    // Quan hệ n-1 với Exam
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    // Quan hệ 1-n với Answer
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
