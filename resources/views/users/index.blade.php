@extends('layouts.layout')

@section('content')
    <div class="mx-6 grid grid-cols-1 grid-rows-1 grid-flow-row-dense gap-6 my-5">
        <div class="xl:col-span-2">
            <div class="card h-full shadow">
                <div class="flex justify-between items-center p-4">
                    <h4>Users</h4>
                    <a href="{{ route('users.create') }}" class="btn bg-indigo-500 text-white">Create User</a>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="text-left w-full whitespace-nowrap">
                        <thead class="bg-gray-100">
                            <tr class="border-gray-300 border-b">
                                <th class="px-6 py-3">#</th>
                                <th class="px-6 py-3">Name</th>
                                <th class="px-6 py-3">Email</th>
                                <th class="px-6 py-3">Status</th>
                                <th class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach ($users as $user)
                                <tr class="border-gray-300 border-b">
                                    <td class="py-3 px-6 text-left">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-6 text-left">{{ $user->name }}</td>
                                    <td class="py-3 px-6 text-left">{{ $user->email }}</td>
                                    <td class="py-3 px-6 text-left">
                                        @if ($user->email_verified_at)
                                            <span
                                                class="bg-green-200 px-2 py-1 text-green-700 text-sm font-medium rounded-full inline-block">Verified</span>
                                        @else
                                            <span
                                                class="bg-red-200 px-2 py-1 text-red-700 text-sm font-medium rounded-full inline-block">Not
                                                Verified</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="text-blue-500 hover:text-blue-700">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
