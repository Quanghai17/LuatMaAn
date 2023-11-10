@extends('frontend.layouts.default')
@section('content')
    <div class="home-slider-area">
        <div class="home-slider owl-theme owl-carousel">
            @foreach ($banners as $banner)
                <div class="slider-item slider-bg-one"
                    style="background-image: url('{{ Voyager::image($banner->thumbnail('cropped', 'image')) }}');">
                    <div class="d-table">
                        <div class="d-table-cell">
                            <div class="container">

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="help-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 d-none d-sm-block">
                    <div class="help-item help-left">
                        <img src="{{ Voyager::image($about->image) }}" alt="{{ $about->title }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="help-item">
                        <div class="help-right">
                            <h2>{{ $about->title }}</h2>
                            <p>{{ $about->excerpt }}</p>

                            <a style="margin-top: 10px;" class="cmn-btn" href="{{ route('about') }}">Xem chi Tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog-area" style="padding-bottom: 20px;">
        <div class="container">
            <div class="section-title">
                <a href="{{ route('staffs') }}"><span>Nhân viên tư vấn</span></a>
                <h2>Đội Ngũ Luật Sư Chuyên Nghiệp</h2>
            </div>
            <div class="blog-slider owl-theme owl-carousel">
                @foreach ($customers as $customer)
                    <div class="blog-item">
                        <div class="team-item">
                            <img style="display: block; width: 65%; margin-left: 65px;"
                                src="{{ Voyager::image($customer->image) }}" alt="{{ $customer->title }}">
                            <div class="team-inner">
                                <h3>
                                    <a href="{{ route('staffs.show', $customer->slug) }}">{{ $customer->title }}</a>
                                </h3>
                                <span>{{ $customer->position }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="practice-area" style="padding-top: 20px;">
        <div class="container">
            <div class="section-title">
                <span>dịch vụ chúng tôi cung cấp</span>
                <h2>Lĩnh Vực Tư Vấn Pháp Luật </h2>
            </div>
            {{-- <div class="row">
                @foreach ($services as $service)
                    <div class="col-sm-6 col-lg-4 col-6">
                        <div class="practice-item">
                            <h3>{{ $service->title }}</h3>
                            <a href="{{ route('services.show', $service->slug) }}">Xem chi tiết</a>
                            <img class="practice-shape-one" src="{{ asset('assets/img/7.png') }}" alt="Shape">
                            <img class="practice-shape-two" src="{{ asset('assets/img/8.png') }}" alt="Shape">
                        </div>
                    </div>
                @endforeach
            </div> --}}
            <div class="row">
                @foreach ($services as $service)
                    <div class="ol-sm-6 col-lg-4 col-6">
                        <div class="portfolio-item wow fadeInUp animated" data-wow-delay=".3s"
                            style="visibility: visible; animation-delay: 0.3s;">
                            <img src="{{ Voyager::image($service->thumbnail('cropped', 'image')) }}"
                                alt="{{ $service->title }}">
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
        </div>
    </section>

    <section class="blog-area pt-100" style="padding-top: 50px;">
        <div class="container">
            <div class="section-title">
                <span>Tin tức</span>
                <h2>Bài viết mới nhất</h2>
            </div>
            <div class="blog-slider owl-theme owl-carousel">
                @foreach ($posts as $post)
                    <div class="blog-item">
                        <a href="{{ route('posts.show', $post->slug) }}">
                            <img src="{{ Voyager::image($post->thumbnail('medium', 'image')) }}"
                                alt="{{ $post->title }}">
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
                @endforeach
            </div>
        </div>
    </section>

    <div class="contact-form " style="background-image: url('{{ Voyager::image(setting('site.background-contact')) }}'); padding-top: 50px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <form method="post" action="{{route('feedback')}}">
                        @csrf      
                        <div class="row contact-wrap">
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control"  placeholder="Họ và tên">
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control"
                                        data-error="Nhập lại email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone_number"
                                        data-error="Nhập lại số điện thoại" class="form-control" placeholder="Số điện thoại">
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="address" id="msg_subject" class="form-control"
                                        data-error="Nhập lại địa chỉ" placeholder="Địa chỉ">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <textarea name="content" class="form-control" id="message" cols="30" rows="8" 
                                        placeholder="Nội dung"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-lg-12">
                                <div class="text-center">
                                    <button type="submit" class="contact-btn disabled"
                                        style="pointer-events: all; cursor: pointer;">Gửi đi</button>
                                </div>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 d-none d-sm-block">
                    <div class="help-item help-left">
                        <img src="{{ Voyager::image($contact_form->image) }}" alt="{{ $contact_form->title }}">
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
@endsection
