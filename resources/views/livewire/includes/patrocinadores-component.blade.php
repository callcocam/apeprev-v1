@if ($models)
    <div class="w-full  flex flex-col mx-auto bg-white mb-10 mt-10  bg-gradient-to-r from-transparent via-gray-200 to-transparent">
        <h1 class="text-3xl text-center">
            Nossos <span class="font-bold text-blue-800">Patrocinadores</span>
        </h1>
        <div id="carouselExampleCaptions" class="carousel slide relative carousel-dark mt-5" data-bs-ride="carousel">
            <div class="carousel-inner relative w-full overflow-hidden">
                @foreach ($models as $item)
                    <div
                        class="carousel-item @if ($loop->first) active @endif relative float-left w-full text-center">
                        <div class="mt-0 mb-10 flex justify-center">
                            <img src="{{ $item->cover_url }}" class="rounded-md w-56 h-56 shadow-lg"
                                alt="smaple image" />
                        </div>
                    </div>
                @endforeach
            </div>
            <button
                class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
                type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
                type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endif
