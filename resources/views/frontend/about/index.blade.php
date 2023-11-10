@extends('frontend.layouts.default')

@php

@endphp

@section('content')
    <div class="page-title-area page-title-area-three title-img-one"
        style="background-image: url('{{ Voyager::image(setting('site.breadcrumb')) }}')">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Giới thiệu về chúng tôi </h2>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Trang chủ</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Chi tiết</li>
                    </ul>
                    <div class="page-title-btn">
                        <a href="{{ route('services') }}">Dịch vụ pháp luật
                            <i class="icofont-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="help-shape">
                <img src="assets/img/6.png" alt="Shape">
            </div>
        </div>
    </div>
    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-item">
                        <div class="about-information">                 
                            <p>{!!$about->body!!} </p>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
