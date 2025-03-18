<div>
    <div id="inner">
        <section class="nmb behind-header">
            <div class="hero">
                <div style="background-image: url('{{ asset('storage/'.$post->banner) }}');" class="bg faded"></div>
                <div class="vcenter">
                    <div class="container mb-xl">
                        <div class="grid">
                            <div class="col-1">{{ $post->post_at->format('Y') }}</div>
                            <div class="col-7">
                                <div class="label">{{ $post->post_at->format('F') }}</div>
                                <h1 class="animatedText">{{ $post->title }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        

        @if($post->is_using_builder)
            @blocks($post->body_json)
        @else
            {!! $post->body_html !!}
        @endif  
                
        <section class="mb-xl">
            <div class="container">
                <div class="grid content">
                    <div id="img-carousel" class="titanSlider">
                        <ul class="slides">
                            <li class="slide"><img src="{{ asset('images/projects/thumb-01-wide.jpg') }}" class="fw"></li>
                            <li class="slide"><img src="{{ asset('images/projects/thumb-02-wide.jpg') }}" class="fw"></li>
                            <li class="slide"><img src="{{ asset('images/projects/thumb-03-wide.jpg') }}" class="fw"></li>
                            <li class="slide"><img src="{{ asset('images/projects/thumb-05-wide.jpg') }}" class="fw"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


        <section class="prev-next-container mb-xl">
            <div class="container">
                <div class="grid content">
                    <div class="col-4">
                        @if($prev)
                        <div class="vcenter link-container"><a href="{{ route('portfolio_detail', ['slug' => $prev->slug]) }}" class="prev-link">
                                <div class="project-title">{{ $prev->title }}</div>
                                <div class="link-title">Previous</div>
                            </a></div>
                        @else
                        &nbsp;
                        @endif
                    </div>
                    <div class="col-4">
                        @if($next)
                        <div class="vcenter link-container text-right"><a href="{{ route('portfolio_detail', ['slug' => $next->slug]) }}" class="next-link">
                                <div class="project-title">{{ $next->title }}</div>
                                <div class="link-title">Next</div>
                            </a></div>
                        @else
                        &nbsp;
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
    <x-footer />
</div>