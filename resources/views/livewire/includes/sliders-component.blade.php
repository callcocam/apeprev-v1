<div class="w-full">
    <div class="flex flex-col slider h-60 md:h-72 lg:h-[400px] text-center text-black bg-white mx-auto max-w-7xl">
        @if ($slides = $this->slides)
            @foreach ($slides as $slide)
                <a href="{{ url($slide->url) }}" title="{{ \Str::limit($slide->title, 110) }}">
                    <picture
                        class="bg-gray-600 h-[100%] flex items-center justify-center w-full lazy slide-item{{ $loop->iteration == 1 ? ' active' : '' }}">
                        <source srcset="{{ $slide->cover_url }}" media="(min-width: 600px)">
                        <img class="object-fill h-[100%]" src="{{ $slide->mobile_url }}" alt="MDN">
                    </picture>
                    <div class="slide-content">
                        @if ($slide->head)
                            <button
                                class="text-gray-100 text-3xl bg-blue-600 py-4 px-8 rounded-lg absolute bottom-10 -mx-56">{{ \Str::limit($slide->head, 25) }}</button>
                        @endif
                    </div>
                </a>
            @endforeach
            @if ($this->slides && $this->slides->count() > 1)
                <div class="slider-dots"></div>
                <span class="slider-prev slider-button"></span>
                <span class="slider-next slider-button"></span>
            @endif
        @endif
    </div>
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.1.2/dist/lazyload.min.js"></script>
        <script src="{{ asset('js/slider.js') }}"></script>
        <script>
            window.addEventListener('load', () => {
                var myLazyLoad = new LazyLoad({
                    elements_selector: '.lazy',
                    load_delay: 300
                });
                @if ($this->slides && $this->slides->count() > 1)
                    var slider = new Slider({
                    selector: '.slider',
                    slideSelector: '.slide-item',
                    interval: 5000,
                    });
                @endif
            })
        </script>
    @endpush

    <style>
        /**
    * For AlpineJS
     */
        [x-cloak] {
            display: none;
        }

        .slider {
            width: 100%;
            position: relative
        }

        .slide-item {
            position: absolute;
            width: 100%;
            opacity: 0;
            transition: opacity 0s, transform 0s;
            transition-delay: 1s;
            z-index: 1;
            display: flex;
            align-items: center
        }

        .slide-item.active {
            opacity: 1;
            z-index: 2;
            transition-delay: 0s;
            transition: opacity 1s, transform 1s
        }

        .slide-content {
            text-shadow: rgba(0, 0, 0, 0.5) 0 1px 4px;
            color: #fff;
            width: 100%
        }

        .slide-content P {
            max-width: 50%;
            line-height: 1.5;
            margin: 1em 0
        }

        .slide-item .button {
            display: inline-block;
            background-color: rgba(#fff, 0.3);
            border: 1px solid #fff;
            border-radius: 5px;
            padding: 10px 20px;
            text-shadow: none
        }

        .slide-item .button:hover {
            background-color: #fff;
            color: #000;
            border-color: #fff
        }

        .slider-button {
            display: block;
            position: absolute;
            top: 50%;
            width: 50px;
            height: 50px;
            border-radius: 100px;
            z-index: 10;
            background-color: rgba(#000, .3);
            transform: translateY(-50%);
            transition: background-color .25s;
            cursor: pointer
        }

        .slider-prev {
            left: 2%
        }

        .slider-next {
            right: 2%
        }

        .slider-button:before {
            content: '';
            display: block;
            width: 16px;
            height: 16px;
            border-top: 4px solid #fff;
            border-right: 4px solid #fff;
            transform: rotate(45deg);
            position: absolute;
            top: 15px;
            transition: border-color .25s
        }

        .slider-prev:before {
            transform: rotate(-135deg);
            left: 18px
        }

        .slider-next:before {
            transform: rotate(45deg);
            left: 10px
        }

        .slider-button:hover {
            background-color: #fff
        }

        .slider-button:hover:before {
            border-color: #000
        }

        .slider-dots {
            z-index: 10;
            position: absolute;
            width: 100%;
            text-align: center;
            bottom: 1vw
        }

        .slider-dot {
            display: inline-block;
            background-color: #000;
            border: 1px solid #fff;
            border-radius: 100px;
            width: 17px;
            height: 17px;
            margin: 0 10px;
            color: transparent;
            cursor: pointer;
            transition: background-color 1s;
            overflow: hidden
        }

        .slider-dot.active {
            background-color: #fff
        }

    </style>
</div>
