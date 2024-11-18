@extends('frontend.welcome')
@section('home')
    <section class="pt-5">
        <div class="d-flex flex-column align-items-center w-100">
            <h3 class="text-uppercase fw-bold">Tin tức</h3>
        </div>
    </section>


    <section class="pb-md-5 py-3">
        <div class="container-fluid padding-side d-flex align-items-center flex-column" data-aos="fade-up">
            <div lass="list-blog mt-3">
                <div class="row">
                    @foreach ($news as $item)
                        <div class="col-md-3">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <a
                                        href="{{ route('tin-tuc.chi-tiet', [
                                            'category_slug' => $category_slug,
                                            'news_slug' => $item->news_slug,
                                            'news_id' => $item->news_id,
                                        ]) }}">
                                        <img class="w-100" src="{{ asset($item->news_avatar) }}"
                                            alt="{{ $item->news_title }}">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <p class="blog-date">
                                        <span>{{ $item->created_at->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y - H:i') }}</span>
                                    </p>
                                    <a
                                        href="{{ route('tin-tuc.chi-tiet', [
                                            'category_slug' => $category_slug,
                                            'news_slug' => $item->news_slug,
                                            'news_id' => $item->news_id,
                                        ]) }}">
                                        <p class="blog-name fw-bold">{{ $item->news_title }}</p>
                                    </a>
                                    <a href="{{ route('tin-tuc.chi-tiet', [
                                            'category_slug' => $category_slug,
                                            'news_slug' => $item->news_slug,
                                            'news_id' => $item->news_id,
                                        ]) }}"
                                        class="blog-description">
                                        {{-- <p class="blog-description"> --}}
                                        {!! $item->news_description !!}
                                        {{-- </p> --}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true" class="d-flex align-items-center"><img src="images/lefticon.svg"
                                    alt="">
                                <p class="mb-0">Trang trước</p>
                            </span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">20</a></li>
                    <li class="page-item"><a class="page-link" href="#">21</a></li>
                    <li class="">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true" class="d-flex align-items-center">
                                <p class="mb-0">Trang sau</p> <img src="images/righticon.svg" alt="">
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </section>
@endsection
