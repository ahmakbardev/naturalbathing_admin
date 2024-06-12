@extends('layouts.layout')

@section('content')
    <div class="-mt-12 mx-6 mb-6 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-2 xl:grid-cols-4">
        <!-- card -->
        <div class="card shadow">
            <!-- card body -->
            <div class="card-body">
                <!-- content -->
                <div class="flex justify-between items-center">
                    <h4>Projects</h4>
                    <div
                        class="bg-indigo-600 bg-opacity-10 rounded-md w-10 h-10 flex items-center justify-center text-center text-indigo-600">
                        <i data-feather="briefcase"></i>
                    </div>
                </div>
                <div class="mt-4 flex flex-col gap-0 text-base">
                    <h2 class="text-xl font-bold">18</h2>
                    <div>
                        <span>2</span>
                        <span class="text-gray-500">Completed</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- card -->
        <div class="card shadow">
            <!-- card boduy -->
            <div class="card-body">
                <!-- content -->
                <div class="flex justify-between items-center">
                    <h4>Active Task</h4>
                    <div
                        class="bg-indigo-600 bg-opacity-10 rounded-md w-10 h-10 flex items-center justify-center text-center text-indigo-600">
                        <i data-feather="list"></i>
                    </div>
                </div>
                <div class="mt-4 flex flex-col gap-0 text-base">
                    <h2 class="text-xl font-bold">132</h2>
                    <div>
                        <span>28</span>
                        <span class="text-gray-500">Completed</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- card -->
        <div class="card shadow">
            <!-- card body -->
            <div class="card-body">
                <!-- content -->
                <div class="flex justify-between items-center">
                    <h4>Teams</h4>
                    <div
                        class="bg-indigo-600 bg-opacity-10 rounded-md w-10 h-10 flex items-center justify-center text-center text-indigo-600">
                        <i data-feather="users"></i>
                    </div>
                </div>
                <div class="mt-4 flex flex-col gap-0 text-base">
                    <h2 class="text-xl font-bold">12</h2>
                    <div>
                        <span>1</span>
                        <span class="text-gray-500">Completed</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- card -->
        <div class="card shadow">
            <!-- card body -->
            <div class="card-body">
                <!-- content -->
                <div class="flex justify-between items-center">
                    <h4>Productivity</h4>
                    <div
                        class="bg-indigo-600 bg-opacity-10 rounded-md w-10 h-10 flex items-center justify-center text-center text-indigo-600">
                        <i data-feather="target"></i>
                    </div>
                </div>
                <div class="mt-4 flex flex-col gap-0 text-base">
                    <h2 class="text-xl font-bold">76%</h2>
                    <div>
                        <span class="text-green-600">5%</span>
                        <span class="text-gray-500">Completed</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-6 grid grid-cols-1 xl:grid-cols-3 grid-rows-1 grid-flow-row-dense gap-6">
        <div class="xl:col-span-2">
            <div class="card h-full shadow">
                <!-- heading -->
                <div class="border-b border-gray-300 px-5 py-4">
                    <h4>Pesanan User</h4>
                </div>

                <div class="relative overflow-x-auto">
                    <!-- table -->
                    <table class="text-left w-full whitespace-nowrap">
                        <thead class="text-gray-700">
                            <tr>
                                <th scope="col" class="border-b bg-gray-100 px-6 py-3">Nama User</th>
                                <th scope="col" class="border-b bg-gray-100 px-6 py-3">Paket</th>
                                <th scope="col" class="border-b bg-gray-100 px-6 py-3">Pembayaran</th>
                                <th scope="col" class="border-b bg-gray-100 px-6 py-3">Status</th>
                                <th scope="col" class="border-b bg-gray-100 px-6 py-3">Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayarans as $pembayaran)
                                <tr>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <h5 class="mb-1 ml-4"><a href="#">{{ $pembayaran->user_name }}</a></h5>
                                        </div>
                                    </td>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        @foreach (json_decode($pembayaran->paket_data, true)['items'] as $item)
                                            <div>{{ $item['name'] }} ({{ $item['quantity'] }})</div>
                                        @endforeach
                                    </td>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <img class="w-16 h-16 object-cover rounded cursor-pointer"
                                            src="{{ asset('storage/bukti_pembayaran/' . $pembayaran->ss_pembayaran) }}"
                                            alt="Bukti Pembayaran"
                                            onclick="showModal('{{ asset('bukti_pembayaran/' . $pembayaran->ss_pembayaran) }}')">
                                    </td>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <form action="{{ route('pembayaran.updateStatus', $pembayaran->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" onchange="this.form.submit()" class="form-select">
                                                <option value="0" {{ $pembayaran->status == 0 ? 'selected' : '' }}>
                                                    Belum Terverifikasi</option>
                                                <option value="1" {{ $pembayaran->status == 1 ? 'selected' : '' }}>
                                                    Terverifikasi</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        @if ($pembayaran->status)
                                            <span class="text-green-500">Lunas</span>
                                        @else
                                            <span class="text-red-500">Belum Lunas</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50 hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg relative">
                <button onclick="hideModal()" class="absolute top-0 right-0 mt-2 mr-2 text-red-500 font-bold">Close</button>
                <img id="modal-image" class="w-full h-auto object-cover rounded">
            </div>
        </div>

        <script>
            function showModal(imageUrl) {
                const modal = document.getElementById('modal');
                const modalImage = document.getElementById('modal-image');
                modalImage.src = imageUrl;
                modal.classList.remove('hidden');
            }

            function hideModal() {
                const modal = document.getElementById('modal');
                modal.classList.add('hidden');
            }
        </script>
        <!-- card -->
        <div class="card h-full shadow">
            <div class="border-b border-gray-300 px-5 py-4 flex justify-between items-center">
                <h4>Statistik Pesanan</h4>
                <!-- dropdown -->
                <div class="dropdown leading-4">
                    <button class="text-gray-600 p-2 hover:bg-gray-300 rounded-full transition-all" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i data-feather="more-vertical" class="w-4 h-4"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
            <!-- card body -->
            <div class="card-body">
                <div id="perfomanceChart"></div>
                <div class="flex items-center justify-around py-4">
                    <!-- content -->
                    <div class="text-center">
                        <div class="mb-3">
                            <i class="w-6 h-6 text-green-500 mx-auto" data-feather="check-circle"></i>
                        </div>

                        <span class="text-2xl font-bold text-gray-800">76%</span>
                        <p class="text-gray-600">Diterima</p>
                    </div>
                    <!-- content -->
                    <div class="text-center">
                        <div class="mb-3">
                            <i class="w-6 h-6 text-yellow-500 mx-auto" data-feather="trending-up"></i>
                        </div>

                        <span class="text-2xl font-bold text-gray-800">32%</span>
                        <p class="text-gray-600">Pending</p>
                    </div>
                    <!-- content -->
                    <div class="text-center">
                        <div class="mb-3">
                            <i class="w-6 h-6 text-red-500 mx-auto" data-feather="trending-down"></i>
                        </div>
                        <span class="text-2xl font-bold text-gray-800">13%</span>
                        <p class="text-gray-600">Gagal</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-6 my-6 grid grid-cols-1 lg:grid-cols-2 grid-rows-1 grid-flow-row-dense gap-6">
        <div>
            <div class="card h-full shadow">
                <div class="border-b border-gray-300 px-5 py-4 flex items-center w-full justify-between">
                    <!-- title -->
                    <div>
                        <h4>My Task</h4>
                    </div>
                    <div>
                        <!-- button -->
                        <div class="dropdown leading-4">
                            <button
                                class="btn btn-sm gap-x-2 bg-white text-gray-800 border-gray-300 border disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-700 hover:border-gray-700 active:bg-gray-700 active:border-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Add Task
                            </button>
                            <!-- list -->
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="relative overflow-x-auto">
                    <!-- table -->
                    <table class="text-left w-full whitespace-nowrap">
                        <thead class="text-gray-700">
                            <tr>
                                <th scope="col" class="border-b bg-gray-100 px-6 py-3">Name</th>
                                <th scope="col" class="border-b bg-gray-100 px-6 py-3">Deadline</th>
                                <th scope="col" class="border-b bg-gray-100 px-6 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <input
                                            class="w-4 h-4 text-indigo-600 bg-white border-gray-300 rounded focus:ring-indigo-600 focus:outline-none focus:ring-2"
                                            type="checkbox" id="checkboxOne" />
                                        <label for="checkboxOne" class="text-base ml-2 text-slate-600">Design a FreshCart
                                            Home
                                            page</label>
                                    </div>
                                </td>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">Today
                                </td>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                    <span
                                        class="bg-green-100 px-2 py-1 text-green-700 text-sm font-medium rounded-md">Approved</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <input
                                            class="w-4 h-4 text-indigo-600 bg-white border-gray-300 rounded focus:ring-indigo-600 focus:outline-none focus:ring-2"
                                            type="checkbox" id="checkboxTwo" />
                                        <label for="checkboxTwo" class="text-base ml-2 text-slate-600">Dash UI Dark
                                            Version
                                            Design</label>
                                    </div>
                                </td>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                    Yesterday</td>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                    <span
                                        class="bg-red-100 px-2 py-1 text-red-700 text-sm font-medium rounded-md">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <input
                                            class="w-4 h-4 text-indigo-600 bg-white border-gray-300 rounded focus:ring-indigo-600 focus:outline-none focus:ring-2"
                                            type="checkbox" id="checkboxThree" />
                                        <label for="checkboxThree" class="text-base ml-2 text-slate-600">Dash UI landing
                                            page
                                            design</label>
                                    </div>
                                </td>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">16
                                    Sept, 2023</td>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                    <span class="bg-yellow-100 px-2 py-1 text-yellow-700 text-sm font-medium rounded-md">In
                                        Progress</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <input
                                            class="w-4 h-4 text-indigo-600 bg-white border-gray-300 rounded-md focus:ring-indigo-400 focus:outline-none focus:ring-3 focus:outline-indigo-600"
                                            type="checkbox" id="checkboxFour" />
                                        <label for="checkboxFour" class="text-base ml-2 text-slate-600">Next.js Dash UI
                                            version</label>
                                    </div>
                                </td>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">23
                                    Sept, 2023</td>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                    <span
                                        class="bg-green-100 px-2 py-1 text-green-700 text-sm font-medium rounded-md">Approved</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <input
                                            class="w-4 h-4 text-indigo-600 bg-white border-gray-300 rounded focus:ring-indigo-600 focus:outline-none focus:ring-2"
                                            type="checkbox" id="checkboxFive" />
                                        <label for="checkboxFive" class="text-base ml-2 text-slate-600">Develop a Dash UI
                                            Laravel</label>
                                    </div>
                                </td>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">20
                                    Sept, 2023</td>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                    <span
                                        class="bg-red-100 px-2 py-1 text-red-700 text-sm font-medium rounded-md">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <input
                                            class="w-4 h-4 text-indigo-600 bg-white border-gray-300 rounded focus:ring-indigo-600 focus:outline-none focus:ring-2"
                                            type="checkbox" id="checkboxSix" />
                                        <label for="checkboxSix" class="text-base ml-2 text-slate-600">Coach home page
                                            design</label>
                                    </div>
                                </td>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">12
                                    Sept, 2023</td>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                    <span
                                        class="bg-green-100 px-2 py-1 text-green-700 text-sm font-medium rounded-md">Approved</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <input
                                            class="w-4 h-4 text-indigo-600 bg-white border-gray-300 rounded focus:ring-indigo-600 focus:outline-none focus:ring-2"
                                            type="checkbox" id="checkboxSeven" />
                                        <label for="checkboxSeven" class="text-base ml-2 text-slate-600">Develop a Dash UI
                                            Laravel</label>
                                    </div>
                                </td>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">11
                                    Sept, 2023</td>
                                <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                    <span
                                        class="bg-red-100 px-2 py-1 text-red-700 text-sm font-medium rounded-md">Pending</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- card -->
        <div class="card h-full shadow">
            <div class="border-b border-gray-300 px-5 py-4">
                <h4>Teams</h4>
            </div>
            <div class="relative overflow-x-auto" data-simplebar="" style="max-height: 380px">
                <!-- table -->
                <table class="text-left w-full whitespace-nowrap">
                    <thead class="text-gray-700">
                        <tr>
                            <th scope="col" class="border-b bg-gray-100 px-6 py-3">Name</th>
                            <th scope="col" class="border-b bg-gray-100 px-6 py-3">Role</th>
                            <th scope="col" class="border-b bg-gray-100 px-6 py-3">Last Activity</th>
                            <th scope="col" class="border-b bg-gray-100 px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <div>
                                        <a href="#!" class="h-10 w-10 inline-block"><img
                                                src="assets/images/avatar/avatar-2.jpg" alt="Image"
                                                class="rounded-full" /></a>
                                    </div>
                                    <div class="ml-3 leading-4">
                                        <h5 class="mb-1"><a href="#!">Anita Parmar</a></h5>
                                        <p class="mb-0 text-gray-500">anita@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">Front End
                                Developer</td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">3 May,
                                2023</td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                <div class="dropdown leading-4">
                                    <button class="text-gray-600 p-2 hover:bg-gray-300 rounded-full transition-all"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i data-feather="more-vertical" class="w-4 h-4"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else
                                                here</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <div>
                                        <a href="#!" class="h-10 w-10 inline-block">
                                            <img src="assets/images/avatar/avatar-3.jpg" alt="Image"
                                                class="rounded-full" />
                                        </a>
                                    </div>
                                    <div class="ml-3 leading-4">
                                        <h5 class="mb-1"><a href="#!">Jitu Chauhan</a></h5>
                                        <p class="mb-0 text-gray-500">jituchauhan@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">Project
                                Director</td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">Today</td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                <div class="dropdown leading-4">
                                    <button class="text-gray-600 p-2 hover:bg-gray-300 rounded-full transition-all"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i data-feather="more-vertical" class="w-4 h-4"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else
                                                here</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <div>
                                        <a href="#!" class="h-10 w-10 inline-block"><img
                                                src="assets/images/avatar/avatar-2.jpg" alt="Image"
                                                class="rounded-full" /></a>
                                    </div>
                                    <div class="ml-3 leading-4">
                                        <h5 class="mb-1"><a href="#!">Sandeep Chauhan</a></h5>
                                        <p class="mb-0 text-gray-500">sandeepchauhan@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">Full-
                                Stack Developer</td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">Yesterday
                            </td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                <div class="dropdown leading-4">
                                    <button class="text-gray-600 p-2 hover:bg-gray-300 rounded-full transition-all"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i data-feather="more-vertical" class="w-4 h-4"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else
                                                here</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <div>
                                        <a href="#!" class="h-10 w-10 inline-block"><img
                                                src="assets/images/avatar/avatar-5.jpg" alt="Image"
                                                class="rounded-full" /></a>
                                    </div>
                                    <div class="ml-3 leading-4">
                                        <h5 class="mb-1"><a href="#!">Amanda Darnell</a></h5>
                                        <p class="mb-0 text-gray-500">amandadarnell@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">Digital
                                Marketer</td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">3 May,
                                2023</td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                <div class="dropdown leading-4">
                                    <button class="text-gray-600 p-2 hover:bg-gray-300 rounded-full transition-all"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i data-feather="more-vertical" class="w-4 h-4"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else
                                                here</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <div>
                                        <a href="#!" class="h-10 w-10 inline-block"><img
                                                src="assets/images/avatar/avatar-6.jpg" alt="Image"
                                                class="rounded-full" /></a>
                                    </div>
                                    <div class="ml-3 leading-4">
                                        <h5 class="mb-1"><a href="#!">Patricia Murrill</a></h5>
                                        <p class="mb-0 text-gray-500">patriciamurrill@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">Account
                                Manager</td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">3 May,
                                2023</td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                <div class="dropdown leading-4">
                                    <button class="text-gray-600 p-2 hover:bg-gray-300 rounded-full transition-all"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i data-feather="more-vertical" class="w-4 h-4"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else
                                                here</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <div>
                                        <a href="#!" class="h-10 w-10 inline-block"><img
                                                src="assets/images/avatar/avatar-7.jpg" alt="Image"
                                                class="rounded-full" /></a>
                                    </div>
                                    <div class="ml-3 leading-4">
                                        <h5 class="mb-1"><a href="#!">Darshini Nair</a></h5>
                                        <p class="mb-0 text-gray-500">darshininair@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">Front End
                                Developer</td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">3 May,
                                2023</td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                <div class="dropdown leading-4">
                                    <button class="text-gray-600 p-2 hover:bg-gray-300 rounded-full transition-all"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i data-feather="more-vertical" class="w-4 h-4"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else
                                                here</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <div>
                                        <a href="#!" class="h-10 w-10 inline-block"><img
                                                src="assets/images/avatar/avatar-8.jpg" alt="Image"
                                                class="rounded-full" /></a>
                                    </div>
                                    <div class="ml-3 leading-4">
                                        <h5 class="mb-1"><a href="#!">Patricia Murrill</a></h5>
                                        <p class="mb-0 text-gray-500">patriciamurrill@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">Account
                                Manager</td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">3 May,
                                2023</td>
                            <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                <div class="dropdown leading-4">
                                    <button class="text-gray-600 p-2 hover:bg-gray-300 rounded-full transition-all"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i data-feather="more-vertical" class="w-4 h-4"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else
                                                here</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
