@php
  $menu = menu('home_menu', '_json');
  $services = \App\Service::where('status', 'ACTIVE')->orderBy('created_at', 'ASC')->limit(6)->get();
@endphp

<footer>
    <div class="container" style="padding-top: 70px;">
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="footer-item">
                    <div class="footer-logo">
                        <a href="{{route('home')}}">
                            <img src="{{ Voyager::image(setting('site.logo_footter')) }}" alt="Logo" style="max-width: 60%;">
                        </a>
                        <p>{{setting('site.description')}}</p>
                        <ul>
                            <li>
                                <a href="{{setting('social-network.youtube')}}" target="_blank">
                                    <i class="icofont-youtube-play"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{setting('social-network.facebook')}}" target="_blank">
                                    <i class="icofont-facebook"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-service">
                        <h3>Dịch vụ</h3>
                        <ul>
                            @foreach ($services as $service)
                            <li>
                                <a href="{{ route('services.show', $service->slug) }}">
                                    <i class="icofont-simple-right"></i>
                                    {{ $service->title }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="footer-item">
                    <div class="footer-service">
                        <h3>Liên kết</h3>
                        <ul>
                            @foreach ($menu as $item)
                            <li>
                                <a href="{{ url($item->url) }}">
                                    <i class="icofont-simple-right"></i>
                                    {{ $item->translate()->title }} 
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-find">
                        <h3>Thông tin liên hệ</h3>
                        <ul>
                            <li>
                                <i class="icofont-location-pin"></i>
                              {{setting('site.address')}}
                            </li>
                            <li>
                                <i class="icofont-ui-call"></i>
                                <a href="tel:{{setting('site.phone')}}">{{setting('site.phone')}}</a>
                            </li>
                            <li>
                                <i class="icofont-email"></i>
                                <a href=""><span class="__cf_email__">{{setting('site.email')}}</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area" style="text-align: center">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="copyright-item">
                        <p>Copyright @
                            <script data-cfasync="false"
                                src=""></script>
                            <script>document.write(new Date().getFullYear())</script> {{setting('site.title')}}. Designed By <a
                                href="https://kennatech.vn/" target="_blank">Kennatech</a>
                        </p>
                    </div>
                </div>
                {{-- <div class="col-sm-5 col-lg-6">
                    <div class="copyright-item copyright-right">
                        <a href="" target="_blank">Terms & Conditions</a> <span>-</span>
                        <a href="" target="_blank">Privacy Policy</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</footer>