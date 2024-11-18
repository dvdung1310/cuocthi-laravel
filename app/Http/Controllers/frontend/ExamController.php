<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    public function index() {
        $exam = Exam::where('status', 1)->latest()->first();
        if ($exam) {
            $questions = $exam->questions;
        } else {
            $exam = null;
            $questions = [];
        }
        return view('frontend.exams.index', compact('exam', 'questions'));
    }
}
