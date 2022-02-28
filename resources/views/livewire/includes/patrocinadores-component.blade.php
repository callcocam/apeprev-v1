@if ($models)
    <div class="max-w-7xl flex flex-col mx-auto bg-white mb-10 mt-10">
        <h1 class="text-3xl text-center">
            Nossos <span class="font-bold text-blue-800">Patrocinadores</span>
        </h1>
        <div x-data="carousel" class="flex mx-auto max-w-4xl h-72  items-center  py-6 relative">
            <ul class="flex flex-col md:flex-row space-x-2 p-2 transition-all">
                @foreach ($models as $item)
                    <li class="">
                        <a href="{{ $item->link }}">
                            <img src="{{ $item->cover_url }}" alt="">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        {{-- <button wire:click="$set('limit',1)">1</button>
        <button wire:click="$set('limit',2)">2</button>
        <button wire:click="$set('limit',3)">3</button> --}}
    </div>

    @push('script')
        <script>
            window.addEventListener('resize', function(event) {
                var newWidth = window.innerWidth;
                var newHeight = window.innerHeight;
                console.log(newWidth)
            });
            document.addEventListener('alpine:init', () => {
                Alpine.data('carousel', () => ({
                    timer: 1000,
                    activeSlide: 0,
                    init() {
                        console.log('aq')
                        setInterval(() => {
                            Livewire.emit('increment')
                        }, this.timer);
                       // resize()
                        // this.$interval(() => {
                        //     this.activeSlide = this.activeSlide === this.slides.length - 1 ? 0 :
                        //         this
                        //         .activeSlide + 1
                        // }, {
                        //     timer: this.timer,
                        //     delay: 5000
                        // })
                    },
                    up() {
                        this.activeSlide = this.activeSlide === this.slides.length - 1 ? 0 : this
                            .activeSlide +
                            1
                    },
                    down() {
                        this.activeSlide = this.activeSlide === 0 ? this.slides.length - 1 : this
                            .activeSlide -
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
