@extends('frontend.welcome')
@section('home')
    <section class="exam-section">
        <div class="container">
            <form class="row">
                <div class="col-md-8">
                    <div class="exam-left">
                        <h3 class="d-flex align-items-center fw-bold exam-left-h3">
                            <img class="me-3" src="images/index/but.svg" alt="">
                            {{ $exam->name }}
                        </h3>
                        <p class="exam-left-p-c">{{ $exam->name }}</p>

                        @foreach ($questions as $index => $question)
                            <div class="exam_question">
                                <div class="exam_question_item">
                                    <div class="exam-question-name d-flex ">
                                        {{ $index + 1 }}. {!! $question->name !!}
                                    </div>

                                    <div class="d-flex flex-column exam-question-answer">
                                        @foreach ($question->answers as $answer)
                                            <label>
                                                <input type="radio" name="question_{{ $question->id }}"
                                                    value="{{ $answer->id }}">
                                                {!! $answer->name !!}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="exam-right">
                        <div class="conact-item-cuocthi d-flex flex-column">
                            <div class="d-flex justify-content-start">
                                <div class="d-flex align-items-center contact-item2-title">
                                    <img class="me-2" src="images/contact1.svg" alt="">
                                    <div class="fw-bold">Thông tin người tham gia</div>
                                </div>
                            </div>

                            <div class="row mt-3 contact-item-user-cuoc-thi">
                                <p class="ppppp">Thông tin có đánh dấu * là bạn bắt buộc phải nhập</p>
                                <div class="mb-3 col-md-12">
                                    <label for="exampleFormControlInput1" class="form-label">Họ và tên <span
                                            style="color: rgba(246, 39, 23, 1);">*</span></label>
                                    <input type="email" class="form-control border-0" id="exampleFormControlInput2">
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="exampleFormControlInput1" class="form-label">Số định danh <span
                                            style="color: rgba(246, 39, 23, 1);">*</span>(CCCD/CMND/Số hộ chiếu/Mã số
                                        SV...)</label>
                                    <input type="email" class="form-control border-0" id="exampleFormControlInput2">
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="exampleFormControlInput1" class="form-label">Điện thoại <span
                                            style="color: rgba(246, 39, 23, 1);">*</span></label>
                                    <input type="email" class="form-control border-0" id="exampleFormControlInput2">
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="exampleFormControlInput1" class="form-label">Tỉnh/Thành phố <span
                                            style="color: rgba(246, 39, 23, 1);">*</span></label>
                                    <input type="email" class="form-control border-0" id="exampleFormControlInput2">
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="exampleFormControlInput1" class="form-label">Quận/Huyện * <span
                                            style="color: rgba(246, 39, 23, 1);">*</span></label>
                                    <input type="email" class="form-control border-0" id="exampleFormControlInput2">
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="exampleFormControlInput1" class="form-label">Thông tin địa chỉ * <span
                                            style="color: rgba(246, 39, 23, 1);">*</span></label>
                                    <input type="email" class="form-control border-0" id="exampleFormControlInput2">
                                </div>

                                <div class="d-flex justify-content-center mt-3">
                                    <div class="captcha_bg-cuoc-thi">
                                        <div class="row">
                                            <div class="col-9 d-flex justify-content-start align-items-center">
                                                <input class="captcha_input" type="checkbox"> <span
                                                    class="ms-3 captcha_text">Xác minh bạn là con người</span>
                                            </div>

                                            <div class="col-3 d-flex justify-content-end align-items-center">
                                                <img height="55px" width="55px"
                                                    src="images/c7fdee7faf3c63b635ad8a0bae3ec290.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center mt-3">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        class="text-white px-4 py-2 rounded-1 border-0"
                                        style="background-color: rgba(246, 39, 23, 1);">
                                        Gửi bài thi
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
