@extends('frontend.layouts.default')
@section('content')
    <div class="page-title-area page-title-area-three title-img-one"
        style="background-image: url('{{ Voyager::image(setting('site.breadcrumb')) }}')">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Liên hệ </h2>
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
    <div class="contact-form contact-form-four pb-100" style="background-image: url('{{ Voyager::image(setting('site.background')) }}')">
        <div class="loaction-area">
            <div class="container">
                <div class="row location-bg">
                    <div class="col-sm-6 col-lg-4">
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="flaticon-pin"></i>
                            </div>
                            <h3>Địa chỉ</h3>
                            <ul>
                                <li> {{setting('site.address')}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="flaticon-call"></i>
                            </div>
                            <h3>Số điện thoại</h3>
                            <ul>
                                <li>
                                    <a href="tel:{{setting('site.phone')}}">{{setting('site.phone')}}</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <h3>Email</h3>
                            <ul>
                                <li>
                                    <a href="mailto:{{setting('site.email')}}">{{setting('site.email')}}</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
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
    </div>
    <div class="map-area">
        {!!setting('site.googlemap')!!}
    </div>
        
@endsection
