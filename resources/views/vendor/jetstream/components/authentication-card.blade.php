<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class=" flex flex-col sm:justify-center items-center  bg-white sm:rounded-lg shadow-md w-full md:w-[450px]">
        <div>
            {{ $logo }}
        </div>
    
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden">
            {{ $slot }}
        </div>
      </div>
</div>
