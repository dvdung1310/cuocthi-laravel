<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Answer extends Model
{
    use HasFactory;
    protected $table = 'answers';
    protected $fillable = ['name', 'result', 'question_id'];

    // Quan hệ n-1 với Question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
