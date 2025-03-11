<div>
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
                                @if(isset($site['logo']) && !empty($site['logo']))
                                <img alt="Peel" src="{{ asset('storage/'.$site['logo']) }}" class="default">
                                @elseif(isset($site['site_name']) && !empty($site['site_name']))
                                <span class="tw:font-bold tw:text-3xl tw:me-3">{{ $site['site_name'] }}</span>
                                @else
                                <img alt="Peel" src="{{ asset('images/logo.svg') }}" class="default">
                                @endif
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
</div>