@extends('backend.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h3 class="mb-0 text-uppercase">Danh sách gửi cảm nhận</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="card h-100">
                <div class="card-header d-md-flex justify-content-between align-items-center">

                    <form class="d-none">
                        <div class="mb-3 mb-md-0">
                            <input type="search" class="form-control" placeholder="Tìm kiếm bài thi">
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table mb-0 text-nowrap table-centered">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên thông tin</th>
                                    <th scope="col">Nội dung phản ánh</th>
                                    <th scope="col">Họ và Tên</th>
                                    <th scope="col">Điện thoại</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Ngày tạo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $key=>$contact)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $contact->feedback_type }}</td>
                                    <td>{{ $contact->content }}</td>
                                    <td>{{ $contact->full_name }}</td>
                                    <td>{{ $contact->phone_number }}</td>
                                    <td>{{ $contact->address }}</td>
                                    <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="card-footer d-md-flex justify-content-between align-items-center  ">
                    <nav>
                        <ul class="pagination mb-0">
                            <!-- Phần nút điều hướng trang -->
                            <li class="page-item {{ $contacts->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $contacts->previousPageUrl() }}"><i class="mdi mdi-chevron-left"></i></a>
                            </li>

                            @foreach ($contacts->getUrlRange(1, $contacts->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $contacts->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                            @endforeach

                            <li class="page-item {{ $contacts->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $contacts->nextPageUrl() }}"><i class="mdi mdi-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection