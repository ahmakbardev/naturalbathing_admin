<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width" />
    <meta name="description"
        content="Dash UI - TailwindCSS HTML Admin Template Free and open-source Github, provides developers with everything need to create Web Application & Kick start project" />
    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon/favicon.ico" />

    <!-- Libs CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" />
    <link rel="stylesheet" href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/styles/css/app.css') }}">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    {{-- <link rel="stylesheet" href="{{ asset('assets/libs/apexcharts.css')}}" /> --}}

    <title>Admin Natural Bathing PAB</title>
</head>

<body>
    <main>
        <!-- start the project -->
        <!-- app layout -->
        <div id="app-layout" class="overflow-x-hidden flex">
            @include('layouts.components.navbar')

            <!-- app layout content -->
            <div id="app-layout-content"
                class="min-h-screen w-full min-w-[100vw] md:min-w-0 ml-[15.625rem] [transition:margin_0.25s_ease-out]">
                <!-- start navbar -->
                @include('layouts.components.header')
                <!-- end of navbar -->
                @include('layouts.components.breadcrumb')
                @yield('content')
                @include('layouts.components.toast')
                @include('layouts.components.footer')

            </div>

        </div>
        <!-- end of project -->
    </main>

    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>

    <!-- Libs JS -->
    <script src="{{ asset('assets/libs/feather-icons/dist/feather.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Theme JS -->
    {{-- <script src="{{ asset('assets/theme.min.js') }}"></script> --}}

    @yield('scripts')

    {{-- ckeditor --}}

</body>

</html>
