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

    <section class="tw:bg-black tw:pt-24 tw:pb-12">
        <div class="container tw:mx-auto">
            <div class="">
                <div class="tw:grid tw:grid-cols-12 tw:gap-10">
                    <div class="tw:col-span-12 tw:lg:col-span-5 tw:flex tw:flex-col tw:justify-between">
                        <div class="tw:mb-12 tw:text-xl">Project</div>
                        <div class="tw:text-4xl tw:font-extralight">
                            <p>
                                My focus is on creating sustainable value that can be <strong>effectively</strong> implemented and endure over the long term.
                            </p>
                        </div>
                    </div>
                    <div class="tw:col-span-12 tw:lg:col-span-7 tw:flex tw:flex-col tw:justify-between">
                        <div class="tw:text-xl tw:font-extralight tw:mb-10 tw:lg:mb-0">
                            <p>
                                I am fully committed to delivering the best solutions, recognizing that every aspect of design is guided by my clients ambitions and goals.
                            </p>
                        </div>
                        <div class="tw:flex tw:gap-5">
                            <x-element.button class="tw:flex-grow-1" href="{{ route('portfolio') }}">EXPLORE MORE</x-element.button>
                            <x-element.button-circle class="tw:flex-shrink-0" href="javascript:void(0)">
                                <i class="fa fa-chevron-left fa-lg tw:group-hover:text-black!"></i>
                            </x-element.button-circle>
                            <x-element.button-circle class="tw:flex-shrink-0" href="javascript:void(0)">
                                <i class="fa fa-chevron-right fa-lg tw:group-hover:text-black!"></i>
                            </x-element.button-circle>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 
        <div class="">
            <div class="swiper project-swiper">
                <div class="swiper-wrapper">
                    @for($i = 0; $i < 10; $i++)
                        <div class="swiper-slide tw:w-[615px]! tw:h-[615px]! tw:flex-shrink-0! tw:bg-slate-300">
                            <img src="https://picsum.photos/615?random={{ $i }}" class="tw:w-full tw:h-full tw:object-cover"/>
                        </div>
                    @endfor
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    --}}

    <section class="tw:bg-black tw:pt-24 tw:pb-12">
        <div class="container tw:mx-auto">
            <div class="">
                <div class="tw:grid tw:grid-cols-12 tw:gap-10">
                    <div class="tw:col-span-12 tw:lg:col-span-5 tw:flex tw:flex-col tw:justify-between">
                        <div class="tw:mb-12 tw:text-xl">Profile</div>
                        <div class="tw:text-xl tw:font-extralight">
                            <p>
                                Luthfi views design as a universal language of communication, one that can make a meaningful contribution and create positive impact by offering solutions to the problems around us.
                            </p>
                        </div>
                    </div>
                    <div class="tw:col-span-12 tw:lg:col-span-7 tw:flex tw:flex-col tw:justify-between tw:gap-10">
                        <div class="tw:text-5xl tw:font-extralight">
                            <p>
                                A <strong>multidisciplinary</strong> designer with a career in the design industry since 2014
                            </p>
                        </div>
                        <div class="tw:flex tw:gap-5">
                            <x-element.button class="" href="{{ route('portfolio') }}">LEARN MORE</x-element.button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tw:bg-black tw:pt-24 tw:pb-12">
        <div class="container tw:mx-auto">
            <div class="">
                <div class="tw:text-xl">Service</div>
                <div class="tw:grid tw:grid-cols-12 tw:gap-10">
                    <div class="tw:col-span-12 tw:lg:col-span-5 tw:flex tw:flex-col tw:relative">
                        <div class="tw:sticky tw:top-0">
                            <div class="tw:text-xl tw:font-extralight tw:py-10">
                                <div class="tw:h-96 tw:bg-gray-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tw:col-span-12 tw:lg:col-span-7">
                        @foreach([
                            'Branding & Visual Identity',
                            'Packaging & Printed',
                            'UI/UX',
                            'Motion & Animation',
                            'Campaign & Promotional Media',
                            'Social Media Development',    
                        ] as $i => $item)
                        <div class="tw:group tw:opacity-50 tw:hover:opacity-100 tw:transition">
                            <div class="tw:flex tw:gap-2 tw:py-10 tw:cursor-pointer tw:items-start">
                                <div class="tw:w-16 tw:flex-shrink-0">{{ str_pad($i+1, 2, 0, STR_PAD_LEFT) }}.</div>
                                <div class="tw:text-6xl tw:flex-grow tw:uppercase tw:font-bold">{{ $item }}</div>
                            </div>
                            <div class="tw:border-b">
                                <div class="tw:grid tw:lg:hidden tw:grid-rows-[0fr] tw:group-hover:grid-rows-[1fr] tw:transition-all">
                                    <div class="tw:overflow-hidden">
                                        <div class="tw:bg-gray-500 tw:h-20"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@script
<script>
    $('#home-slider').titanSlider();

    var swiper = new Swiper(".project-swiper", {
        slidesPerView: 'auto',
        spaceBetween: 15,
        centeredSlides: true,
        loop: true
    });
</script>
@endscript

@push('js')

@endpush