<!-- start navbar -->
<nav class="navbar-vertical navbar">
    <div id="myScrollableElement" class="h-screen" data-simplebar>
        <!-- brand logo -->
        <a class="navbar-brand text-xl font-bold text-white" href="/">
            Admin
        </a>

        <!-- navbar nav -->
        <ul class="navbar-nav flex-col" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i data-feather="home" class="w-4 h-4 mr-2"></i>
                    Dashboard
                </a>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Manajemen Konten</div>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed  {{ in_array(Route::currentRouteName(), ['content.hero-section.create', 'content.hero-section.edit', 'content.map-section.create', 'content.map-section.edit', 'content.paket-biasa.index', 'content.paket-biasa.create', 'content.paket-biasa.edit', 'content.paket-spesial.index', 'content.paket-spesial.create', 'content.paket-spesial.edit']) ? 'active' : '' }}"
                    href="#!" data-bs-toggle="collapse" data-bs-target="#navPages" aria-expanded="false"
                    aria-controls="navPages">
                    <i data-feather="airplay" class="w-4 h-4 mr-2"></i>
                    Content
                </a>
                <div id="navPages" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-col">
                        <li
                            class="nav-item  {{ in_array(Route::currentRouteName(), ['content.hero-section.create', 'content.hero-section.edit']) ? 'underline underline-offset-4' : '' }}">
                            <a class="nav-link" href="{{ route('content.hero-section.check') }}">Hero
                                section</a>
                        </li>
                        <li
                            class="nav-item {{ in_array(Route::currentRouteName(), ['content.map-section.create', 'content.map-section.edit']) ? 'underline underline-offset-4' : '' }}">
                            <a class="nav-link " href="{{ route('content.map-section.check') }}">Maps</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ in_array(Route::currentRouteName(), ['content.paket-biasa.index', 'content.paket-biasa.create', 'content.paket-biasa.edit']) ? 'underline underline-offset-4' : '' }}"
                                href="{{ route('content.paket-biasa.index') }}">Paket
                                Biasa</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ in_array(Route::currentRouteName(), ['content.paket-spesial.index', 'content.paket-spesial.create', 'content.paket-spesial.edit']) ? 'underline underline-offset-4' : '' }}"
                                href="{{ route('content.paket-spesial.index') }}">Paket Spesial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./404-error.html">Galeri Foto</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#!" data-bs-toggle="collapse"
                    data-bs-target="#navAuthentication" aria-expanded="false" aria-controls="navAuthentication">
                    <i data-feather="lock" class="w-4 h-4 mr-2"></i>
                    Authentication
                </a>
                <div id="navAuthentication" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-col">
                        <li class="nav-item">
                            <a class="nav-link " href="./sign-in.html">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./sign-up.html">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./forget-password.html">Forget Password</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link " href="./layout.html">
                    <i data-feather="sidebar" class="w-4 h-4 mr-2"></i>
                    Layouts
                </a>
            </li> --}}
        </ul>
    </div>
</nav>
<!--end of navbar-->
