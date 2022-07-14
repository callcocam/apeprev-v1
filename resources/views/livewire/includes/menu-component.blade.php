<nav x-data="{ open: false }" class="relative bg-white border-b-2 border-gray-300 text-gray-900">
    <div class="container md:max-w-6xl mx-auto flex flex-col md:flex-row md:items-center justify-between ">
        <div class="relative  justify-between flex p-1 text-xl text-gray-600 font-bold">
            <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center">
                <x-jet-application-logo class="h-14 w-auto" />
            </a>
            <!-- Hamburger -->
            <div class="mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <ul :class="{'block': open, 'hidden': ! open}"
            class="hidden md:flex md:items-center flex-col md:flex-row w-full">
            <x-tall-toggleable label="A APEPREV">
                <x-tall-toggleable-dropdown label="ASSOCIAÇÃO">
                    <x-tall-toggleable-link component="Associacao\SobreNosComponent" />
                    <x-tall-toggleable-link component="Associacao\CertidoesComponent" />
                    {{-- <x-tall-toggleable-link component="Associacao\AtualizacaoSalarioComponent" /> --}}
                    <x-tall-toggleable-link component="Associacao\StatusSocialComponent" />
                    {{-- <x-tall-toggleable-link component="Associacao\RegrasInternasComponent" /> --}}
                    <x-tall-toggleable-link component="Associacao\RegulacaoEleitoralComponent" />
                    {{-- <x-tall-toggleable-link component="Associacao\LegislacaoComponent" /> --}}
                    <x-tall-toggleable-link component="Associacao\GestaoComponent" />
                    <x-tall-toggleable-link component="Associacao\GestoesAnterioresComponent" />
                    <x-tall-toggleable-link component="Associacao\GaleriaDosPresidentesComponent" />
                    <x-tall-toggleable-link component="Associacao\ConvocacaoConselhoComponent" />
                </x-tall-toggleable-dropdown>
                <x-tall-toggleable-dropdown label="SERVIÇOS">
                    {{-- <x-tall-toggleable-link component="Servicos\CarteiraDeMembroComponent" /> --}}
                    <x-tall-toggleable-link component="Servicos\CalculadoraComprevComponent" />
                    <x-tall-toggleable-link component="Servicos\InformativoApeprevComponent" />
                </x-tall-toggleable-dropdown>
                <x-tall-toggleable-dropdown label="ASSOCIADOS" border="none">
                    <x-tall-toggleable-link component="Associados\RecadastreSeComponent" />
                    <x-tall-toggleable-link component="Associados\PareceresComponent" />
                    <x-tall-toggleable-link component="Associados\AssociadosComponent" />
                </x-tall-toggleable-dropdown>
            </x-tall-toggleable>
            <x-tall-hoverable label="EVENTOS">
                <x-tall-hoverable-link component="Eventos\ListComponent" />
                <x-tall-hoverable-link component="Eventos\CertificadosComponent" border="none" />
                {{-- @if ($model = \App\Models\Event::query()->where('inscrevase', 1)->first())
                    <x-tall-hoverable-link component="Eventos\Inscricoes\IniciarComponent" border="none" :model="$model"/>
                @endif --}}
            </x-tall-hoverable>
            <x-tall-navlink component="Noticias\ListComponent" />
            <x-tall-navlink component="PortalTransparenciaComponent" />
            <x-tall-navlink component="FaleConoscoComponent" />
            <x-tall-navlink component="CalculadoraComprevComponent" />
            <x-tall-navlink component="Associados\RecadastreSeComponent" />
        </ul>
    </div>

    <style>
        /* #Mega Menu Styles
  if you use sass, convert all this additional css to tailwindcss using the 'hack' @apply for all element.style (css properties)
[ https://tailwindcss.com/docs/functions-and-directives/#apply ]
example:
  .mega-menu {
  @apply
  hidden
  left-0
  absolute
  text-left
  w-full;
  }
  –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .mega-menu {
            display: none;
            left: 0;
            position: absolute;
            text-align: left;
            width: 100%;
            z-index: 1000;
        }



        /* #hoverable Class Styles */
        .hoverable {
            position: static;
        }

        .hoverable>a:after {
            content: "\25BC";
            font-size: 10px;
            padding-left: 6px;
            position: relative;
            top: -1px;
        }

        .hoverable:hover .mega-menu {
            display: block;
        }


        /* #toggle Class Styles */

        .toggleable>label:after {
            content: "\25BC";
            font-size: 10px;
            padding-left: 6px;
            position: relative;
            top: -1px;
        }

        .toggle-input {
            display: none;
        }

        .toggle-input:not(checked)~.mega-menu {
            display: none;
        }

        .toggle-input:checked~.mega-menu {
            display: block;
        }

        .toggle-input:checked+label {
            color: white;
            background: rgb(3, 102, 114);
            /*@apply bg-teal-700 */
        }

        .toggle-input:checked~label:after {
            content: "\25B2";
            font-size: 10px;
            padding-left: 6px;
            position: relative;
            top: -1px;
        }

    </style>

</nav>
