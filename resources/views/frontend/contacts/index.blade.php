@extends('frontend.welcome')
@section('home')
    <div style="background-color:#fffbeb">
        <section class="py-md-5 py-3">
            <div class="container-fluid padding-side  d-flex align-items-center flex-column" data-aos="fade-up">
                <div class="text-center d-flex contact-title flex-column align-items-center">
                    Liên hệ với cơ quan có thẩm quyền
                    <div class="border-contact">

                    </div>
                </div>
            </div>
        </section>

        <section class="pb-md-5 py-3">
            <div class="container-fluid padding-side" data-aos="fade-up">
                <form action="{{ route('user.contact.store') }}" method="POST">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-7">
                            <div class="conact-item1 d-flex flex-column">
                                <div class="d-flex justify-content-center">
                                    <div class="text-center contact-item1-title">
                                        Thông tin muốn phản ánh
                                    </div>
                                </div>

                                <div class="contact-radio mt-4">
                                    <div class="d-md-flex justify-content-around ">
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" value="Hàng giả"
                                                name="feedback_type" id="fakeGoods" required>
                                            <label class="form-check-label" for="fakeGoods">
                                                Hàng giả
                                            </label>
                                        </div>

                                        <div class="form-check me-3">
                                            <input  class="form-check-input" type="radio" value="Lừa đảo trực tuyến"
                                                name="feedback_type" id="onlineFraud" required>
                                            <label class="form-check-label" for="onlineFraud">
                                                Lừa đảo trực tuyến
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="Thông tin khác"
                                                name="feedback_type" id="otherInfo" required>
                                            <label class="form-check-label" for="otherInfo">
                                                Thông tin khác
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center mt-4">
                                    <div class="w-md-75 w-100">
                                        <textarea class="form-control border-0 opacity-75 p-3" rows="6" name="content"
                                            placeholder="Nhập thông tin bạn muốn phản ảnh" id=""></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="conact-item2 d-flex flex-column mt-5">
                                <div class="d-flex justify-content-center">
                                    <div class="text-center d-flex align-items-center  contact-item2-title">
                                        <img class="me-2" src="images/contact1.svg" alt="">
                                        <div class="fw-bold">
                                            Thông tin của bạn
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3 contact-item-user">
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleFormControlInput1" class="form-label">Họ và tên <span
                                                style="color: rgba(246, 39, 23, 1);">*</span></label>
                                        <input type="text" name="full_name" class="form-control border-0"
                                            id="exampleFormControlInput2" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="exampleFormControlInput1" class="form-label">Điện thoại <span
                                                style="color: rgba(246, 39, 23, 1);">*</span></label>
                                        <input type="text" name="phone_number" class="form-control border-0"
                                            id="exampleFormControlInput2" required>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label">Địa chỉ <span
                                                style="color: rgba(246, 39, 23, 1);">*</span></label>
                                        <textarea class="form-control border-0 opacity-75 p-3" rows="6" name="address" id=""></textarea>
                                    </div>

                                    <div class="d-flex justify-content-center mt-3">
                                        <div class="captcha_bg">
                                            <div class="row">
                                                <div class="col-9 d-flex justify-content-start align-items-center">
                                                    <input required class="captcha_input" type="checkbox"> <span
                                                        class="ms-3 captcha_text" >Xác minh bạn là con người</span>
                                                </div>

                                                <div class="col-3 d-flex justify-content-end align-items-center">
                                                    <img height="55px" width="55px"
                                                        src="images/c7fdee7faf3c63b635ad8a0bae3ec290.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mt-3">

                                        <button class="text-white px-4 py-2 rounded-1 border-0"
                                            style="background-color: rgba(246, 39, 23, 1);">Gửi Phản Hồi</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
