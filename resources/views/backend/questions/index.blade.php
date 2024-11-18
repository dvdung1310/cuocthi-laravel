@extends('backend.dashboard')
@section('content')
    <div class="container-fluid">
        <style>
            .modal-dialog {
                max-width: 60%;
            }

            .delete_modal .modal-dialog {
                max-width: 30%;
            }

            .question .ck-editor__editable_inline {
                height: 120px;
            }

            .answer .ck-editor__editable_inline {
                height: 70px;
            }

            .answer_p p {
                margin-bottom: 3px
            }
        </style>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h3 class="mb-0 ">Danh sách câu hỏi - {{ $exam->name }}</h3>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createExamModal">Thêm mới câu
                        hỏi</button>
                    <!-- Modal -->
                    <div class="modal fade" id="createExamModal" tabindex="-1" aria-labelledby="createExamModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createExamModalLabel">Thêm mới câu hỏi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.questions.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="exam_id" value="{{ $exam->id }}" id="">
                                        <div class="row">
                                            <div class="mb-3 question">
                                                <label for="name" class="form-label">Tên câu hỏi</label>
                                                <textarea name="question" class="form-control " id="question"></textarea>
                                            </div>
                                            <!-- Đáp án A -->
                                            <div class="mb-3 col-md-6">
                                                <label for="answerA" class="form-label">Câu A</label>
                                                <textarea name="answers[0][name]" class="form-control" id="answerA"></textarea>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" name="correct_answer"
                                                        value="0" id="correctA" required>
                                                    <label class="form-check-label fw-bold" for="correctA">
                                                        Đáp án đúng
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Đáp án B -->
                                            <div class="mb-3 col-md-6">
                                                <label for="answerB" class="form-label">Câu B</label>
                                                <textarea name="answers[1][name]" class="form-control" id="answerB"></textarea>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" name="correct_answer"
                                                        value="1" id="correctB" required>
                                                    <label class="form-check-label fw-bold" for="correctB">
                                                        Đáp án đúng
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Đáp án C -->
                                            <div class="mb-3 col-md-6">
                                                <label for="answerC" class="form-label">Câu C</label>
                                                <textarea name="answers[2][name]" class="form-control" id="answerC"></textarea>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" name="correct_answer"
                                                        value="2" id="correctC" required>
                                                    <label class="form-check-label fw-bold" for="correctC">
                                                        Đáp án đúng
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Đáp án D -->
                                            <div class="mb-3 col-md-6">
                                                <label for="answerD" class="form-label">Câu D</label>
                                                <textarea name="answers[3][name]" class="form-control" id="answerD"></textarea>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" name="correct_answer"
                                                        value="3" id="correctD" required>
                                                    <label class="form-check-label fw-bold" for="correctD">
                                                        Đáp án đúng
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Đóng</button>
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
                                        <th scope="col">Tên câu hỏi</th>
                                        <th scope="col">Câu trả lời</th>
                                        <th scope="col">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $key => $question)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{!! $question->name !!}</td>
                                            <td>
                                                @foreach ($question->answers as $answer)
                                                    <div
                                                        class="answer_p {{ $answer->result == 1 ? 'fw-bold text-success' : '' }}">
                                                        {!! $answer->name !!}
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.questions.edit', ['exam' => $exam->id, 'question' => $question->id]) }}"
                                                    class="btn btn-ghost btn-icon btn-sm rounded-circle">
                                                    <i data-feather="edit" class="icon-xs"></i>
                                                </a>
                                                <a class="btn btn-ghost btn-icon btn-sm rounded-circle"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $question->id }}">
                                                    <i data-feather="trash" class="icon-xs"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <!-- Xác nhận xóa Modal -->
                                        <div class="modal fade delete_modal" id="deleteModal{{ $question->id }}"
                                            tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Xác nhận
                                                            xóa</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn có chắc chắn muốn xóa đề thi này không?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Hủy</button>
                                                        <form id="deleteForm"
                                                            action="{{ route('admin.questions.delete', $question->id) }}"
                                                            method="POST" style="display: inline;">
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
                                <li class="page-item {{ $questions->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $questions->previousPageUrl() }}"><i
                                            class="mdi mdi-chevron-left"></i></a>
                                </li>

                                @foreach ($questions->getUrlRange(1, $questions->lastPage()) as $page => $url)
                                    <li class="page-item {{ $page == $questions->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                <li class="page-item {{ $questions->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $questions->nextPageUrl() }}"><i
                                            class="mdi mdi-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#question'), {
                ckfinder: {
                    uploadUrl: "{{ route('store_images', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#answerA'), {
                ckfinder: {
                    uploadUrl: "{{ route('store_images', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#answerB'), {
                ckfinder: {
                    uploadUrl: "{{ route('store_images', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#answerC'), {
                ckfinder: {
                    uploadUrl: "{{ route('store_images', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#answerD'), {
                ckfinder: {
                    uploadUrl: "{{ route('store_images', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
