<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="Login Admin Natural Bathing PAB" />
    <title>Login Admin Natural Bathing PAB</title>
    <link rel="stylesheet" href="{{ asset('assets/styles/css/app.css') }}">
</head>

<body>
    <!-- start signin page -->
    <div class="flex flex-col items-center justify-center g-0 h-screen px-4">
        <!-- card -->
        <div class="justify-center items-center w-full bg-white rounded-md shadow lg:flex md:mt-0 max-w-md xl:p-0">
            <!-- card body -->
            <div class="p-6 w-full sm:p-8 lg:p-8">
                <div class="mb-4">
                    <a href="/" class="text-2xl text-indigo-600 font-bold">Natural Bathing PAB</a>
                    <p class="mb-6">Silahkan Login ke Halaman Admin.</p>
                </div>
                <!-- form -->
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <!-- email -->
                    <div class="mb-3">
                        <label for="email" class="inline-block mb-2">Email</label>
                        <input type="email" id="email"
                            class="border border-gray-300 text-gray-900 rounded focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                            name="email" placeholder="Email address here" required />
                    </div>
                    <!-- password -->
                    <div class="mb-5">
                        <label for="password" class="inline-block mb-2">Password</label>
                        <input type="password" id="password"
                            class="border border-gray-300 text-gray-900 rounded focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                            name="password" placeholder="**************" required />
                    </div>
                    <!-- checkbox -->
                    <div class="lg:flex justify-between items-center mb-4">
                        <div class="flex items-center">
                            <input type="checkbox"
                                class="w-4 h-4 text-indigo-600 bg-white border-gray-300 rounded focus:ring-indigo-600 focus:outline-none focus:ring-2"
                                id="rememberme" name="remember" />
                            <label class="inline-block ms-2" for="rememberme">Remember me</label>
                        </div>
                    </div>
                    <div>
                        <!-- button -->
                        <div class="grid">
                            <button type="submit"
                                class="btn bg-indigo-600 text-white border-indigo-600 hover:bg-indigo-800 hover:border-indigo-800 active:bg-indigo-800 active:border-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                                Sign in
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end of signin page -->
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>

    <!-- Libs JS -->
    <script src="{{ asset('assets/libs/feather-icons/dist/feather.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
