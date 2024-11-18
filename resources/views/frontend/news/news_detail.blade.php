@extends('frontend.welcome')
@section('home')
    <section class="detail-section">
        <div class="container">
            <form class="row">
                <div class="col-md-8">
                    <div class="detail-blog-content">
                        <a class="opacity-50" href="">Quay lại Kết quả</a>
                        <div class="detail-blog-content-main">
                            <h2 class="detail-blog-title fw-bold">{{ $news_detail->news_title }}</h2>
                            <p class="detail-blog-date">
                                {{ $news_detail->created_at->timezone('Asia/Ho_Chi_Minh')->translatedFormat('l, j/n/Y H:i\'(\\G\\M\\T+7)') }}
                            </p>
                            <div class="detail-blog-descsiptions">
                                {!! $news_detail->news_description!!}
                            </div>
                            <div class="detail-blog-nd">
                                {!! $news_detail->news_content!!}
                            </div>
                        </div>
                    </div>

                    <div class="detail-blog-form">
                        <h3 class="fw-bold">Phản hồi</h3>
                        <p>Ý kiến của bạn:(Không quá 1000 ký tự)</p>
                        <textarea class="" name="" rows="4" id=""></textarea>
                        <div class="d-flex justify-content-end">
                            <button>Gửi</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="d-flex align-items-center moinhat-border">
                        <h3 class="fw-bold me-2">Mới nhất</h3> <img src="{{asset('images/index/Fire.svg')}}" alt="">
                    </div>

                    <div class="sidebar">
                        @foreach ($new_news as $item)
                        <div class="sidebar-item d-flex">
                            <div class="sidebar-item-img">
                               <a href="{{ route('tin-tuc.chi-tiet', ['news_slug' => $item->news_slug, 'news_id' => $item->news_id]) }}">
                                <img class="w-100" src="{{asset($item->news_avatar)}}" alt="{{$item->news_title}}">
                               </a>
                            </div>
                            <div class="sidebar-item-content">
                                <p class="fw-bold sidebar-item-title">{{$item->news_title}}</p>
                                <div class="sidebar-item-des">
                                    {!!$item->news_description!!}
                                </div>
                                <p class="d-flex align-items-center sidebar-item-date mb-0"><img class="me-1"
                                        src="{{asset('images/index/lich.svg')}}" alt=""> <span>{{ $item->created_at->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y ') }}</span></p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </form>

            <div class="mt-2 mt-md-5">
                <h3 class="fw-bold">Tin tức khác</h3>
                <div class="row">
                    @foreach ($other_new as $item)
                    <div class="col-md-3">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="{{ route('tin-tuc.chi-tiet', ['news_slug' => $item->news_slug, 'news_id' => $item->news_id]) }}">
                                    <img class="w-100" src="{{asset($item->news_avatar)}}" alt="{{$item->news_title}}">
                                   </a>
                            </div>
                            <div class="blog-content">
                                <p class="blog-date"><span>{{ $item->created_at->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y - H:i') }}</span></p>
                                <a href="">
                                    <p class="blog-name fw-bold">{{$item->news_title}}</p>
                                </a>
                                <a href="{{ route('tin-tuc.chi-tiet', ['news_slug' => $item->news_slug, 'news_id' => $item->news_id]) }}" class="blog-description">
                                    {{-- <p class="blog-description"> --}}
                                        {!!$item->news_description!!}
                                    {{-- </p> --}}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
@endsection
