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
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <ul :class="{ 'block': open, 'hidden': !open }"
            class="hidden md:flex md:items-center flex-col md:flex-row w-full">
            {{-- START MENU --}}
            <x-tall-toggleable label="OPERACIONAL">
                {{-- START SUB MENU --}}
                <x-tall-toggleable-dropdown label="USERS" border="r" width="w-1/5" class="lg:w-1/5">
                    <x-tall-toggleable-link component="Users\ListComponent" path="Admin"/>
                    <x-tall-toggleable-link component="Users\CreateComponent" path="Admin"/>
                    
                </x-tall-toggleable-dropdown>
                {{-- END SUB MENU --}}
                {{-- START SUB MENU --}}
                <x-tall-toggleable-dropdown label="ROLES">
                    <x-tall-toggleable-link component="Roles\ListComponent" path="Admin"/>
                    <x-tall-toggleable-link component="Roles\CreateComponent" path="Admin"/>
                </x-tall-toggleable-dropdown>
                {{-- END SUB MENU --}}
                {{-- START SUB MENU --}}
                <x-tall-toggleable-dropdown label="PERMISSÕES">
                      <x-tall-toggleable-link component="Permissions\ListComponent" path="Admin"/>
                    <x-tall-toggleable-link component="Permissions\CreateComponent" path="Admin"/>
                </x-tall-toggleable-dropdown>
                {{-- END SUB MENU --}}
                {{-- START SUB MENU --}}
                <x-tall-toggleable-dropdown label="CARGOS">
                    <x-tall-toggleable-link component="Officies\ListComponent" path="Admin"/>
                    <x-tall-toggleable-link component="Officies\CreateComponent" path="Admin"/>
                </x-tall-toggleable-dropdown>
                {{-- END SUB MENU --}}
                {{-- START SUB MENU --}}
                <x-tall-toggleable-dropdown label="PAGES" border="none">
                    <x-tall-toggleable-link component="Pages\ListComponent" path="Admin"/>
                    <x-tall-toggleable-link component="Pages\CreateComponent" path="Admin"/>
                </x-tall-toggleable-dropdown>
                {{-- END MENU --}}
            </x-tall-toggleable>
            <x-tall-toggleable label="CADASTROS">
                {{-- START SUB MENU --}}
                <x-tall-toggleable-dropdown label="Posts">
                    <x-tall-toggleable-link component="Posts\ListComponent" path="Admin"/>
                    <x-tall-toggleable-link component="Posts\CreateComponent" path="Admin"/>
                </x-tall-toggleable-dropdown>
                {{-- END SUB MENU --}}
                {{-- START SUB MENU --}}
                <x-tall-toggleable-dropdown label="Sliders">
                    <x-tall-toggleable-link component="Sliders\ListComponent" path="Admin"/>
                    <x-tall-toggleable-link component="Sliders\CreateComponent" path="Admin"/>
                </x-tall-toggleable-dropdown>
                {{-- END MENU --}}
                {{-- START SUB MENU --}}
                <x-tall-toggleable-dropdown label="Sponsors" border="none">
                    <x-tall-toggleable-link component="Sponsor\ListComponent" path="Admin"/>
                    <x-tall-toggleable-link component="Sponsor\CreateComponent" path="Admin"/>
                </x-tall-toggleable-dropdown>
                {{-- END MENU --}}
            </x-tall-toggleable>
            <x-tall-toggleable label="EVENTOS">
                {{-- START SUB MENU --}}
                <x-tall-toggleable-dropdown label="Palestras">
                    <x-tall-toggleable-link component="Eventos\Palestras\ListComponent" path="Admin"/>
                    <x-tall-toggleable-link component="Eventos\Palestras\CreateComponent" path="Admin"/>
                </x-tall-toggleable-dropdown>
                {{-- END SUB MENU --}}
                {{-- START SUB MENU --}}
                <x-tall-toggleable-dropdown label="Hotel">
                    <x-tall-toggleable-link component="Eventos\Hotel\ListComponent" path="Admin"/>
                    <x-tall-toggleable-link component="Eventos\Hotel\CreateComponent" path="Admin"/>
                </x-tall-toggleable-dropdown>
                {{-- END SUB MENU --}}
                {{-- START SUB MENU --}}
                <x-tall-toggleable-dropdown label="Eventos" border="none">
                    <x-tall-toggleable-link component="Eventos\ListComponent" path="Admin"/>
                    <x-tall-toggleable-link component="Eventos\CreateComponent" path="Admin"/>
                </x-tall-toggleable-dropdown>
                {{-- END SUB MENU --}}
            </x-tall-toggleable>
            {{-- START MENU --}}
            <x-tall-toggleable label="ASSOCIAÇÃO">
                <x-tall-toggleable-dropdown label="Intituições">
                    <x-tall-toggleable-link component="Instituicoes\ListComponent" path="Admin"/>
                    <x-tall-toggleable-link component="Instituicoes\CreateComponent" path="Admin"/>
                </x-tall-toggleable-dropdown>
                {{-- END SUB MENU --}}
                {{-- START SUB MENU --}}
                <x-tall-toggleable-dropdown label="Certidões" border="none">
                    <x-tall-toggleable-link component="Certidoes\ListComponent" path="Admin"/>
                    <x-tall-toggleable-link component="Certidoes\CreateComponent" path="Admin"/>
                </x-tall-toggleable-dropdown>
                {{-- START SUB MENU --}}
            </x-tall-toggleable>
            <x-tall-toggleable label="TRANSPARÊNCIAS">
                {{-- START SUB MENU --}}
                <x-tall-toggleable-dropdown label="Tipo">
                    <x-tall-toggleable-link component="Transparencias\Tipos\ListComponent" path="Admin"/>
                    <x-tall-toggleable-link component="Transparencias\Tipos\CreateComponent" path="Admin"/>
                </x-tall-toggleable-dropdown>
                {{-- END SUB MENU --}}
                {{-- START SUB MENU --}}
                <x-tall-toggleable-dropdown label="Detalhes">
                    <x-tall-toggleable-link component="Transparencias\Detalhes\ListComponent" path="Admin"/>
                    <x-tall-toggleable-link component="Transparencias\Detalhes\CreateComponent" path="Admin"/>
                </x-tall-toggleable-dropdown>
                {{-- END SUB MENU --}}
                {{-- START SUB MENU --}}
                <x-tall-toggleable-dropdown label="Transparência" border="none">
                    <x-tall-toggleable-link component="Transparencias\ListComponent" path="Admin"/>
                    <x-tall-toggleable-link component="Transparencias\CreateComponent" path="Admin"/>
                </x-tall-toggleable-dropdown>
                {{-- END MENU --}}
            </x-tall-toggleable>
            {{-- <x-tall-navlink component="PortalTransparenciaComponent" /> --}}
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
