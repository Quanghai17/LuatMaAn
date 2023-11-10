@extends('frontend.layouts.default')

@section('content')
    <div class="page-title-area page-title-area-three title-img-one"
        style="background-image: url('{{ Voyager::image(setting('site.breadcrumb')) }}')">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Danh sách nhân viên  </h2>
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

    <section class="blog-area" style="padding-bottom: 200px;padding-top: 20px;">
        <div class="container">
            <div class="section-title">
                <span>Nhân viên tư vấn</span>
                <h2>Đội Ngũ Luật Sư Chuyên Nghiệp</h2>
            </div>
            <div class="blog-slider owl-theme owl-carousel">
                @foreach ($staffs as $staff)
                    <div class="blog-item">
                        <div class="team-item">
                            <img style="display: block; width: 65%; margin-left: 65px;"
                                src="{{ Voyager::image($staff->image) }}" alt="{{ $staff->title }}">
                            <div class="team-inner">
                                <h3>
                                    <a href="{{ route('staffs.show', $staff->slug) }}">{{ $staff->title }}</a>
                                </h3>
                                <span>{{ $staff->position }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


@endsection

@section('js')
@endsection
