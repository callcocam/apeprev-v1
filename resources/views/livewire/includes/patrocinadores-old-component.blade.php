@if ($models)
<div class="containe mx-auto bg-white mb-10 mt-10">
    <h1 class="text-3xl text-center">
        Nossos <span class="font-bold text-blue-800">Patrocinadores</span>
    </h1>
    <div x-data="carousel"
        class="flex mx-auto w-full h-72  items-center justify-items-center relative py-6">
        <div class="relative h-full w-64 mx-auto rounded-md flex overflow-y-hidden mb-10">
            <template x-for="(slide, index) in slides" :key="index">
                <a  x-bind:href="slide.link"
                 :class="activeSlide === index ? 'transition translate-y-2 duration-1000 z-10':'transition translate-y-60 duration-1000 z-0'" 
                 class="absolute cursor-pointer w-full h-full items-center justify-items-center flex mb-10 rounded-lg">
                    <div class="mx-auto flex z-0">
                        <img class="object-cover p-5 cursor-pointer" :src="slide.cover" alt="">
                    </div>
                </a>
            </template>            
        </div>
         <!-- Prev/Next Arrows -->
         <div class="absolute inset-0 hidden sm:flex  px-8 z-0 w-full md:w-96 mx-auto">
            <div class="flex items-center justify-start w-1/2">
                <button
                    class="bg-blue-50 text-blue-500 hover:text-orange-500 font-bold hover:shadow-lg rounded-full w-12 h-12 -ml-6"
                    x-on:click="down">
                    &#8592;
                </button>
            </div>
            <div class="flex items-center justify-end w-1/2">
                <button
                    class="bg-blue-50 text-blue-500 hover:text-orange-500 font-bold hover:shadow rounded-full w-12 h-12 -mr-6"
                    x-on:click="up">
                    &#8594;
                </button>
            </div>
        </div>
        <!-- Buttons -->
        <div class="absolute top-60 w-full inset-0 flex items-center justify-center px-4 mb-10 z-30">
            <template x-for="(slide, index) in slides" :key="index">
                <button
                    class="z-40 flex mt-4 mx-2 mb-0 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-blue-600 hover:shadow-lg"
                    :class="{ 
            'bg-orange-600 w-6 h-6': activeSlide === index,
            'bg-blue-300  w-4 h-4': activeSlide !== index 
        }"
                    x-on:click="nav(index)"></button>
            </template>
        </div>
    </div>
</div>
@push('script')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('carousel', () => ({
                timer: 5000,
                activeSlide: 0,
                slides: @json($models),
                init() {
                    setInterval(() => {
                        this.activeSlide = this.activeSlide === this.slides.length - 1 ? 0 :
                            this
                            .activeSlide + 1
                    }, this.timer)
                },
                up() {
                    this.activeSlide = this.activeSlide === this.slides.length - 1 ? 0 : this.activeSlide +
                        1
                },
                down() {
                    this.activeSlide = this.activeSlide === 0 ? this.slides.length - 1 : this.activeSlide -
                        1
                },
                nav(index) {
                    this.activeSlide = index
                }
            }))
        })
    </script>
@endpush
@endif
