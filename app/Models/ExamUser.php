<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ExamUser extends Model
{
    use HasFactory;
    protected $table = 'exam_user';
    protected $fillable = ['list_question', 'selected_answers', 'point', 'exam_id', 'employee_id'];
}
