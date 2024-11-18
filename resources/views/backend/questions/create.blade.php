@extends('backend.dashboard')
@section('content')
    <div id="app-content">
        <div class="app-content-area">
            <div class="container-fluid">
                <form action="{{ route('admin.questions.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 question">
                            <label for="name" class="form-label">Tên câu hỏi 22</label>
                            <textarea name="question" class="form-control " id="question"></textarea>
                        </div>
                        <!-- Đáp án A -->
                        <div class="mb-3 col-md-6">
                            <label for="answerA" class="form-label">Câu A</label>
                            <textarea name="answers_1" class="form-control" id="answerA" ></textarea>
                            <div class="form-check mt-2">
                                
                               
                            </div>
                        </div>

                        <!-- Đáp án B -->
                        <div class="mb-3 col-md-6">
                            <label for="answerB" class="form-label">Câu B</label>
                            <textarea name="answers_2" class="form-control" id="answerB" ></textarea>
                            <div class="form-check mt-2">
                                
                               
                            </div>
                        </div>

                        <!-- Đáp án C -->
                        <div class="mb-3 col-md-6">
                            <label for="answerC" class="form-label">Câu C</label>
                            <textarea name="answers_3" class="form-control" id="answerC" ></textarea>
                            <div class="form-check mt-2">
                               
                            
                            </div>
                        </div>

                        <!-- Đáp án D -->
                        <div class="mb-3 col-md-6">
                            <label for="answerD" class="form-label">Câu D</label>
                            <textarea name="answers_4" class="form-control" id="answerD" ></textarea>
                            <div class="form-check mt-2">
                              
                               
                            </div>
                        </div>

                       
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                      
                    </div>
                </form>

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
