@php
    $currentRouteName = Route::currentRouteName();
@endphp
<div class="bg-indigo-600 px-8 pt-10 lg:pt-14 pb-16 flex justify-between items-center mb-3">
    <ol class="flex items-center whitespace-nowrap text-xl font-semibold text-white" aria-label="Breadcrumb">
        @if ($currentRouteName == 'admin.dashboard')
            <li class="inline-flex items-center">
                <p
                    class="flex items-center text-black transition-all ease-in-out focus:outline-none focus:text-indigo-600">
                    Dashboard</p>
                @if ($currentRouteName != 'admin.dashboard')
                    <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                @endif
            </li>
        @else
            <li class="inline-flex items-center">
                <a class="flex items-center hover:text-black transition-all ease-in-out focus:outline-none focus:text-indigo-600"
                    href="{{ route('admin.dashboard') }}">Dashboard</a>
                @if ($currentRouteName != 'admin.dashboard')
                    <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                @endif
            </li>

        @endif

        @if (in_array($currentRouteName, ['content.hero-section.edit', 'content.hero-section.create']))
            <li class="inline-flex items-center">
                <p
                    class="flex items-center text-black transition-all ease-in-out focus:outline-none focus:text-indigo-600">
                    Hero Section</p>
            </li>
        @endif

        @if (in_array($currentRouteName, ['content.map-section.edit', 'content.map-section.create']))
            <li class="inline-flex items-center">
                <p
                    class="flex items-center text-black transition-all ease-in-out focus:outline-none focus:text-indigo-600">
                    Map Section</p>
            </li>
        @endif

        @if (in_array($currentRouteName, ['content.paket-biasa.index']))
            <li class="inline-flex items-center">
                <p
                    class="flex items-center text-black transition-all ease-in-out focus:outline-none focus:text-indigo-600">
                    Paket Biasa</p>
            </li>
        @endif
        @if (in_array($currentRouteName, ['content.paket-biasa.edit', 'content.paket-biasa.create']))
            <li class="inline-flex items-center">
                <a class="flex items-center hover:text-black transition-all ease-in-out focus:outline-none focus:text-indigo-600"
                    href="{{ route('content.paket-biasa.index') }}">Paket Biasa</a>
                @if ($currentRouteName != 'content.paket-biasa.index')
                    <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                @endif
            </li>
            @if (in_array($currentRouteName, ['content.paket-biasa.create']))
                <li class="inline-flex items-center">
                    <p
                        class="flex items-center text-black transition-all ease-in-out focus:outline-none focus:text-indigo-600">
                        Create</p>
                </li>
            @elseif (in_array($currentRouteName, ['content.paket-biasa.edit']))
                <li class="inline-flex items-center">
                    <p
                        class="flex items-center text-black transition-all ease-in-out focus:outline-none focus:text-indigo-600">
                        Edit</p>
                </li>
            @endif
        @endif

        @if (in_array($currentRouteName, ['content.paket-spesial.index']))
            <li class="inline-flex items-center">
                <p
                    class="flex items-center text-black transition-all ease-in-out focus:outline-none focus:text-indigo-600">
                    Paket Spesial</p>
            </li>
        @endif
        @if (in_array($currentRouteName, ['content.paket-spesial.edit', 'content.paket-spesial.create']))
            <li class="inline-flex items-center">
                <a class="flex items-center hover:text-black transition-all ease-in-out focus:outline-none focus:text-indigo-600"
                    href="{{ route('content.paket-spesial.index') }}">Paket Spesial</a>
                @if ($currentRouteName != 'content.paket-spesial.index')
                    <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                @endif
            </li>
            @if (in_array($currentRouteName, ['content.paket-spesial.create']))
                <li class="inline-flex items-center">
                    <p
                        class="flex items-center text-black transition-all ease-in-out focus:outline-none focus:text-indigo-600">
                        Create</p>
                </li>
            @elseif (in_array($currentRouteName, ['content.paket-spesial.edit']))
                <li class="inline-flex items-center">
                    <p
                        class="flex items-center text-black transition-all ease-in-out focus:outline-none focus:text-indigo-600">
                        Edit</p>
                </li>
            @endif
        @endif
    </ol>

    <!-- title -->
    @if (Route::currentRouteName() == 'admin.dashboard')
        <div class="relative dropdown inline-block text-left">
            <button
                class="btn bg-white text-gray-800 border-gray-600 hover:bg-gray-100 hover:text-gray-800 hover:border-gray-200 active:bg-gray-100 active:text-gray-800 active:border-gray-200 focus:outline-none focus:ring-4 focus:ring-indigo-300"
                type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Buat Paket Baru
            </button>
            {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> --}}
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('content.paket-biasa.index') }}">Paket Biasa</a></li>
                    <li><a class="dropdown-item" href="{{ route('content.paket-spesial.index') }}">Paket Spesial</a></li>
                    {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                </ul>
            {{-- </div> --}}
        </div>
    @endif
</div>
