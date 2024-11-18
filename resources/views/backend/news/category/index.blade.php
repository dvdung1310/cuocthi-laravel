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
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->category_name }}</td>
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
            $('#btn_opent_modal').off('click').on('click', function() {
                $('#addCategoryModal').modal('show');
                $('#btn_update').hide();
            })
            $('#btn_save').off('click').on('click', function() {
                // Lấy giá trị từ input
                var category_name = $('#category_name').val();

                $.ajax({
                    url: "{{ route('admin.store_category_news') }}",
                    type: "POST",
                    data: {
                        category_name: category_name,
                        _token: '{{ csrf_token() }}' // Thêm CSRF token
                    },
                    success: function(response) {
                        $('#addCategoryModal').modal('hide');
                        location.reload(); // Refresh trang sau khi cập nhật thành công
                    },
                    error: function(error) {
                        console.log('Cập nhật thất bại:', error);
                    }
                });
            });

            $('.btn_edit').on('click', function() {
                // Lấy dữ liệu từ các thuộc tính data
                var categoryId = $(this).data('id');
                var categoryName = $(this).data('name');
                $('#category_name').val(categoryName);
                $('#category_id').val(categoryId);
                $('#addCategoryModal').modal('show');
                $('#btn_save').hide();
                $('#btn_update').off('click').on('click', function() {
                    var category_id = $('#category_id').val();
                    var category_name = $('#category_name').val();
                    $.ajax({
                        url: "{{ route('admin.update_category_news') }}", 
                        type: "POST",
                        data: {
                            category_id: category_id,
                            category_name: category_name,
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
        });
    </script>
@endsection
