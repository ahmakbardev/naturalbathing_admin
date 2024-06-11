@extends('layouts.layout')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
            <div class="md:flex">
                <div class="w-full p-3">
                    <div class="flex justify-between items-center">
                        <h2 class="text-gray-900 font-medium text-xl">Edit Paket Biasa</h2>
                    </div>
                    <form action="{{ route('content.paket-biasa.update', $paketBiasa->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Nama Paket</label>
                            <input type="text" name="nama_paket"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500"
                                value="{{ $paketBiasa->nama_paket }}">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Harga</label>
                            <input type="number" name="harga"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500"
                                value="{{ $paketBiasa->harga }}">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500">{{ old('deskripsi', $paketBiasa->deskripsi ?? '') }}</textarea>
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Gambar</label>
                            <input type="file" name="gambar[]" multiple
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500">
                            <div class="flex mt-2">
                                @foreach ($paketBiasa->gambar as $gambar)
                                    <img src="{{ asset('storage/paket_biasa/' . $gambar) }}" alt="Gambar" class="w-32 h-32 mr-2">
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Review</label>
                            <textarea name="review[]"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500">{{ $paketBiasa->review ? $paketBiasa->review[0] : '' }}</textarea>
                        </div> --}}
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

@section('scripts')
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
@endsection
