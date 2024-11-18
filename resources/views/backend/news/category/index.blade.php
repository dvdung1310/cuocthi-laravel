@extends('backend.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h3 class="mb-0 ">Danh mục tin tức</h3>
                    {{-- <a href="#!" class="btn btn-primary">Thêm mới danh mục</a> --}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 ">
                <div class="card h-100">
                    <div class="card-header d-md-flex justify-content-end align-items-center">
                      
                        <a href="#!" class="btn btn-primary" id="btn_opent_modal">Thêm mới danh mục</a>
                    </div>
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" id="alert-message">
                            {{ session()->get('success') }}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" id="alert-message">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table mb-0 text-nowrap table-centered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên danh mục </th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->category_name }}</td>
                                            <td>{{ $item->category_slug }}</td>
                                            <td>
                                                @if ($item->category_status == 0)
                                                    <a href="{{ route('admin.active_category_news', $item->category_id) }}"><span
                                                            class="badge bg-secondary">Đóng</span></a>
                                                @elseif($item->category_status == 1)
                                                    <a
                                                        href="{{ route('admin.unactive_category_news', $item->category_id) }}"><span
                                                            class="badge bg-success">Hiển thị</span></a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#!"
                                                    class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip btn_edit"
                                                    data-template="editOne" data-id="{{ $item->category_id }}"
                                                    data-name="{{ $item->category_name }}">
                                                    <i data-feather="edit" class="icon-xs"></i>
                                                    <div id="editOne" class="d-none">
                                                        <span>Edit</span>
                                                    </div>
                                                </a>
                                                {{-- <a href="#!"
                                                    class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                    data-template="trashOne">
                                                    <i data-feather="trash-2" class="icon-xs"></i>
                                                    <div id="trashOne" class="d-none">
                                                        <span>Delete</span>
                                                    </div>
                                                </a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Thêm mới danh mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form thêm danh mục -->
                    <form id="categoryForm">
                        <input type="hidden" name="category_id" id="category_id">
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" name="category_name" id="category_name"
                                placeholder="Nhập tên danh mục">
                        </div>
                        <div class="mb-3">
                            <label for="category_slug" class="form-label">Tên danh mục (Slug)</label>
                            <input type="text" class="form-control" name="category_slug" id="category_slug" placeholder="Nhập tên danh mục">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btn_save">Lưu</button>
                    <button type="button" class="btn btn-primary" id="btn_update">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
       $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Mở modal thêm mới danh mục
    $('#btn_opent_modal').off('click').on('click', function() {
        $('#addCategoryModal').modal('show');
        $('#btn_update').hide();
        $('#category_slug').val(''); // Xóa slug khi mở modal
    });

    // Chuyển tên danh mục thành slug
    $('#category_name').on('input', function() {
        var categoryName = $(this).val();
        var slug = get_alias(categoryName);  // Chuyển đổi thành slug
        $('#category_slug').val(slug);  // Điền slug vào trường category_slug
    });

    // Lưu danh mục mới
    $('#btn_save').off('click').on('click', function() {
        var category_name = $('#category_name').val();
        var category_slug = $('#category_slug').val();

        $.ajax({
            url: "{{ route('admin.store_category_news') }}",
            type: "POST",
            data: {
                category_name: category_name,
                category_slug: category_slug,
                _token: '{{ csrf_token() }}' // Thêm CSRF token
            },
            success: function(response) {
                $('#addCategoryModal').modal('hide');
                location.reload(); // Refresh trang sau khi lưu thành công
            },
            error: function(error) {
                console.log('Cập nhật thất bại:', error);
            }
        });
    });

    // Sửa danh mục
    $('.btn_edit').on('click', function() {
        var categoryId = $(this).data('id');
        var categoryName = $(this).data('name');
        var categorySlug = $(this).data('slug');
        
        $('#category_name').val(categoryName);
        $('#category_slug').val(categorySlug);  // Điền slug vào modal khi sửa
        $('#category_id').val(categoryId);
        
        $('#addCategoryModal').modal('show');
        $('#btn_save').hide();
        
        $('#btn_update').off('click').on('click', function() {
            var category_id = $('#category_id').val();
            var category_name = $('#category_name').val();
            var category_slug = $('#category_slug').val();
            
            $.ajax({
                url: "{{ route('admin.update_category_news') }}", 
                type: "POST",
                data: {
                    category_id: category_id,
                    category_name: category_name,
                    category_slug: category_slug,
                    _token: '{{ csrf_token() }}' 
                },
                success: function(response) {
                    $('#addCategoryModal').modal('hide');
                    location.reload(); 
                },
                error: function(error) {
                    console.log('Cập nhật thất bại:', error);
                }
            });
        });
    });

    // Hàm chuyển đổi tên thành slug
    function get_alias(str) {
        str = str.toLowerCase();
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
        str = str.replace(/đ/g,"d");
        str = str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,"-");
        str = str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
        str = str.replace(/"'^\-+|\-+$/g,""); //cắt bỏ ký tự - ở đầu và cuối chuỗi
        return str;
    }
});
    </script>
@endsection
