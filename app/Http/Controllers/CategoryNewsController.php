<?php

namespace App\Http\Controllers;

use App\Models\CategoryNewsModel;
use Illuminate\Http\Request;

class CategoryNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = CategoryNewsModel::orderBy('category_id', 'desc')->get();
        return view('backend.news.category.index', compact('category'));
    }
    public function active_category_news($category_id)
    {
        try {
            CategoryNewsModel::where('category_id', $category_id)->update(['category_status' => 1]);
            return back()->with('success', 'Cập nhật trạng thái thành công');
        } catch (\Throwable $th) {
            return back()->with('error', 'Cập nhật trạng thái không thành công');
        }
    }
    public function unactive_category_news($category_id)
    {
        try {
            CategoryNewsModel::where('category_id', $category_id)->update(['category_status' => 0]);
            return back()->with('success', 'Cập nhật trạng thái thành công');
        } catch (\Throwable $th) {
            return back()->with('error', 'Cập nhật trạng thái không thành công');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        CategoryNewsModel::create([
            'category_name' => $request->category_name,
            'category_slug' => $request->category_slug,
            'category_status' => 1,  // Mặc định là trạng thái hoạt động
        ]);

        return response()->json(['success' => 'Danh mục đã được thêm mới.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $category_id = $request->category_id;
        $category_name = $request->category_name;
        $category_slug = $request->category_slug;
        try {
            $data = CategoryNewsModel::findOrFail($category_id);
            $data->category_name = $category_name;
            $data->category_slug = $category_slug;
            $data->save();
            return response()->json(['success' => 'Cập nhật danh mục thành công.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Cập nhật danh mục không thành công.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
