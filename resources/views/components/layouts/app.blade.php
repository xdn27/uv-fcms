<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Luthfi Fariz' }}</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css'])
    @endif
</head>

<body>
    <div id="wrapper" class="animsition">
        <div id="loader" class="fh">
            <section class="vcenter">
                <div class="container">
                    <div class="indicator"> <span class="number">0</span><span class="unit">%</span>
                        <div class="loadbar">
                            <div class="inner"></div>
                        </div>
                    </div>
                    <div class="img-count"><span class="loaded"></span><span class="description">images loaded</span></div>
                </div>
            </section>
        </div>
        <header id="main-header">
            <div class="container">
                <div class="grid">
                    <nav class="main-nav">
                        <div class="responsive-nav">
                            <div class="bar"></div>
                            <div class="bar"></div>
                            <div class="bar"></div>
                        </div>
                        <ul class="nav-links">
                            <li class="col-1 brand">
                                <a href="{{ route('landing') }}">
                                    <img alt="Peel" src="{{ asset('images/logo.svg') }}" class="default">
                                </a>
                            </li>
                            <li class="col-1">
                                <a href="{{ route('about') }}" class="nav-link {{ Route::is('about') ? 'active' : '' }}">
                                    About
                                </a>
                            </li>
                            <li class="col-1 col-offset-1">
                                <a href="{{ route('portfolio') }}" class="nav-link {{ Route::is('portfolio') ? 'active' : '' }}">Portfolio</a>
                            </li>
                            <li class="col-1 col-offset-1">
                                <a href="{{ route('blog') }}" class="nav-link {{ Route::is('blog') ? 'active' : '' }}">Journal</a>
                            </li>
                            <li class="col-1 col-offset-1">
                                <a href="{{ route('contact') }}" class="nav-link {{ Route::is('contact') ? 'active' : '' }}">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        {{ $slot }}
    </div>

    <script src="//unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.js"></script>

    <script src="{{ asset('js/template/vendor.js') }}"></script>
    <script src="{{ asset('js/template/img-scroller/img-scroller.js') }}"></script>
    <script src="{{ asset('js/template/tera-lightbox/tera-lightbox.js') }}"></script>
    <script src="{{ asset('js/template/titan-slider/titan-slider.js') }}"></script>
    <script src="{{ asset('js/template/functions.js') }}"></script>

    @vite([
    'resources/js/app.js',
    ])

    @stack('js')

</body>

</html>