@extends('backend.dashboard')
@section('content')
<style>
    .ck-editor__editable {
     resize: both;
     min-width: 100px; /* Thiết lập kích thước tối thiểu */
     min-height: 100px; /* Thiết lập kích thước tối thiểu */
 }
 .container_create_studen{
     background: #fff;
 }
 .container_create_studen form input,.container_create_studen form select{
     height: 50px;
 }
 </style>
    <div class="container_create_studen mt-3 p-4">
        <h2>Cập nhật tin tức</h2>
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" id="alert-message">
            {{ session()->get('success') }}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" id="alert-message">
            {{ session()->get('error') }}
        </div>
    @endif
        <form class="g-3 mt-5" action="{{ route('admin.news.update',$news->news_id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('put')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="full_name" class="form-label">Tên tin tức</label>
                    <input type="text" class="form-control" required name="news_title" id="hl_name"
                        onchange="get_alias(); return;" value="{{$news->news_title}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="full_name" class="form-label">Slug</label>
                    <input type="text" class="form-control" required name="news_slug" id="hl_slug" value="{{$news->news_slug}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="category_id" class="form-label">Danh mục </label>
                    <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
                        @foreach ($category as $item)
                            <option value="{{$item->category_id}}" <?php if($news->category_id == $item->category_id) echo "selected" ?>>{{$item->category_name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <div>
                        <label for="editor_writing" class="form-label">Mô tả</label>
                        <textarea class="form-control" name="news_description" id="editor_writing" rows="3">{{$news->news_description}}</textarea>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div>
                        <label for="editor1" class="form-label">Nội dung</label>
                        <textarea class="form-control" name="news_content" id="editor1" rows="3">{{$news->news_content}}</textarea>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="teacher_avatar" class="form-label">Hình ảnh </label>
                    <input type="file" class="form-control" name="news_avatar" id="teacher_avatar">
                    <img src="{{asset($news->news_avatar)}}" class="mt-3" alt="" width="100px" height="150px">
                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
                <div class="col-md-12 mt-5 d-flex justify-content-start">
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
       ClassicEditor
    .create(document.querySelector('#editor1'), {
        ckfinder: {
            uploadUrl: "{{ route('store_images', ['_token' => csrf_token()]) }}"
        }
    })
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#editor_writing'), {
        ckfinder: {
            uploadUrl: "{{ route('store_images', ['_token' => csrf_token()]) }}"
        }
    })
    .catch(error => {
        console.error(error);
    });
    </script>
@endsection
