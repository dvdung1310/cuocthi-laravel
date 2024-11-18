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
                        <form action="{{ route('admin.questions.update', ['question' => $question->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="exam_id" value="{{ $exam }}" id="">
                            <div class="row">
                                <div class="mb-3 question">
                                    <label for="name" class="form-label">Tên câu
                                        hỏi</label>
                                    <textarea name="question" class="form-control " id="question_edit">
                                            {{ $question->name }}
                                    </textarea>
                                </div>
                                <!-- Đáp án A -->
                                <div class="mb-3 col-md-6">
                                    <label for="answerA" class="form-label">Câu A</label>
                                    <textarea name="answers[0][name]" class="form-control" id="answerA_edit">
                                            {{ $question->answers[0]->name }}
                                        </textarea>
                                    <div class="form-check mt-2">
                                        <input {{ $question->answers[0]->result == 1 ? 'checked' : '' }}
                                            class="form-check-input" type="radio" name="correct_answer" value="0"
                                            id="correctA" required>
                                        <label class="form-check-label fw-bold" for="correctA">
                                            Đáp án đúng
                                        </label>
                                    </div>
                                </div>

                                <!-- Đáp án B -->
                                <div class="mb-3 col-md-6">
                                    <label for="answerB" class="form-label">Câu B</label>
                                    <textarea name="answers[1][name]" class="form-control" id="answerB_edit">
                                            {{ $question->answers[1]->name }}
                                        </textarea>
                                    <div class="form-check mt-2">
                                        <input {{ $question->answers[1]->result == 1 ? 'checked' : '' }}
                                            class="form-check-input" type="radio" name="correct_answer" value="1"
                                            id="correctB" required>
                                        <label class="form-check-label fw-bold" for="correctB">
                                            Đáp án đúng
                                        </label>
                                    </div>
                                </div>

                                <!-- Đáp án C -->
                                <div class="mb-3 col-md-6">
                                    <label for="answerC" class="form-label">Câu C</label>
                                    <textarea name="answers[2][name]" class="form-control" id="answerC_edit">
                                            {{ $question->answers[2]->name }}
                                        </textarea>
                                    <div class="form-check mt-2">
                                        <input {{ $question->answers[2]->result == 1 ? 'checked' : '' }}
                                            class="form-check-input" type="radio" name="correct_answer" value="2"
                                            id="correctC" required>
                                        <label class="form-check-label fw-bold" for="correctC">
                                            Đáp án đúng
                                        </label>
                                    </div>
                                </div>

                                <!-- Đáp án D -->
                                <div class="mb-3 col-md-6">
                                    <label for="answerD" class="form-label">Câu D</label>
                                    <textarea name="answers[3][name]" class="form-control" id="answerD_edit">
                                            {{ $question->answers[3]->name }}
                                        </textarea>
                                    <div class="form-check mt-2">
                                        <input {{ $question->answers[3]->result == 1 ? 'checked' : '' }}
                                            class="form-check-input" type="radio" name="correct_answer" value="3"
                                            id="correctD" required>
                                        <label class="form-check-label fw-bold" for="correctD">
                                            Đáp án đúng
                                        </label>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                </div>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#question_edit'), {
                ckfinder: {
                    uploadUrl: "{{ route('store_images', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#answerA_edit'), {
                ckfinder: {
                    uploadUrl: "{{ route('store_images', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#answerB_edit'), {
                ckfinder: {
                    uploadUrl: "{{ route('store_images', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#answerC_edit'), {
                ckfinder: {
                    uploadUrl: "{{ route('store_images', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#answerD_edit'), {
                ckfinder: {
                    uploadUrl: "{{ route('store_images', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
