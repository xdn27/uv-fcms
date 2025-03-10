<div>
    <div id="inner">
        <section class="mb-xl">
            <div class="container mb-md">
                <div class="grid">
                    <div class="col-3">
                        <h2 class="grid-title">Projects</h2>
                    </div>
                    <div class="col-5 text-right">
                        <nav id="filters">
                            <ul class="filters">
                                <li> <a href="#" data-filter="grid-item" class="active filter">All</a></li>
                                @foreach($categories as $category)
                                <li><a href="#" data-filter="{{$category->slug}}" class="filter">{{$category->title}}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container">
                <div id="project-grid" class="masonry-grid">
                    @forelse($entries as $post)
                    <a href="{{ route('portfolio_detail', ['slug' => $post->slug]) }}" class="{{$post->stringCategory('slug', ' ')}} grid-item col-2">
                        <div class="thumb"><img src="{{ asset('storage/'.$post->banner) }}"></div>
                        <div class="caption">
                            <div class="title">{{$post->title}}</div>
                            <div class="subtitle">{{$post->stringCategory('title', ', ')}}</div>
                        </div>
                    </a>
                    @empty
                    <div class="mt-xl mb-lg">
                        No portfolio published
                    </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
    <x-footer />
</div>
