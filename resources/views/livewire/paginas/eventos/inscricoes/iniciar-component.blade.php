<div>
    <div
      class="bg-gray-800 text-white py-3 px-4 text-center fixed left-0 bottom-0 right-0 z-40"
    >
      SioWeb - Sistema de Inscrições Online.
      <a class="underline text-gray-200" href="https://www.webpaes.com.br"
        >Web Paes</a
      >
    </div>
    <div>
      <div
        x-data="{ sidebarOpen: false, darkMode: false }"
        :class="{ 'dark': darkMode }"
      >
        <!-- BEGIN: banner destaque-->
        <div class="mx-auto px-6 xl:px-0 py-0">
          <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->

          <div class="flex flex-col">
            <div class="flex flex-col justify-center">
              <div class="relative">
                <img
                  class="hidden sm:block w-full"
                  src="https://apeprev.com.br/storage/images/wbQeehJ5CnaiXJ90QrVrHTPmjzUuYtsqw5ydMiDb.png"
                  alt="sofa"
                />
                <img
                  class="sm:hidden w-full"
                  src="https://apeprev.com.br/storage/images/mbySiIFJA7kkDBZIJl2gS5eNX3o50wtGA24rAPsA.png"
                  alt="sofa"
                />
                <!-- <img class="sm:hidden w-full" src="https://i.ibb.co/B6qwqPT/jason-wang-Nx-Awry-Abt-Iw-unsplash-1.png" alt="sofa" / -->
                <!-- <div class="absolute sm:bottom-8 bottom-4 pr-10 sm:pr-0 left-4 sm:left-8 flex justify-start items-start">
                <p class="text-3xl sm:text-4xl font-semibold leading-9 text-white">Range Comfort Sofas</p>
              </div> -->
              </div>
            </div>
          </div>
        </div>

        <!-- END: /banner destaque-->

        <div class="flex h-screen bg-gray-100 dark:bg-gray-800 font-roboto">
          <div
            :class="sidebarOpen ? 'block' : 'hidden'"
            @click="sidebarOpen = false"
            class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"
          ></div>

          <div
            :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
            class="fixed z-30 inset-y-0 left-0 w-60 transition duration-300 transform bg-white dark:bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0"
          >
            <div class="flex items-center justify-center mt-8">
              <div class="flex items-center">
                <span
                  class="text-gray-800 dark:text-white text-2xl font-semibold"
                  >Bem-vindo, Jardel</span
                >
              </div>
            </div>

            <nav class="flex flex-col mt-10 px-4 text-left">
              <a
                href="#"
                class="mt-3 p-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded"
                >Apresentação</a
              >
              <a
                href="#"
                class="mt-3 p-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded"
                >Local</a
              >
              <a
                href="#"
                class="mt-3 p-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded"
                >Programação</a
              >
              <a
                href="#"
                class="mt-3 p-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded"
                >Palestrantes</a
              >
              <a
                href="#"
                class="p-2 text-sm text-gray-700 dark:text-gray-100 bg-gray-200 dark:bg-gray-800 rounded"
                >Inscrições</a
              >

              <a
                href="#"
                class="mt-3 p-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded"
                >2ª Via da Inscrição</a
              >
              <a
                href="#"
                class="mt-3 p-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded"
                >Recibo</a
              >
              <a
                href="#"
                class="mt-3 p-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded"
                >Contato</a
              >
            </nav>
          </div>

          <div class="flex-1 flex flex-col overflow-hidden">
            <header class="flex justify-between items-center p-6">
              <div class="flex items-center space-x-4 lg:space-x-0">
                <button
                  @click="sidebarOpen = true"
                  class="text-gray-500 dark:text-gray-300 focus:outline-none lg:hidden"
                >
                  <svg
                    class="h-6 w-6"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M4 6H20M4 12H20M4 18H11"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </button>

                <div>
                  <h1
                    class="text-2xl font-medium text-gray-800 dark:text-white"
                  >
                    INSCRIÇÕES PARA: 18º CONGRESSO DE PREVIDÊNCIA
                  </h1>
                </div>
              </div>

              <div class="flex items-center space-x-4">
                <button
                  @click="darkMode = !darkMode"
                  class="flex text-gray-600 dark:text-gray-300 focus:outline-none"
                  aria-label="Color Mode"
                >
                  <svg
                    x-show="darkMode"
                    class="h-6 w-6"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                      clip-rule="evenodd"
                    />
                  </svg>
                  <svg
                    x-show="!darkMode"
                    class="h-6 w-6"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                    />
                  </svg>
                </button>

                <button
                  class="flex text-gray-600 dark:text-gray-300 focus:outline-none"
                >
                  <svg
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </button>

                <div x-data="{ dropdownOpen: false }" class="relative">
                  <button
                    @click="dropdownOpen = ! dropdownOpen"
                    class="flex items-center space-x-2 relative focus:outline-none"
                  >
                    <h2
                      class="text-gray-700 dark:text-gray-300 text-sm hidden sm:block"
                    >
                      Jardel Paes
                    </h2>
                    <img
                      class="h-9 w-9 rounded-full border-2 border-purple-500 object-cover"
                      src="https://images.unsplash.com/photo-1553267751-1c148a7280a1?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80"
                      alt="Your avatar"
                    />
                  </button>

                  <div
                    class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                    x-show="dropdownOpen"
                    x-transition:enter="transition ease-out duration-100 transform"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75 transform"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    @click.away="dropdownOpen = false"
                  >
                    <a
                      href="#"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-600 hover:text-white"
                      >Meu Cadastro</a
                    >
                    <a
                      href="#"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-600 hover:text-white"
                      >Certificado</a
                    >
                    <a
                      href="/login"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-600 hover:text-white"
                      >Sair</a
                    >
                  </div>
                </div>
              </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto">
              <div class="container mx-auto px-6 py-8">
                <!--  esse conteúdo estava ativo como exemplo de content... eu comentei, mas não sei que vai dar problema, pois esse class grid não sei o que ele faz..
                          <div
                            class="grid place-items-center h-96 text-gray-500 dark:text-gray-300 text-xl border-4 border-gray-300 border-dashed">
                            Content
                        </div> 
                -->
                
                <!-- Instruções -->
                <div class="container max-w-screen-lg mx-auto bg-white p-16 rounded">

                  <div id="accordion-collapse" data-accordion="collapse">
                      <h2 id="accordion-collapse-heading-1">
                          <button type="button" class="flex items-center focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 justify-between p-5 w-full font-medium text-left border border-gray-200 dark:border-gray-700 border-b-0 text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-t-xl" data-accordion-target="#accordion-collapse-body-1" aria-expanded="false" aria-controls="accordion-collapse-body-1">
                  <span>TIPOS DE INSCRIÇÃO / VALORES </span>
                  <svg data-accordion-icon class="w-6 h-6 shrink-0 rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                      </h2>
                      <div id="accordion-collapse-body-1"class="hidden"  aria-labelledby="accordion-collapse-heading-1">
                          <div class="p-5 border border-gray-200 dark:border-gray-700 dark:bg-gray-900 border-b-0">
                             <!-- price-->
                             <div class="md:px-32 py-8 w-full">
                              <div class="shadow overflow-hidden rounded border-b border-gray-200">
                                <table class="min-w-full bg-white">
                                  <thead class="bg-gray-800 text-white">
                                    <tr>
                                      <th class="w-2/3 text-left py-3 px-4 uppercase font-semibold text-sm">TIPO DE INSCRIÇÃO</th>
                                      
                                      <th class="text-left py-3 px-4 uppercase font-semibold text-sm">VALOR</td>
                                    </tr>
                                  </thead>
                                <tbody class="text-gray-700">
                                  <tr>
                                    <td class="w-2/3 text-left py-3 px-4">RPPS associado à Apeprev</td>
                                    
                                    <!-- <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td> -->
                                    <td class="text-left py-3 px-4">R$ 450,00</td>
                                  </tr>
                                    <td class="w-2/3 text-left py-3 px-4">RPPS não associado à Apeprev</td>
                                    
                                    <!-- <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td> -->
                                    <td class="text-left py-3 px-4">R$ 730,00</td>
                                  </tr>
                                  </tr>
                                    <td class="w-2/3 text-left py-3 px-4">Outras Instituições e/ou Prestadores de Serviços</td>
                                    
                                    <!-- <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td> -->
                                    <td class="text-left py-3 px-4">R$ 5.000,00</td>
                                  </tr>
                                  </tr>
                                    <td class="w-2/3 text-left py-3 px-4">Patrocinadores</td>
                                    
                                    <!-- <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td> -->
                                    <td class="text-left py-3 px-4">R$ 0,00</td>
                                  </tr>
                                  
                                </tbody>
                                </table>
                              </div>
                            </div>
                             <!-- end-->
                          </div>
                      </div>
                      <h2 id="accordion-collapse-heading-2">
                          <button type="button" class="flex items-center focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 justify-between p-5 w-full font-medium border border-gray-200 dark:border-gray-700 border-b-0 text-left text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                  <span>POLÍTICA DE PRIVACIDADE</span>
                  <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                      </h2>
                      <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                          <div class="p-5 border border-gray-200 dark:border-gray-700 border-b-0">
                              <p class="mb-2 text-gray-500 dark:text-gray-400"><a href="/src/arquivos/politicas/privacidade/politica-de-privacidade-21-02-2022.pdf"
                                target="_blank" class="text-blue-600 dark:text-blue-500 hover:underline">Acesse aqui nossa política de privacidade</a></p>
                              
                          </div>
                      </div>
                      <h2 id="accordion-collapse-heading-3">
                          <button type="button" class="flex items-center border focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 border-gray-200 dark:border-gray-700 justify-between p-5 w-full font-medium text-left text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                  <span>POLÍTICA DE INSCRIÇÃO</span>
                  <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                      </h2>
                      <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                          <div class="p-5 border border-gray-200 dark:border-gray-700 border-t-0">
                              <p class="mb-2 text-gray-500 dark:text-gray-400">Os interessados cujas Instituições sejam RPPS associado à APEPREV, RPPS não associado e Órgãos Públicos ou Entes que não possuam RPPS (Exceto Instituições Financeiras), deverão POSSUIR VÍNCULO FUNCIONAL DE CARÁTER EFETIVO OU COMISSIONADO, sendo quaisquer outros vínculos considerados como Prestador de Serviços e o valor da inscrição será cobrado correspondentemente.</p>
                              
                              
                              <!-- <ul class="list-disc pl-5 dark:text-gray-400 text-gray-500">
                                  <li><a href="https://flowbite.com/pro/" target="_blank"
                                          class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
                                  <li><a href="https://tailwindui.com/" rel="nofollow" target="_blank"
                                          class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
                              </ul> -->
                          </div>
                      </div>
                      <h2 id="accordion-collapse-heading-4">
                          <button type="button" class="flex items-center border focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 border-gray-200 dark:border-gray-700 justify-between p-5 w-full font-medium text-left text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-4" aria-expanded="false" aria-controls="accordion-collapse-body-4">
                  <span>POLÍTICA DE DESISTÊNCIA</span>
                  <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                      </h2>
                      <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
                          <div class="p-5 border border-gray-200 dark:border-gray-700 border-t-0">
                              
                              
                              <ul class="list-disc pl-5 dark:text-gray-400 text-gray-500">
                                  <li>até 30 dias antes do evento: ressarcimento de 70% do valor da inscrição;</li>
                                  <li>até 15 antes 50%;</li>
                                  <li>até 10 dias antes 30%;</li>
                                  <li>menos de 10 dias, sem ressarcimento.</li>                                  
                              </ul>
                              <p class="mb-2 text-gray-500 dark:text-gray-400">Obs.: O ressarcimento será realizado mediante créditos para utilização em outros eventos da APEPREV.</p>
                          </div>
                      </div>
                  </div>

                  <p class="mt-5">PARA EFETUAR A INSCRIÇÃO, o interessado deve, primeiro, informar no campo abaixo o número do CNPJ em que tenha vínculo funcional e que será responsável pelo pagamento da inscrição, e em seguida clicar em "Iniciar". <br>Em caso de dúvidas, basta entrar em contato pelo (41) 98791-4672 ou utilizar nosso <a class="text-blue-600 hover:underline" href="https://apeprev.com.br/fale-conosco" target="_blank">fale conosco.</a> <br>Ao realizar a inscrição, você estará automaticamente concordando com as Políticas acima descritas.
                  </p><br>

                  <div class="md:col-span-5">
                      <div class="inline-flex items-center">
                          <input type="checkbox" name="concordo-termos" id="concordo-termos" class="form-checkbox" />
                          <label for="concordo-termos" class="ml-2">CONCORDO COM AS POLÍTICAS DE PRIVACIDADE, INSCRIÇÃO, DESISTÊNCIA E DESCONTOS</label>
                      </div>
                  </div>
                  <div class="md:col-span-5">
                      <div class="inline-flex items-center">
                          <input type="checkbox" name="vacina" id="vacina" class="form-checkbox" />
                          <label for="vacina" class="ml-2">ESTOU CIENTE QUE DEVEREI APRESENTAR COMPROVANTE DE VACINAÇÃO COVID-19 PARA ACESSO AO EVENTO</label>
                      </div>
                  </div>

                  <script src="https://unpkg.com/flowbite@1.3.3/dist/flowbite.js"></script>
              </div><br>
              <!-- end-->
                <!-- BEGIN: formulário cnpj -->
                <div class="flex flex-col items-center justify-center ">
                  <div class="bg-green-400 w-full sm:w-3/4 max-w-lg p-12 pb-1 shadow-2xl rounded">
                    <div class="text-white pb-4 sm:text-2xl font-semibold">Informe o CNPJ</div>
                    <input
                      class="block text-gray-700 pl-2 p-1 m-4 ml-0 w-full rounded text-lg font-normal placeholder-gray-300"
                      id="username"
                      type="text"
                      placeholder="Digite o CNPJ"/>
                   
                    <button
                      class="inline-block mt-2 bg-green-600 hover:bg-green-700 focus:bg-green-800 px-6 py-2 rounded text-white shadow-lg">
                      Iniciar
                    </button>
                    <div class="pt-10 flex items-center justify-between">                      
                      
                    </div>
                  </div>
                  <p class="mt-4 text-center text-gray-400 text-xs">
                    &copy;2022 SioWeb. Todos direitos reservados.
                  </p>
                </div>
                <!-- END: formulário cnpj-->
              </div>
            </main>
          </div>
        </div>
      </div>
    </div>
</div>
