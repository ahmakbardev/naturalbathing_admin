<?php

namespace App\Http\Controllers;

use App\Models\PaketSpesial;
use Illuminate\Http\Request;

class PaketSpesialController extends Controller
{
    public function index()
    {
        $paketSpesial = PaketSpesial::all();
        return view('content.paket-spesial.index', compact('paketSpesial'));
    }

    public function create()
    {
        return view('content.paket-spesial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'short_deskripsi' => 'required',
            'gambar' => 'required|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'review' => 'nullable|array',
        ]);

        $gambarPaths = [];
        if ($request->hasfile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('public/paket_spesial');
                $gambarPaths[] = basename($path);
            }
        }

        $data = $request->all();
        $data['gambar'] = $gambarPaths;

        PaketSpesial::create($data);

        return redirect()->route('content.paket-spesial.index')->with('success', 'Paket Spesial created successfully.');
    }

    public function edit(PaketSpesial $paketSpesial)
    {
        return view('content.paket-spesial.edit', compact('paketBiasa'));
    }

    public function update(Request $request, PaketSpesial $paketSpesial)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'short_deskripsi' => 'required',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'review' => 'nullable|array',
        ]);

        $gambarPaths = $paketSpesial->gambar;
        if ($request->hasfile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('public/paket_spesial');
                $gambarPaths[] = basename($path);
            }
        }

        $data = $request->all();
        $data['gambar'] = $gambarPaths;

        $paketSpesial->update($data);

        return redirect()->route('content.paket-spesial.index')->with('success', 'Paket Spesial updated successfully.');
    }


    public function destroy(PaketSpesial $paketSpesial)
    {
        $paketSpesial->delete();
        return redirect()->route('content.paket-spesial.index')->with('success', 'Paket Spesial deleted successfully.');
    }
}
