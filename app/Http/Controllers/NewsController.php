<?php

namespace App\Http\Controllers;

use App\Models\CategoryNewsModel;
use App\Models\NewsModel;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $key = $request->search;
        $news = NewsModel::join('category_news', 'news.category_id', '=', 'category_news.category_id')
            ->select('news.*', 'category_news.category_name')
            ->orderBy('news_id', 'desc')
            ->where('news_title', 'like', '%' . $key . '%')->paginate(20)->appends(['search' => $key]);
        return view('backend.news.index', compact('news'));
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $category = CategoryNewsModel::where('category_status', 1)->get();
        return view('backend.news.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = new NewsModel();
            $data['category_id'] = $request->cate_id;
            $data['news_title'] = $request->news_title;
            $data['news_slug'] = $request->news_slug;
            $data['news_description'] = $request->news_descripion;
            $data['news_content'] = $request->news_content;
            $data['news_avatar'] = request('news_avatar');
            if ($request->hasFile('news_avatar')) {
                $file = $request->file('news_avatar');
                //dặt tên cho file img1
                $filename = time() . '_' . $file->getClientOriginalName();
                //định nghĩa dẫn ssex upload lên
                $path_upload = 'uploads/news/';
                $request->file('news_avatar')->move($path_upload, $filename);
                $data->news_avatar = $path_upload . $filename;
            }
            $data['news_status'] = 1;
            $data->save();
            return redirect()->route('admin.news')->with('success', 'Thêm mới thành công!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Thêm mới không thành công!');
        }
    }
    public function active_news($news_id)
    {
        try {
            NewsModel::where('news_id', $news_id)->update(['news_status' => 1]);
            return back()->with('success', 'Cập nhật trạng thái thành công');
        } catch (\Throwable $th) {
            return back()->with('error', 'Cập nhật trạng thái không thành công');
        }
    }
    public function unactive_news($news_id)
    {
        try {
            NewsModel::where('news_id', $news_id)->update(['news_status' => 0]);
            return back()->with('success', 'Cập nhật trạng thái thành công');
        } catch (\Throwable $th) {
            return back()->with('error', 'Cập nhật trạng thái không thành công');
        }
    }
    public function delete_news($news_id){
        try {
            NewsModel::where('news_id',$news_id)->delete();
            return back()->with('success', 'Cập nhật trạng thái thành công');
        } catch (\Throwable $th) {
            return back()->with('error', 'Cập nhật trạng thái không thành công');
        }
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
    public function edit(string $news_id)
    {
        $category = CategoryNewsModel::where('category_status', 1)->get();
        $news = NewsModel::where('news_id',$news_id)->first();
        return view('backend.news.edit', compact('news','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $news_id)
    {
        try {
            $data = NewsModel::findorFail($news_id);
            $data['category_id'] = $request->category_id;
            $data['news_title'] = $request->news_title;
            $data['news_slug'] = $request->news_slug;
            $data['news_description'] = $request->news_description;
            $data['news_content'] = $request->news_content;
            if($request->hasFile('news_avatar')){ //kiểm tra img có đc chọn
                @unlink(public_path($data->img)); //xóa file cũ
                // get new_image
                $file = $request->file('news_avatar');
                $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
                $path_upload = 'uploads/news/';
                 // Thực hiện upload file
                 $request->file('news_avatar')->move($path_upload,$filename);
                 $data->news_avatar = $path_upload.$filename;
        
                 $data->news_avatar = $path_upload.$filename; // gán giá trị ảnh mới cho thuộc tính image của đối tượng
               }
            $data->save();
            return redirect()->route('admin.news')->with('success', 'Thêm mới thành công!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Thêm mới không thành công!'.$th);
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
