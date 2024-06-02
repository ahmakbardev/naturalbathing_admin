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

        @if ($currentRouteName == 'content.index')
            <li class="inline-flex items-center">
                <p
                    class="flex items-center text-black transition-all ease-in-out focus:outline-none focus:text-indigo-600">
                    Main Section</p>
            </li>
        @endif
    </ol>

    <!-- title -->
    @if (Route::currentRouteName() == 'admin.dashboard')
        <a href="#"
            class="btn bg-white text-gray-800 border-gray-600 hover:bg-gray-100 hover:text-gray-800 hover:border-gray-200 active:bg-gray-100 active:text-gray-800 active:border-gray-200 focus:outline-none focus:ring-4 focus:ring-indigo-300">
            Buat Paket Baru
        </a>
    @endif
</div>
