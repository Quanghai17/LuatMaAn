@extends('frontend.layouts.default')

@section('content')
    <div class="page-title-area page-title-area-three title-img-one"
        style="background-image: url('{{ Voyager::image(setting('site.breadcrumb')) }}')">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>{{ $service->title }} </h2>
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
    <div class="blog-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="case-details-item">
                        <div class="blog-details-img">
                            <h2>{{ $service->title }}</h2>
                            <ul>
                                <li>
                                    <i class="icofont-calendar"></i>
                                    {{ $service->created_at->format('d/m/Y') }}
                                </li>
                                
                            </ul>
                            <p>{!!$service->content !!}</p>
                        </div>
                        @if ($service->file != null)
                        @php
                            $files = json_decode($service->file);
                        @endphp
                        <div class="post-share-tag">
                            <span class="blog-post-share">
                                @foreach ($files as $file)
                               <a href="{{ Storage::url($file->download_link) ?? '#' }}"> <span class="title">Xem chi tiết file: {{ $file->original_name ?? '' }}</span> </a>
                                @endforeach

                            </span>

                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-details-item">
                        <div class="blog-details-category">
                            <h3>Lĩnh Vực Tư Vấn Pháp Luật</h3>
                            <ul>
                                @foreach ($services as $service)
                                <li>
                                    <a href="{{ route('services.show', $service->slug) }}">
                                        {{ $service->title }}
                                        <i class="icofont-arrow-right"></i>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog-details-search">
                            <div class="search-area">
                                <form action="{{ route('search') }}" method="get">
                                    <input type="text" class="form-control" name="key" placeholder="Nhập từ khóa">
                                    <button type="submit" class="btn blog-details-btn">
                                        <i class="icofont-search-2"></i>
                                    </button>
                                </form>
                            </div>
                            <h3>Tin tức mới nhất</h3>
                            <ul>
                                @foreach ($posts as $post)
                                    <li>
                                        <img style="height: 100px; width: 90px" src="{{ Voyager::image($post->image) }}" alt="Blog Details">
                                        <div class="blog-details-recent">
                                            <h4>
                                                <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                                            </h4>
                                            <ul>
                                                
                                                <li>
                                                    <i class="icofont-calendar"></i>
                                                    {{ $post->created_at->format('d/m/Y') }}
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
