@if ($models->count())
    <section class="overflow-x-hidden py-12 bg-white relative flex flex-col mb-6">
        <div class="mt-6 flex flex-col lg:flex-row lg:space-x-6 ">
            <div class="w-full flex flex-col lg:space-x-3 ">
                <h1 class="text-4xl text-center w-full  mt-3">
                    <span class="font-bold"> Eventos / Workshop</span>
                </h1>
                <div class="flex flex-col md:flex-row lg:space-x-3 mt-5 px-5">
                    @if ($models)
                        @foreach ($models as $model)
                            @livewire(lv_includes('eventos.show'), compact('model'), key($model->id))
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif
