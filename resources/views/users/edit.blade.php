@extends('layouts.layout')

@section('content')
    <div class="mx-6 grid grid-cols-1 grid-rows-1 grid-flow-row-dense gap-6 my-5">
        <div class="xl:col-span-2">
            <div class="card h-full shadow p-4">
                <h4 class="text-2xl mb-4">Edit User</h4>
                <form action="{{ route('users.update', $user ? $user->id : $admin->id) }}" method="POST" id="editUserForm">
                    @csrf
                    @method('PUT')
                    <div class="grid lg:grid-cols-2 gap-5">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Name</label>
                            <input type="text" name="name" id="name"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500"
                                value="{{ $user ? $user->name : $admin->name }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" name="email" id="email"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500"
                                value="{{ $user ? $user->email : $admin->email }}" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" name="password" id="password"
                            class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500">
                        <small class="text-gray-600">Leave blank if you don't want to change the password</small>
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-gray-700">Role</label>
                        <select name="role" id="role"
                            class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500"
                            required>
                            <option value="user" {{ $role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    <button type="submit" id="submitButton"
                        class="hidden bg-indigo-500 text-white px-4 py-2 rounded-lg">Update User</button>
                    <button type="button" id="cancelButton" class="bg-red-500 text-white px-4 py-2 rounded-lg"
                        onclick="window.location.href='{{ route('users.index') }}'">Batal</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('editUserForm');
            const submitButton = document.getElementById('submitButton');
            const cancelButton = document.getElementById('cancelButton');

            const initialFormState = getFormState(form);

            form.addEventListener('input', function() {
                const currentFormState = getFormState(form);
                if (isFormChanged(initialFormState, currentFormState)) {
                    submitButton.classList.remove('hidden');
                    cancelButton.classList.add('hidden');
                } else {
                    submitButton.classList.add('hidden');
                    cancelButton.classList.remove('hidden');
                }
            });

            function getFormState(form) {
                const formData = new FormData(form);
                let state = {};
                formData.forEach((value, key) => {
                    state[key] = value;
                });
                return state;
            }

            function isFormChanged(initialState, currentState) {
                for (let key in initialState) {
                    if (initialState[key] !== currentState[key]) {
                        return true;
                    }
                }
                return false;
            }
        });
    </script>
@endsection
