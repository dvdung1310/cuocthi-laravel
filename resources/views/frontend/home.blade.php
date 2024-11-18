@extends('frontend.welcome')
@section('home')
<section class="banner-cuocthi position-relative z-2">
    <div class="container position-relative z-2">
      <div class="row">
        <div class="col-md-6 d-flex flex-column justify-md-content-end justify-content-center">
          <div class="d-flex flex-column align-items-center">
            <h2 class="title-time fw-bold">CUỘC THI TUẦN 6 <span>(21/10 - 28/10/2024)</span></h2>
            <div class="border-cuocthi">

            </div>
          </div>
          <div class="home-time-item2">
            <p class="fw-bold text-center tg-text">Thời gian kết thúc thi</p>
            <div class="d-flex time-count-down-container h-100">
              <div class="d-flex flex-column justify-content-center">
                <p class="time-count-down">12</p>
                <p class="mb-0 time-count-down-text">Ngày</p>
              </div>

              <div class="d-flex flex-column justify-content-center">
                <p class="time-count-down">00</p>
                <p class="mb-0 time-count-down-text">Giờ</p>
              </div>

              <div class="d-flex flex-column justify-content-center">
                <p class="time-count-down">00</p>
                <p class="mb-0 time-count-down-text">Phút</p>
              </div>

              <div class="d-flex flex-column justify-content-center">
                <p class="time-count-down">00</p>
                <p class="mb-0 time-count-down-text">Giây</p>
              </div>
            </div>
            <script>
              const countDownDate = new Date("2024/11/31 23:59:59").getTime();
              const countdownFunction = setInterval(function () {
                const now = new Date().getTime();
                const distance = countDownDate - now;
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.querySelectorAll(".time-count-down")[0].innerText = days;
                document.querySelectorAll(".time-count-down")[1].innerText = hours;
                document.querySelectorAll(".time-count-down")[2].innerText = minutes;
                document.querySelectorAll(".time-count-down")[3].innerText = seconds;
                if (distance < 0) {
                  clearInterval(countdownFunction);
                  document.querySelectorAll(".time-count-down").forEach(el => el.innerText = "00");
                }
              }, 1000);
  
            </script>
          </div>

          <div class="d-flex flex-column align-items-center mt-4">
            <button class="banner-cuocthi-left-btn">Vào thi</button>
          </div>
        </div>

        <div class="col-md-6 position-relative z-2">
          <div class="banner-cuocthi-right ">
          
              <div class="banner-cuocthi-right-first position-relative z-2">
                  <p class="text-capitalize banner-cuocthi-right-first-text1 position-relative z-2"> chương trình trao thưởng</p>
                  <p class="banner-cuocthi-right-first-text2 position-relative z-2">Cào tem chống giả <br> nhận ngay may mắn</p>
                    <img class="vongbanhxe position-absolute z-1" src="images/index/vongbanhxe.png" alt="">
              </div>

              <div class="d-flex align-items-center justify-content-center mt-4 btn-ttct">
               <p class="mb-0 text-uppercase me-3"> thông tin chi tiết</p> <img src="images/index/hellobagia.svg" alt="">
              </div>
          </div>
        </div>
      </div>
    </div>  
  </section>

  <section class="py-md-5 py-3 blog-home position-relative">
    <img class="position-absolute tronhome1-cuocthi" src="images/index/tronhome1.svg" alt="">
    <img class="position-absolute tronhome2-cuocthi" src="images/index/tronhome2.svg" alt="">
    <div class="d-flex flex-column align-items-center pb-4">
      <h2 class="fw-bold text-uppercase">kết quả cuộc thi</h2>
      <div class="border-tintuc-title">

      </div>
    </div>
    <div class="container-fluid padding-side d-flex align-items-center flex-column" data-aos="fade-up">
      <div lass="list-blog mt-3">
        <div class="row">
          <div class="col-md-4">
            <div class="blog-item">
              <div class="blog-img">
                <a href="">
                  <img class="w-100" src="images/blog1.png" alt="">
                </a>
              </div>
              <div class="blog-content blog-content-cuocthi">
  
                <a href="">
                  <p class="blog-name fw-bold">Thủ tướng đề nghị Hàn Quốc cấp khoản vay ưu đãi để xây đường sắt, thủ
                    tướng đề nghị Hàn Quốc cấp khoản vay ưu cao tốc</p>
                </a>
                <a href="">
                  <p class="blog-description">
                    Bên cạnh đề xuất mở cửa thị trường cho hàng hóa Việt Nam, Thủ tướng đề nghị , Bên cạnh đề xuất mở
                    cửa thị trường cho hàng hóa Việt Nam, Thủ tướng đề nghị...
                  </p>
                </a>

                <div class="date-xemchitiet">
                  <div class="d-flex align-items-center">
                    <img class="me-1" src="images/index/lich.svg" alt="">
                    <span>22-10-2024</span>
                  </div>

                  <div class="d-flex align-items-center">
                    <img class="me-1" src="images/index/xemchitiet.svg" alt="">
                    <span class="fw-bold">Xem chi tiết</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="blog-item">
              <div class="blog-img">
                <img class="w-100" src="images/blog2.png" alt="">
              </div>
              <div class="blog-content blog-content-cuocthi">
  
                <a href="">
                  <p class="blog-name fw-bold">Thủ tướng đề nghị Hàn Quốc cấp khoản vay ưu đãi để xây đường sắt, thủ
                    tướng đề nghị Hàn Quốc cấp khoản vay ưu cao tốc</p>
                </a>
                <a href="">
                  <p class="blog-description">
                    Bên cạnh đề xuất mở cửa thị trường cho hàng hóa Việt Nam, Thủ tướng đề nghị , Bên cạnh đề xuất mở
                    cửa thị trường cho hàng hóa Việt Nam, Thủ tướng đề nghị...
                  </p>
                </a>

                <div class="date-xemchitiet">
                  <div class="d-flex align-items-center">
                    <img class="me-1" src="images/index/lich.svg" alt="">
                    <span>22-10-2024</span>
                  </div>

                  <div class="d-flex align-items-center">
                    <img class="me-1" src="images/index/xemchitiet.svg" alt="">
                    <span class="fw-bold">Xem chi tiết</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="blog-item">
              <div class="blog-img">
                <img class="w-100" src="images/blog3.png" alt="">
              </div>
              <div class="blog-content blog-content-cuocthi">
  
                <a href="">
                  <p class="blog-name fw-bold">Thủ tướng đề nghị Hàn Quốc cấp khoản vay ưu đãi để xây đường sắt, thủ
                    tướng đề nghị Hàn Quốc cấp khoản vay ưu cao tốc</p>
                </a>
                <a href="">
                  <p class="blog-description">
                    Bên cạnh đề xuất mở cửa thị trường cho hàng hóa Việt Nam, Thủ tướng đề nghị , Bên cạnh đề xuất mở
                    cửa thị trường cho hàng hóa Việt Nam, Thủ tướng đề nghị...
                  </p>
                </a>

                <div class="date-xemchitiet">
                  <div class="d-flex align-items-center">
                    <img class="me-1" src="images/index/lich.svg" alt="">
                    <span>22-10-2024</span>
                  </div>

                  <div class="d-flex align-items-center">
                    <img class="me-1" src="images/index/xemchitiet.svg" alt="">
                    <span class="fw-bold">Xem chi tiết</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection