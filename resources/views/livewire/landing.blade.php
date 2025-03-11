<div id="inner">
    <section class="behind-header">
        <div id="home-slider" class="titanSlider fh fw">
            <ul class="slides">

                @forelse($entries as $post)
                <li class="slide dark">
                    <div class="hero fs">
                        <div style="background-image: url('{{ asset('storage/'.$post->banner) }}');" class="bg faded"></div>
                        <div class="vcenter">
                            <div class="container">
                                <div class="grid">
                                    <div class="col-1">{{ $post->post_at->format('Y') }}</div>
                                    <div class="col-7">
                                        <div class="label">{{ $post->post_at->format('F') }}</div><a href="{{ route('portfolio_detail', ['slug' => $post->slug]) }}" class="project-link">
                                            <h1 class="stripe animatedText tw:font-bold">{{ $post->title }}</h1>
                                        </a>
                                        @foreach($post->categories ?? [] as $category)
                                        <div class="label">{{ $category->title }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @empty
                @endforelse

            </ul>
        </div>
    </section>
</div>

@script
<script>
$('#home-slider').titanSlider();
</script>
@endscript

@push('js')

@endpush
