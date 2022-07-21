@if ($models)
    
    <div class="containe mx-auto bg-white mb-10 mt-10">
        <h1 class="text-3xl text-center">
            Nossos <span class="font-bold text-blue-800">Patrocinadores</span>
        </h1>
        <div x-data="carousel" class="flex mx-auto w-full h-72  items-center justify-items-center relative py-6">
            <div class="relative h-full w-64 mx-auto rounded-md flex overflow-y-hidden mb-10">
                @foreach ($models as $model)               
                    <a x-ref="boxElement" href="{{ $model->link }}"
                        class="absolute cursor-pointer w-full h-full items-center justify-items-center flex mb-10 rounded-lg transition duration-1000 z-10"
                        >
                        <div class="mx-auto flex z-0">
                            <img class="object-cover p-5 cursor-pointer" src="{{\Storage::url($model->image->cover)}}" alt="">
                        </div>
                    </a>
                @endforeach
            </div>
            {{$models->onEachSide(2)->links()}}
        </div>
    </div>
@endif
