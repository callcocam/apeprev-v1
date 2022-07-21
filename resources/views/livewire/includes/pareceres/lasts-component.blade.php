<section class="w-full mx-auto  py-0">
    @if ($models->count())
        <h1 class="text-3xl text-center w-full">
            <span class="font-bold"> Pareceres</span>
        </h1>
        <div class="scrollbar-thin overflow-y-scroll">
            @foreach ($models as $model)
                @livewire(lv_includes('pareceres.last'), compact('model'), key($model->id))
            @endforeach
        </div>
    @endif
</section>
