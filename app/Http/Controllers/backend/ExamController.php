<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    public function store(Request $request)
    {
        // Validate dữ liệu nhập vào
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->input('start_date') > $request->input('end_date')) {
            return redirect()->route('admin.exams.index')->with('error', 'Ngày bắt đầu phải bé hơn ngày kết thúc');
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('exams', 'public');
        } else {
            $imagePath = null;
        }
        Exam::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'start_date' => $request->input('start_date'),
            'start_time' => $request->input('start_time'),
            'end_date' => $request->input('end_date'),
            'end_time' => $request->input('end_time'),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.exams.index')->with('success', 'Thêm mới cuộc thi thành công!');
    }

    public function index()
    {
        $exams = Exam::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.exams.index', compact('exams'));
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        if ($request->input('start_date') > $request->input('end_date')) {
            return redirect()->route('admin.exams.index')->with('error', 'Ngày bắt đầu phải bé hơn ngày kết thúc');
        }

        $exam->name = $request->name;
        $exam->start_date = $request->start_date;
        $exam->start_time = $request->start_time;
        $exam->end_date = $request->end_date;
        $exam->end_time = $request->end_time;
        $exam->status = $request->status;

        $imagePath = $exam->image;
            if ($request->hasFile('image')) {
                if ($exam->image) {
                    Storage::disk('public')->delete($exam->image);
                }
                $imagePath = $request->file('image')->store('exams', 'public');
                $exam->image = $imagePath;
            }

        $exam->save();

        return redirect()->route('admin.exams.index')->with('success', 'Đề thi đã được cập nhật!');
    }

    // Function để xóa exam
    public function destroy($id)
    {
        $exam = Exam::findOrFail($id); 
        if ($exam->image) {
            Storage::disk('public')->delete($exam->image);
        }
        $exam->delete();
        return redirect()->route('admin.exams.index')->with('success', 'Xóa cuộc thi thành công');
    }
}
