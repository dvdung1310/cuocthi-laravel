<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Codescandy">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-M8S4MT3EYG');
 </script>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon/favicon.ico')}}">
    <link href="{{asset('assets/libs/bootstrap-icons/font/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/libs/%40mdi/font/css/materialdesignicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/libs/simplebar/dist/simplebar.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/theme.min.css')}}">
    <title>Cuộc thi</title>
</head>
<style>
    #alert-message {
        opacity: 0;
        transition: opacity 1s ease-in-out; /* 1 giây để hiện ra và ẩn đi */
        visibility: hidden;
    }
    
    #alert-message.show {
        opacity: 1;
        visibility: visible;
    }
    </style>
<body>
    <main id="main-wrapper" class="main-wrapper">
        <!-- header -->
        @include('backend.common.header')
        <!-- navbar vertical -->

        <!-- Sidebar -->

        @include('backend.common.sidebar')
        <!-- page content -->
        <div id="app-content">
            <div class="app-content-area">
            @yield('content')
            </div>
        </div>
    </main>

    <!-- Libs JS -->
    <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/feather-icons/dist/feather.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/dist/simplebar.min.js')}}"></script>

    <!-- Theme JS -->
    <script src="{{asset('assets/js/theme.min.js')}}"></script>
    <script src="{{asset('assets/js/slug.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('assets/libs/%40popperjs/core/dist/umd/popper.min.js')}}"></script>
    <!-- tippy js -->
    <script src="{{asset('assets/libs/tippy.js/dist/tippy-bundle.umd.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/tooltip.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Lấy phần tử thông báo
            var alertMessage = document.getElementById('alert-message');
    
            // Nếu phần tử tồn tại, đặt timeout để ẩn nó
            if (alertMessage) {
                setTimeout(function () {
                    alertMessage.style.opacity = '0'; // Làm mờ dần
                    setTimeout(() => alertMessage.remove(), 500); // Xoá sau khi mờ dần
                }, 5000); // 5 giây
            }
        });
    </script>
</body>

</html>