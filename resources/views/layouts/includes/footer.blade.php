<footer class="max-w-screen mb-0">
    <div class="text-gray-600 body-font bg-gray-700">
        <x-content>
            <div
                class="px-5 py-10 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col w-full">
                <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center">
                    <a class="flex title-font font-medium items-center justify-center text-gray-900">
                        <img src="https://www.rppsonline.com.br/assets/images/logo.png" alt="logo" style="height:85px;">
                    </a>
                    <p class="mt-2 text-sm text-white">CNJP: 05.763.089/0001-61</p>
                    <p class="text-sm text-white">Av. Candido de Abreu, 660 - Sala 407 - Centro Cívico</p>
                    <p class="text-sm text-white">CEP: 80530-010 | Curitiba-PR</p>
                    <p class="text-sm text-white">(41) 98791-4672</p>
                </div>
                <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center">
                    <div class="lg:w-1/3 md:w-1/2 w-full px-4">
                        <h2 class="title-font font-bold text-white tracking-widest text-md mb-3">INSTITUCIONAL</h2>
                        <ul class="list-none mb-5 text-xs space-y-2">
                            <li>
                                <a class="text-white hover:text-blue-600" href="{{ route('home') }}">A
                                    APEPREV</a>
                            </li>
                            <li>
                                <x-tall-link component="Associacao\CertidoesComponent" />
                            </li>
                            <li>
                                <x-tall-link component="Associacao\StatusSocialComponent" />
                            </li>
                            {{-- <li>
                                <a class="text-white hover:text-blue-600" href="#">RESOLUÇÃO</a>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="lg:w-1/3 md:w-1/2 w-full px-4">

                        <h2 class="title-font font-bold text-white tracking-widest text-md mb-3">SERVIÇOS</h2>

                        <ul class="list-none mb-5 space-y-2  text-xs">
                            <li>
                                <x-tall-link component="Associados\RecadastreSeComponent" />
                            </li>
                            <li>
                                <x-tall-link component="Associacao\ConvocacaoConselhoComponent" />
                            </li>
                        </ul>
                    </div>
                    <div class="lg:w-1/3 md:w-1/2 w-full px-4">
                        <div>
                            @livewire('includes.newsletters-component', key(uniqId("letters")))
                        </div>
                    </div>

                </div>
            </div>
        </x-content>
    </div>
    <div class="bg-gray-900">
        <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
            <p class="text-white text-sm text-center sm:text-left">© 2021 Dev —
                <a href="https://www.webpaes.com.br" rel="noopener noreferrer" class="text-gray-400 ml-1"
                    target="_blank">WebPaes</a>
            </p>
            <div class="md:flex-auto md:flex-row-reverse mt-2 flex-row flex">
                <a href="https://www.twitter.com/" class="w-6 mx-1">
                    <svg class="fill-current cursor-pointer text-gray-500 hover:text-gray-400" width="100%"
                        height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
                        xmlns:serif="http://www.serif.com/"
                        style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                        <path id="Twitter" d="M24,12c0,6.627 -5.373,12 -12,12c-6.627,0 -12,-5.373 -12,-12c0,-6.627
                    5.373,-12 12,-12c6.627,0 12,5.373 12,12Zm-6.465,-3.192c-0.379,0.168
                    -0.786,0.281 -1.213,0.333c0.436,-0.262 0.771,-0.676
                    0.929,-1.169c-0.408,0.242 -0.86,0.418 -1.341,0.513c-0.385,-0.411
                    -0.934,-0.667 -1.541,-0.667c-1.167,0 -2.112,0.945 -2.112,2.111c0,0.166
                    0.018,0.327 0.054,0.482c-1.754,-0.088 -3.31,-0.929
                    -4.352,-2.206c-0.181,0.311 -0.286,0.674 -0.286,1.061c0,0.733 0.373,1.379
                    0.94,1.757c-0.346,-0.01 -0.672,-0.106 -0.956,-0.264c-0.001,0.009
                    -0.001,0.018 -0.001,0.027c0,1.023 0.728,1.877 1.694,2.07c-0.177,0.049
                    -0.364,0.075 -0.556,0.075c-0.137,0 -0.269,-0.014 -0.397,-0.038c0.268,0.838
                    1.048,1.449 1.972,1.466c-0.723,0.566 -1.633,0.904 -2.622,0.904c-0.171,0
                    -0.339,-0.01 -0.504,-0.03c0.934,0.599 2.044,0.949 3.237,0.949c3.883,0
                    6.007,-3.217 6.007,-6.008c0,-0.091 -0.002,-0.183 -0.006,-0.273c0.413,-0.298
                    0.771,-0.67 1.054,-1.093Z"></path>
                    </svg>
                </a>
                <a href="https://www.facebook.com/Apeprev-Associa%C3%A7%C3%A3o-Paranaense-das-Entidades-Previdenci%C3%A1rias-549811631723281"
                    class="w-6 mx-1">
                    <svg class="fill-current cursor-pointer text-gray-500 hover:text-gray-400" width="100%"
                        height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
                        xmlns:serif="http://www.serif.com/"
                        style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                        <path id="Facebook" d="M24,12c0,6.627 -5.373,12 -12,12c-6.627,0 -12,-5.373 -12,-12c0,-6.627
                    5.373,-12 12,-12c6.627,0 12,5.373
                    12,12Zm-11.278,0l1.294,0l0.172,-1.617l-1.466,0l0.002,-0.808c0,-0.422
                    0.04,-0.648 0.646,-0.648l0.809,0l0,-1.616l-1.295,0c-1.555,0 -2.103,0.784
                    -2.103,2.102l0,0.97l-0.969,0l0,1.617l0.969,0l0,4.689l1.941,0l0,-4.689Z"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>
