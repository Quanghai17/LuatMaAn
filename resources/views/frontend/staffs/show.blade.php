@extends('frontend.layouts.default')

@section('content')
    <div class="page-title-area page-title-area-three title-img-one"
        style="background-image: url('{{ Voyager::image(setting('site.breadcrumb')) }}')">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Chi tiết hồ sư </h2>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Trang chủ</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Chi tiết</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="attorney-details pt-100 pb-70">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-4">
                    <div class="attor-details-item">
                        <img src="{{ Voyager::image($staff->thumbnail('cropped', 'image')) }}" alt="Details">
                        <div class="attor-details-left">
                            <div class="attor-social">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <i class="icofont-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/" target="_blank">
                                            <i class="icofont-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="attor-social-details">
                                <h3>Thông tin liên hệ</h3>
                                <ul>
                                    <li>
                                        <i class="flaticon-call"></i>
                                        <a href="tel:{{$staff->phone}}">
                                         {{$staff->phone}}
                                        </a>
                                    </li>
                                    <li>
                                        <i class="flaticon-email"></i>
                                        <a href="mailto:{{$staff->email}}">
                                            {{$staff->email}}
                                        </a>
                                    </li>
                                    <li>
                                        <i class="flaticon-pin"></i>
                                        {{$staff->address}}
                                    </li>
                                </ul>
                            </div>
                            <div class="attor-work">
                                <h3>Thời gian làm việc</h3>
                                <div class="attor-work-left">
                                    <ul>
                                        <li>Thứ 2 - Thứ 6</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="attor-details-item">
                        <div class="attor-details-right">
                            <div class="attor-details-name">
                                <h2>{{$staff->title}}</h2>
                                <span>{{$staff->position}}</span>
                            </div>
                            <div class="attor-details-things">
                                <p>{!!$staff->content!!}</p>
                            </div>
                        </div>
                    </div>
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
                @foreach ($staffs as $item)
                    <div class="blog-item">
                        <div class="team-item">
                            <img style="display: block; width: 65%; margin-left: 65px;"
                                src="{{ Voyager::image($item->image) }}" alt="{{ $item->title }}">
                            <div class="team-inner">
                                <h3>
                                    <a href="{{ route('staffs.show', $item->slug) }}">{{ $item->title }}</a>
                                </h3>
                                <span>{{ $item->position }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
