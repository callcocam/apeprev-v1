<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth hover:scroll-auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ app('currentTenant')->name }}</title>
    @isset($seo)
        {{ $seo }}
    @endisset
    @tallStyles
    @tallScripts
</head>

<body class="font-sans antialiased" onload="init()">
    @tallLoader
    <x-dialog z-index="z-50" blur="md" align="center" />
    <x-notifications z-index="z-50" />
    <div class="min-h-screen bg-white">
        @livewire('includes.header-component')
        @livewire('includes.menu-component')
        <!-- Page Heading -->
        @if (isset($header))
            <x-content>
                {{ $header }}
            </x-content>
        @endif
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @if (isset($divider))
        {{$divider}}
    @else
        <x-divider-content fill="text-gray-700" bg="bg-white" />
    @endif

    @include('layouts.includes.footer')
    @stack('modals')
    @stack('script')
</body>

</html>
