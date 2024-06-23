@extends('layouts.layout')

@section('content')
    <div class="mx-6 grid grid-cols-1 grid-rows-1 grid-flow-row-dense gap-6 my-5">
        <div class="xl:col-span-2">
            <div class="card h-full shadow p-4">
                <h4 class="text-2xl mb-4">Create User</h4>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="grid lg:grid-cols-2 gap-5">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Name</label>
                            <input type="text" name="name" id="name"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500"
                                value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" name="email" id="email"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500"
                                value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="grid lg:grid-cols-2 gap-5">
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700">Password</label>
                            <input type="password" name="password" id="password"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500"
                                required>
                        </div>
                    </div>
                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-lg">Create User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
