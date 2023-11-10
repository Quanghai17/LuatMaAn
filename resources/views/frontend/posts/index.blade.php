@extends('frontend.layouts.default')

@section('content')
    <div class="page-title-area page-title-area-three title-img-one"
        style="background-image: url('{{ Voyager::image(setting('site.breadcrumb')) }}')">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Bài viết - tin tức </h2>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Trang chủ</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Danh sách</li>
                    </ul>
                    {{-- <div class="page-title-btn">
                <a href="testimonial.html">Dịch vụ pháp luật
                    <i class="icofont-arrow-right"></i>
                </a>
            </div> --}}
                </div>
            </div>
        </div>
    </div>

    <section class="blog-area blog-area-two  pt-100">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-sm-6 col-lg-4" style="margin-top: 20px">
                    <div class="blog-item wow fadeInUp animated" data-wow-delay=".3s"
                        style="visibility: visible; animation-delay: 0.3s;">
                        <a href="{{ route('posts.show', $post->slug) }}">
                            <img src="{{ Voyager::image($post->thumbnail('medium', 'image')) }}" alt="{{ $post->title }}">
                        </a>
                        <div class="blog-inner">
                            <span>tin mới</span>
                            <h3>
                                <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <ul>
                                <li>
                                    <i class="icofont-calendar"></i>
                                    {{ $post->created_at->format('d/m/Y') }}
                                </li>
                                
                            </ul>
                            <p
                            style="display: -webkit-box;
                            -webkit-line-clamp: 3;
                            -webkit-box-orient: vertical;  
                            overflow: hidden;">
                                {{ $post->excerpt }}</p>
                            <a class="blog-link" href="{{ route('posts.show', $post->slug) }}">
                                Đọc thêm
                                <i class="icofont-simple-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="case-pagination">
                {!! $posts->links('frontend.layouts.partials.paginate') !!}
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
