@extends('layouts.layout')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
            <div class="md:flex">
                <div class="w-full p-3">
                    <div class="flex justify-between items-center">
                        <h2 class="text-gray-900 font-medium text-xl">Create Map Section</h2>
                    </div>
                    <form action="{{ route('content.map-section.store') }}" method="POST">
                        @csrf
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500"
                                value="{{ old('name') }}">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Google Map URL</label>
                            <input type="url" name="google_map_url"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500"
                                value="{{ old('google_map_url') }}">
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
