@extends('layouts.layout')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
            <div class="md:flex">
                <div class="w-full p-3">
                    <div class="flex justify-between items-center">
                        <h2 class="text-gray-900 font-medium text-xl">Edit Hero Section</h2>
                    </div>
                    <form action="{{ route('content.hero-section.update', $heroSection->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Image 1</label>
                            <input type="file" name="image1"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500">
                            @if ($heroSection->image1)
                                <img src="{{ asset('storage/hero-section/' . $heroSection->image1) }}" alt="Image 1"
                                    class="mt-2 w-32 h-32">
                            @endif
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Image 2</label>
                            <input type="file" name="image2"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500">
                            @if ($heroSection->image2)
                                <img src="{{ asset('storage/hero-section/' . $heroSection->image2) }}" alt="Image 2" class="mt-2 w-32 h-32">
                            @endif
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Image 3</label>
                            <input type="file" name="image3"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500">
                            @if ($heroSection->image3)
                                <img src="{{ asset('storage/hero-section/' . $heroSection->image3) }}" alt="Image 3" class="mt-2 w-32 h-32">
                            @endif
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" value="{{ $heroSection->title }}"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Span Title</label>
                            <input type="text" name="span_title" value="{{ $heroSection->span_title }}"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Subtitle</label>
                            <input type="text" name="subtitle" value="{{ $heroSection->subtitle }}"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Video</label>
                            <input type="file" name="video"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500">
                            @if ($heroSection->video)
                                <video src="{{ asset('storage/hero-section/' . $heroSection->video) }}" class="mt-2 w-32 h-32"
                                    controls></video>
                            @endif
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
