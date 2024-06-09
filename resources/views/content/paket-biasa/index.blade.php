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
                    <a href="{{ route('content.paket-biasa.create') }}"
                        class="bg-blue-500 text-white mx-5 px-4 py-2 h-fit rounded">Create Paket
                        Biasa</a>
                </div>

                <div class="relative overflow-x-auto">
                    <!-- table -->
                    <table class="text-left w-full whitespace-nowrap">
                        <thead class="text-gray-700">
                            <tr>
                                <th scope="col" class="border-b bg-gray-100 px-6 py-3">Nama Paket</th>
                                <th scope="col" class="border-b bg-gray-100 px-6 py-3">Harga</th>
                                {{-- <th scope="col" class="border-b bg-gray-100 px-6 py-3">Deskripsi</th> --}}
                                <th scope="col" class="border-b bg-gray-100 px-6 py-3">Gambar</th>
                                {{-- <th scope="col" class="border-b bg-gray-100 px-6 py-3">Review</th> --}}
                                <th scope="col" class="border-b bg-gray-100 px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($paketBiasa as $paket)
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
                                    {{-- <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <div>
                                            @if ($paket->review)
                                                @foreach ($paket->review as $review)
                                                    <p>{{ $review }}</p>
                                                @endforeach
                                            @else
                                                <p>Tidak ada review</p>
                                            @endif
                                        </div>
                                    </td> --}}
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <a href="{{ route('content.paket-biasa.edit', $paket->id) }}"
                                            class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                                        <form action="{{ route('content.paket-biasa.destroy', $paket->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-4 py-1.5 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"
                                        class="border-b border-gray-300 bg-slate-200 font-medium py-3 px-6 text-left">
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

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deskripsiElements = document.querySelectorAll('.deskripsi');

            deskripsiElements.forEach(deskripsi => {
                // Add classes to paragraphs
                const paragraphs = deskripsi.querySelectorAll('p');
                paragraphs.forEach(p => {
                    p.classList.add('text-gray-700', 'mb-2');
                });

                // Add classes to headings
                const headings = deskripsi.querySelectorAll('h1, h2, h3, h4, h5, h6');
                headings.forEach(heading => {
                    heading.classList.add('text-gray-900', 'font-bold', 'mb-2');
                });

                // Add classes to lists
                const lists = deskripsi.querySelectorAll('ul, ol');
                lists.forEach(list => {
                    list.classList.add('list-disc', 'list-inside', 'mb-2');
                });

                // Add classes to list items
                const listItems = deskripsi.querySelectorAll('li');
                listItems.forEach(item => {
                    item.classList.add('mb-1');
                });
            });
        });
    </script>
@endsection
