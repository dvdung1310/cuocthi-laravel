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
        <h2>Thêm mới tin tức</h2>
        <form class="g-3 mt-5" action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="full_name" class="form-label">Tên tin tức</label>
                    <input type="text" class="form-control" required name="news_title" id="hl_name"
                        onchange="get_alias(); return;">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="full_name" class="form-label">Slug</label>
                    <input type="text" class="form-control" required name="news_slug" id="hl_slug">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cate_id" class="form-label">Danh mục </label>
                    <select class="form-select" aria-label="Default select example" name="cate_id" id="cate_id">
                        @foreach ($category as $item)
                            <option value="{{ $item->category_id }}">{{ $item->category_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <div>
                        <label for="editor1" class="form-label">Mô tả</label>
                        <textarea class="form-control" name="news_descripion" id="editor_writing"  rows="3" ></textarea>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div>
                        <label for="editor_writing" class="form-label">Nội dung</label>
                        <textarea class="form-control" name="news_content"  id="editor1" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="teacher_avatar" class="form-label">Hình ảnh </label>
                    <input type="file" class="form-control" required name="news_avatar" id="teacher_avatar">
                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
                <div class="col-md-12 mt-5 d-flex justify-content-start">
                    <button type="submit" class="btn btn-success">Thêm mới</button>
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
