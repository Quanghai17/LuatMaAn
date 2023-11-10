@extends('frontend.layouts.default')

@section('content')
    <div class="page-title-area page-title-area-three title-img-one"
        style="background-image: url('{{ Voyager::image(setting('site.breadcrumb')) }}')">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Dịch vụ pháp luật </h2>
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

    <section class="portfolio-area portfolio-area-two pt-100">
        <div class="container">
            <div class="section-title">
                <h2>Lĩnh Vực Tư Vấn Pháp Luật</h2>
            </div>
            <div class="row">
                @foreach ($services as $service)
                <div class="col-sm-6 col-lg-4">
                    <div class="portfolio-item wow fadeInUp animated" data-wow-delay=".3s"
                        style="visibility: visible; animation-delay: 0.3s;">
                        <img src="{{ Voyager::image($service->thumbnail('cropped', 'image')) }}" alt="{{ $service->title }}">
                        <div class="portfolio-inner">
                            <span></span>
                            <h3>
                                <a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a>
                            </h3>
                            <p> {{ $service->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="case-pagination">
                {!! $services->links('frontend.layouts.partials.paginate') !!}
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
