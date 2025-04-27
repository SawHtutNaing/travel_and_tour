<div class="bg-white dark:bg-slate-900">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class=" h-24 ">
        @auth
            @include('components.layouts.nav')
        @endauth
    </div>
    <div class=" flex


     {{ is_numeric(auth()->id()) ? 'justify-between' : 'justify-center' }}

     ">

        @auth
            <div class=" w-1/4">
                @include('components.layouts.aside')
            </div>

        @endauth

        <div class="w-3/4">
            <div class="">
                {{ $slot }}

            </div>
        </div>
    </div>
    @livewireScripts
    @livewireStyles

</div>
