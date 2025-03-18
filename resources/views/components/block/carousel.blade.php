@props(['data'])
<div class="tw:h-[700px]" x-data='carousel({ slides: @json($data["images"]), assetUrl: "{{ asset("storage") }}" })'>
    <div class="tw:relative tw:h-[inherit] tw:w-full tw:overflow-hidden">

        <div class="tw:relative tw:h-[inherit] tw:w-full">
            <template x-for="(slide, index) in slides">
                <div x-cloak x-show="currentSlideIndex == index + 1" class="tw:absolute tw:inset-0" x-transition.opacity.duration.1000ms>
                    <img class="tw:absolute tw:w-full tw:h-full tw:inset-0 tw:object-cover tw:text-slate-700 tw:dark:text-slate-300" x-bind:src="assetUrl+'/'+slide" />
                    <div class="tw:bg-gradient-to-t tw:from-black from-20% tw:lg:from-40% absolute tw:h-full tw:w-full tw:-bottom-1/3 tw:lg:-bottom-1/2"></div>
                </div>
            </template>
        </div>

        <div class="tw:absolute tw:rounded-2xl tw:bottom-3 tw:md:bottom-5 tw:left-1/2 tw:z-20 tw:flex tw:items-center tw:-translate-x-1/2 tw:px-1.5 tw:py-1 tw:md:px-2" role="group" aria-label="slides">
            <button class="tw:inline-flex tw:justify-center tw:items-center tw:cursor-pointer tw:border tw:border-white tw:hover:bg-white tw:rounded-full tw:transition-all tw:mr-8! tw:text-xl tw:size-12" x-on:click="previous()">
                <i class="fa fa-chevron-left fa-lg tw:hover:text-black!"></i>
            </button>
            <template x-for="(slide, index) in slides">
                <button class="tw:size-3 tw:cursor-pointer tw:rounded-full tw:transition" x-on:click="currentSlideIndex = index + 1" x-bind:class="[currentSlideIndex === index + 1 ? 'tw:bg-white tw:w-12' : 'tw:bg-slate-300/50']" x-bind:aria-label="'slide ' + (index + 1)"></button>
            </template>
            <button class="tw:inline-flex tw:justify-center tw:items-center tw:cursor-pointer tw:border tw:border-white tw:hover:bg-white tw:rounded-full tw:transition-all tw:ml-8! tw:text-xl tw:size-12" x-on:click="next()">
                <i class="fa fa-chevron-right fa-lg tw:hover:text-black!"></i>
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            
            Alpine.data('carousel', (carouselData = {
                slides: [],
                assetUrl: null,
            }, ) => ({
                slides: carouselData.slides,
                assetUrl: carouselData.assetUrl,
                currentSlideIndex: 1,
                previous() {
                    if (this.currentSlideIndex > 1) {
                        this.currentSlideIndex = this.currentSlideIndex - 1
                    } else {
                        // If it's the first slide, go to the last slide           
                        this.currentSlideIndex = this.slides.length
                    }
                },
                next() {
                    if (this.currentSlideIndex < this.slides.length) {
                        this.currentSlideIndex = this.currentSlideIndex + 1
                    } else {
                        // If it's the last slide, go to the first slide    
                        this.currentSlideIndex = 1
                    }
                },
            }))
        })
    </script>
</div>