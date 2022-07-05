<x-slot name="header">
    <header>
        <!-- Section Hero -->
        <div class="rounded-md flex items-center">
            <div class="flex flex-col text-gray-800 text-center sm:text-left w-full">
                <h1 class="text-4xl font-bold mb-4">
                    Apeprev - Carteira De Associado
                </h1>
                <section class="flex flex-col w-full">
                    <!-- BEGIN: breadcrums v1 -->
                    <x-breadcrums> Carteira De Associado</x-breadcrums>
                    <!-- END: breadcrums v1 -->
                </section>
            </div>
        </div>
    </header>
</x-slot>
<x-content class="mt-5">
    <div class="flex w-full">
        <div class="rounded-lg">
            <div class="bg-gray-100 rounded-lg w-full">
                <div class="px-10 py-6 mb-10 text-left">
                    <div class="mb-4 text-3xl font-bold text-blue-900 uppercase">AVISOS E DOCUMENTOS NECESSÁRIOS
                        PARA SOLICITAR A CARTEIRINHA DE ASSOCIADO</div>
                    <span class="text-sm text-black font-bold">
                        Digitalizar e enviar para o e-mail <span class="text-blue-500">apeprev@apeprev.com.br</span> os
                        seguintes documentos:
                        <br>
                        1. Decreto de Posse - Cargo Público.
                        <br>
                        2. RG, CPF (CNH).
                        <br>
                        3. Comprovante de Endereço.
                        <br>
                        4. Foto 3x4.
                        <br>
                        5. Holerite do Último Mês.
                        <br>
                        <p class="text-blue-500">Caso os comprovantes necessários não sejam enviados, o cadastro
                            não será aprovado.</p>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <section>
        <section class="container mx-auto mt-5">
            <div class="flex w-full items-center justify-center">
                <div class="rounded-lg">
                    <div class="bg-gray-100 rounded-lg w-full">
                        <div class="px-10 py-6 mb-10 text-left">
                            <div class="mb-4 text-3xl font-bold text-blue-900 uppercase">PRÉ-CADASTRO - CARTEIRINHA
                                DE ASSOCIADO</div>
                            <div class="container mx-auto mt-5">
                                <form>
                                    <div class="grid grid-cols-2">
                                        <div class="mr-4">
                                            <div class="relative mb-4">
                                                <label for="cpf" class="leading-7 text-sm text-gray-600">CPF</label>
                                                <input type="text" id="cpf" name="cpf"
                                                    class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                            </div>
                                            <div class="relative mb-4">
                                                <label for="full-name" class="leading-7 text-sm text-gray-600">Nome
                                                    Completo</label>
                                                <input type="text" id="name" name="name"
                                                    class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                            </div>

                                            <div class="relative mb-4">
                                                <label for="text" class="leading-7 text-sm text-gray-600">Sexo</label>
                                                <select id="sexo" name="sexo"
                                                    class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                                    <option value="Masculino"
                                                        class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                                        Masculino</option>
                                                    <option value="Feminino"
                                                        class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                                        Feminino</option>
                                                </select>
                                            </div>
                                            <div class="relative mb-4">
                                                <label for="email" class="leading-7 text-sm text-gray-600">Telefone
                                                    Celular</label>
                                                <input type="text" id="phone" name="phone"
                                                    class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                            </div>
                                            <div class="relative mb-4">
                                                <label for="text"
                                                    class="leading-7 text-sm text-gray-600">Matricula</label>
                                                <input type="text" id="M" name="M"
                                                    class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                            </div>
                                            <div class="relative mb-4">
                                                <label for="text" class="leading-7 text-sm text-gray-600">Estado</label>
                                                <select id="sexo" name="sexo"
                                                    class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                                    <option value="SC"
                                                        class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                                        SC</option>
                                                    <option value="RS"
                                                        class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                                        RS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="relative mb-4">
                                                <label for="text" class="leading-7 text-sm text-gray-600">RG</label>
                                                <input type="text" id="rg" name="rg"
                                                    class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                            </div>
                                            <div class="relative mb-4">
                                                <label for="data" class="leading-7 text-sm text-gray-600">Data de
                                                    Nascimento</label>
                                                <input type="date" id="data" name="data"
                                                    class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                            </div>
                                            <div class="relative mb-4">
                                                <label for="email" class="leading-7 text-sm text-gray-600">Telefone
                                                    Fixo</label>
                                                <input type="text" id="phone" name="phone"
                                                    class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                            </div>
                                            <div class="relative mb-4">
                                                <label for="email"
                                                    class="leading-7 text-sm text-gray-600">E-mail</label>
                                                <input type="email" id="email" name="email"
                                                    class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                            </div>
                                            <div class="relative mb-4">
                                                <label for="email" class="leading-7 text-sm text-gray-600">Cargo</label>
                                                <input type="email" id="email" name="email"
                                                    class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                            </div>
                                            <div class="relative mb-4">
                                                <label for="text"
                                                    class="leading-7 text-sm text-gray-600">Naturalidade</label>
                                                <input type="text" id="N" name="N"
                                                    class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="email" class="leading-7 text-sm text-gray-600">Orgão
                                            Associado/ Município</label>
                                        <input type="email" id="email" name="email"
                                            class="w-full bg-white rounded-md border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-150 ease-in-out">
                                    </div>
                                    <button
                                        class="text-white bg-blue-600 hover:bg-blue-800 rounded-md border-0 py-2 px-8 focus:outline-none text-lg">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</x-content>
