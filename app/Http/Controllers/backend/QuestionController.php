<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index($examId)
    {
        $exam = Exam::findOrFail($examId);
        $questions = Question::orderBy('created_at', 'desc')->where('exam_id', $examId)->with('answers')->paginate(5);
        return view('backend.questions.index', compact('exam', 'questions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'question' => 'required|string',
            'answers' => 'required|array|min:1|max:4',
            'answers.*.name' => 'required|string',
            'correct_answer' => 'required|in:0,1,2,3',
        ]);

        $question = Question::create([
            'exam_id' => $validated['exam_id'],
            'name' => $validated['question'],
            'status' => 1,
        ]);

        foreach ($validated['answers'] as $index => $answer) {
            $question->answers()->create([
                'name' => $answer['name'],
                'result' => $index == $validated['correct_answer'] ? 1 : 0,
            ]);
        }

        

        return redirect()->route('admin.questions.index', ['exam' => $validated['exam_id']])->with('success', 'Thêm mới câu thành công!');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->route('admin.questions.index', ['exam' => $id])->with('success', 'Câu hỏi đã được xóa thành công.');
    }

    public function edit($exam,$question_id){
        $question = Question::with('answers')->findOrFail($question_id);
        return view('backend.questions.update', compact('exam', 'question'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'exam_id' => 'required|exists:exams,id',
            'answers.*.name' => 'required|string|max:255',
            'correct_answer' => 'required|integer|in:0,1,2,3', 
        ]);

        $question = Question::findOrFail($id);

        $question->name = $request->input('question');
        $question->save();

        foreach ($request->answers as $index => $optionData) {
            $answer = Answer::where('question_id', $question->id)
                ->where('id', $question->answers[$index]->id) 
                ->first();
        
            if ($answer) {
                $answer->name = $optionData['name']; 
                $answer->result = ($index == $request->correct_answer) ? 1 : 0;
                $answer->save();
            }
        }

        
        return redirect()->route('admin.questions.index', ['exam' => $request['exam_id']])->with('success', 'Sửa câu hỏi thành công');
    }

    public function storeImages(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $newName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $newName);
            $url = asset('images/' . $newName);
            return response()->json(['filename' => $newName, 'uploaded' => 1, 'url' => $url]);
        }
        return response()->json(['uploaded' => 0, 'error' => ['message' => 'File upload failed.']]);
    }
}
