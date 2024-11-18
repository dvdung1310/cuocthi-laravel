@extends('backend.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h3 class="mb-0 ">Danh sách tin tức</h3>
                    {{-- <a href="#!" class="btn btn-primary">Thêm mới danh mục</a> --}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 ">
                <div class="card h-100">
                    <div class="card-header d-md-flex justify-content-end align-items-center">
                        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Thêm mới tin tức</a>
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
                                        <th scope="col">Danh mục</th>
                                        <th scope="col">Tin tức</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Mô tả</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->category_name }}</td>
                                            <td>{{ $item->news_title }}</td>
                                            <td>{{ $item->news_slug }}</td>
                                            <td>{!! $item->news_description!!}</td>
                                            {{-- <td>{!!$item->news_content!!}</td> --}}
                                            <td>
                                                <img src="{{ asset($item->news_avatar) }}" width="50px" height="80px" alt="">
                                            </td>
                                            <td>
                                                @if ($item->news_status == 0)
                                                    <a href="{{ route('admin.active_news', $item->news_id) }}"><span
                                                            class="badge bg-secondary">Đóng</span></a>
                                                @elseif($item->news_status == 1)
                                                    <a
                                                        href="{{ route('admin.unactive_news', $item->news_id) }}"><span
                                                            class="badge bg-success">Hiển thị</span></a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.news.edit', $item->news_id) }}"
                                                    class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip btn_edit">
                                                    <i data-feather="edit" class="icon-xs"></i>
                                                    <div id="editOne" class="d-none">
                                                        <span>Edit</span>
                                                    </div>
                                                </a>
                                                <a href="{{ route('admin.delete_news', $item->news_id) }}"
                                                    class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                    data-template="trashOne"
                                                    onclick="return confirm('Bạn có muốn xóa tin tức này không?')">
                                                    <i data-feather="trash-2" class="icon-xs"></i>
                                                    <div id="trashOne" class="d-none">
                                                        <span>Delete</span>
                                                    </div>
                                                </a>
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
 
@endsection
