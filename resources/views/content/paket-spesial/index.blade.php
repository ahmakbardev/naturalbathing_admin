@extends('layouts.layout')

@section('content')
    <div class="mx-6 grid grid-cols-1 grid-rows-1 grid-flow-row-dense gap-6">
        <div class="xl:col-span-2">
            <div class="card h-full shadow">
                <!-- heading -->
                <div class="flex justify-between items-center">
                    <div class="border-b border-gray-300 px-5 py-4">
                        <h4>Daftar Paket Biasa</h4>
                    </div>
                    <a href="{{ route('content.paket-spesial.create') }}"
                        class="bg-blue-500 text-white mx-5 px-4 py-2 h-fit rounded">Create Paket
                        Spesial</a>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="text-left w-full whitespace-nowrap">
                        <thead class="text-gray-700">
                            <tr>
                                <th scope="col" class="border-b bg-gray-100 px-6 py-3">Nama Paket</th>
                                <th scope="col" class="border-b bg-gray-100 px-6 py-3">Harga</th>
                                {{-- <th scope="col" class="border-b bg-gray-100 px-6 py-3">Deskripsi</th> --}}
                                <th scope="col" class="border-b bg-gray-100 px-6 py-3">Gambar</th>
                                <th scope="col" class="border-b bg-gray-100 px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($paketSpesial as $paket)
                                <tr>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        {{ $paket->nama_paket }}
                                    </td>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        Rp. {{ number_format($paket->harga, 0, ',', '.') }}
                                    </td>
                                    {{-- <td class="border-b border-gray-300 font-medium py-3 px-6 text-left deskripsi">
                                        {!! $paket->deskripsi !!}
                                    </td> --}}
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <div class="flex">
                                            @foreach ($paket->gambar as $gambar)
                                                <img src="{{ Storage::url($gambar) }}" alt="Gambar"
                                                    class="w-16 h-16 mr-2">
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <a href="{{ route('content.paket-spesial.edit', $paket->id) }}"
                                            class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                                        <form action="{{ route('content.paket-spesial.destroy', $paket->id) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        Data masih kosong
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
