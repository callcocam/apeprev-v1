<x-slot name="header">
    <header>
        <!-- Section Hero -->
        <div class="rounded-md flex items-center">
            <div class="flex flex-col text-gray-800 text-center sm:text-left w-full">
                <h1 class="text-4xl font-bold mb-4">
                    Apeprev - Fale conosco
                </h1>
                <section class="flex flex-col w-full">
                    <!-- BEGIN: breadcrums v1 -->
                    <x-breadcrums> Fale conosco</x-breadcrums>
                    <!-- END: breadcrums v1 -->
                </section>
            </div>
        </div>
    </header>
</x-slot>
<x-content class="p-8">
    <div class="flex justify-center items-center bg-white">
        <!-- COMPONENT CODE -->
        <div class="container mx-auto ">
            <x-errors title="We found {errors} validation error(s)" />
            <form wire:submit.prevent="sendMail()"
                class="w-full p-8 my-4 md:px-12 lg:w-9/12 lg:pl-20 lg:pr-40 mr-auto rounded-2xl shadow-2xl">
                <div class="flex">
                    <h1 class="font-bold uppercase text-4xl">Envie-nos um e-mail</h1>
                </div>
                <div class="grid grid-cols-1 gap-5 md:grid-cols-1 mt-5">
                    <input wire:model.defer="data.name"
                        class="w-full bg-gray-100 text-gray-900 mt-2 p-3 @error('data.name') border border-red-300 @enderror rounded-lg focus:outline-none focus:shadow-outline"
                        type="text" placeholder="Nome Completo*">
                </div>
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2 mt-5">
                    <input wire:model.defer="data.email"
                        class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg @error('data.email') border border-red-300 @enderror focus:outline-none focus:shadow-outline"
                        type="email" placeholder="E-mail*">
                    <input wire:model.defer="data.phone"
                        class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
                        type="number" placeholder="Celular*">
                </div>
                <div class="my-4">
                    <textarea wire:model.defer="data.description" placeholder="Sua mensagem*"
                        class="w-full h-32 bg-gray-100  @error('data.description') border border-red-300 @enderror text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"></textarea>

                </div>
                <div class="my-2 w-1/2 lg:w-2/4">
                    <x-button type="submit" primary lg spinner="sendMail" class="uppercase text-sm font-bold tracking-wide bg-blue-900 text-gray-100 p-3 rounded-lg w-full 
                    focus:outline-none focus:shadow-outline" label=" Enviar Email" />
                   
                </div>
            </form>
            <div class="w-full lg:-mt-96 lg:w-2/6 px-8 py-12 ml-auto bg-blue-900 rounded-2xl">
                <div class="flex flex-col text-white">
                    <h1 class="font-bold uppercase text-4xl my-4">Atendimento</h1>
                    <p class="text-gray-400">Das: <br>09:00 às 12:00<br>13:30 às 17:00
                    </p>

                    <div class="flex my-4 w-2/3 lg:w-1/2">
                        <div class="flex flex-col">
                            <i class="fas fa-map-marker-alt pt-2 pr-2">
                            </i>
                        </div><i class="fas fa-map-marker-alt pt-2 pr-2">
                            <div class="flex flex-col">
                                <h2 class="text-2xl">Endereço</h2>
                                <p class="text-gray-400">Av Cândido de Abreu, 660 - Sala 407 - <br>Centro Cívico -
                                    <br>CEP: 80530-010
                                </p>
                            </div>
                        </i>
                    </div><i class="fas fa-map-marker-alt pt-2 pr-2">

                        <div class="flex my-4 w-2/3 lg:w-1/2">
                            <div class="flex flex-col">
                                <i class="fas fa-phone-alt pt-2 pr-2">
                                </i>
                            </div><i class="fas fa-phone-alt pt-2 pr-2">
                                <div class="flex flex-col">
                                    <h2 class="text-2xl">Telefone</h2>
                                    <p class="text-gray-400">(41) 98791-4672</p>

                                </div>
                            </i>
                        </div>
                    </i>
                </div>
            </div>
        </div>
    </div>
</x-content>
