@extends('backend.dashboard')
@section('content')
<div class="container-fluid">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h3 class="mb-0 ">Danh sách bài thi</h3>
                <!-- Button to trigger modal -->
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createExamModal">Thêm mới cuộc thi trắc nghiệm</button>

                <!-- Modal -->
                <div class="modal fade" id="createExamModal" tabindex="-1" aria-labelledby="createExamModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createExamModalLabel">Thêm mới cuộc thi trắc nghiệm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.exams.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Tên cuộc thi</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Mô tả</label>
                                            <textarea class="form-control" id="description" name="description"></textarea>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="start_date" class="form-label">Ngày bắt đầu</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="start_time" class="form-label">Giờ bắt đầu</label>
                                            <input type="time" class="form-control" id="start_time" name="start_time" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="end_date" class="form-label">Ngày kết thúc</label>
                                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="end_time" class="form-label">Giờ kết thúc</label>
                                            <input type="time" class="form-control" id="end_time" name="end_time" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Hình ảnh</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Trạng thái</label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="1">Hoạt động</option>
                                                <option value="0">Ngừng hoạt động</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="card h-100">
                <div class="card-header d-md-flex justify-content-between align-items-center">

                    <form>
                        <div class="mb-3 mb-md-0">
                            <input type="search" class="form-control" placeholder="Search Author">
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table mb-0 text-nowrap table-centered">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Id đề</th>
                                    <th scope="col">Tên đề thi</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Ngày bắt đầu</th>
                                    <th scope="col">Ngày kết thúc</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exams as $exam)
                                <tr>
                                    <td>{{ $exam->id }}</td>
                                    <td>{{ $exam->name }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($exam->image)
                                            <img src="{{ asset('storage/'.$exam->image) }}" alt="Image" class="avatar avatar-sm rounded-circle">
                                            @else
                                            Không có ảnh
                                            @endif

                                        </div>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($exam->start_date . ' ' . $exam->start_time)->format('d/m/Y H:i:s') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($exam->end_date . ' ' . $exam->end_time)->format('d/m/Y H:i:s') }}</td>
                                    <td>
                                        <span class="badge {{ $exam->status == '1' ? 'badge-success-soft' : 'badge-danger-soft' }} rounded-pill">
                                            {{ $exam->status == '1' ? 'Đang mở' : 'Đã đóng' }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-ghost btn-icon btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#editExamModal{{ $exam->id }}">
                                            <i data-feather="edit" class="icon-xs"></i>
                                        </button>

                                        <a class="btn btn-ghost btn-icon btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $exam->id }}">
                                            <i data-feather="trash" class="icon-xs"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- model sửa -->
                                <div class="modal fade" id="editExamModal{{ $exam->id }}" tabindex="-1" aria-labelledby="editExamModalLabel{{ $exam->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editExamModalLabel{{ $exam->id }}">Chỉnh sửa đề thi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form chỉnh sửa -->
                                                <form action="{{ route('admin.exams.update', $exam->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Tên đề thi</label>
                                                            <input type="text" class="form-control" id="name" name="name" value="{{ $exam->name }}" required>
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label for="start_date" class="form-label">Ngày bắt đầu</label>
                                                            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $exam->start_date }}" required>
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label for="start_time" class="form-label">Giờ bắt đầu</label>
                                                            <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $exam->start_time }}" required>
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label for="end_date" class="form-label">Ngày kết thúc</label>
                                                            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $exam->end_date }}" required>
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label for="end_time" class="form-label">Giờ kết thúc</label>
                                                            <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $exam->end_time }}" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Trạng thái</label>
                                                            <select class="form-select" id="status" name="status" required>
                                                                <option value="1" {{ $exam->status == 1 ? 'selected' : '' }}>Đang mở</option>
                                                                <option value="0" {{ $exam->status == 0 ? 'selected' : '' }}>Đã đóng</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Hình ảnh</label>
                                                            <input type="file" class="form-control" id="image" name="image">
                                                        </div>

                                                        <div class="mb-3">
                                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- model xóa -->

                                <!-- Xác nhận xóa Modal -->
                                <div class="modal fade" id="deleteModal{{ $exam->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa{{ $exam->id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc chắn muốn xóa đề thi này không?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <form id="deleteForm" action="{{ route('admin.exams.delete',$exam->id)}}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="card-footer d-md-flex justify-content-between align-items-center  ">
                    <nav>
                        <ul class="pagination mb-0">
                            <!-- Phần nút điều hướng trang -->
                            <li class="page-item {{ $exams->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $exams->previousPageUrl() }}"><i class="mdi mdi-chevron-left"></i></a>
                            </li>

                            @foreach ($exams->getUrlRange(1, $exams->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $exams->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                            @endforeach

                            <li class="page-item {{ $exams->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $exams->nextPageUrl() }}"><i class="mdi mdi-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection