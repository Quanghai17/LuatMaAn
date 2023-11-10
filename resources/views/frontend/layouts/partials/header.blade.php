@php
  $menu = menu('home_menu', '_json');
@endphp
<div class="loader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div>
    </div>
</div>
<div class="navbar-area fixed-top">

    <div class="mobile-nav">
        <a href="{{route('home')}}" class="logo">
            <img src="{{ Voyager::image(setting('site.logo')) }}" alt="Logo">
        </a>
    </div>

    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{ Voyager::image(setting('site.logo')) }}" alt="Logo" style="width: 180px;max-width: 200%;">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        @foreach ($menu as $item)
                        <li class="nav-item "> 
                            <a href="{{ url($item->url) }}" class="nav-link @if (count($item->children) > 0) dropdown-toggle @endif @if($item->url == "/".request()->segment(1)) active @endif"> 
                            {{ $item->translate()->title }} 
                            </a>
                            @if (count($item->children) > 0)
                            <ul class="dropdown-menu" style="width: max-content;">
                                @foreach ($item->children as $child)
                                <li class="nav-item @if(url($child->url) == url()->current()) active @endif">
                                    <a href="{{ url($child->url) }}">{{ $child->translate()->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>