<?php

namespace App\Http\Controllers;

use App\Models\PaketBiasa;
use Illuminate\Http\Request;

class PaketBiasaController extends Controller
{
    public function index()
    {
        $paketBiasa = PaketBiasa::all();
        return view('content.paket-biasa.index', compact('paketBiasa'));
    }

    public function create()
    {
        return view('content.paket-biasa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'gambar' => 'required|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'review' => 'nullable|array',
        ]);

        // dd('aa');
        $gambarPaths = [];
        if ($request->hasfile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('public/paket_biasa');
                $gambarPaths[] = basename($path); // Simpan hanya nama file
            }
        }

        $data = $request->all();
        $data['gambar'] = $gambarPaths;
        PaketBiasa::create($data);

        return redirect()->route('content.paket-biasa.index')->with('success', 'Paket Biasa created successfully.');
    }

    public function edit(PaketBiasa $paketBiasa)
    {
        return view('content.paket-biasa.edit', compact('paketBiasa'));
    }

    public function update(Request $request, PaketBiasa $paketBiasa)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'review' => 'nullable|array',
        ]);

        $gambarPaths = $paketBiasa->gambar ?? [];
        if ($request->hasfile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('public/paket_biasa');
                $gambarPaths[] = basename($path); // Simpan hanya nama file
            }
        }

        $data = $request->all();
        $data['gambar'] = $gambarPaths;

        $paketBiasa->update($data);

        return redirect()->route('content.paket-biasa.index')->with('success', 'Paket Biasa updated successfully.');
    }

    public function destroy(PaketBiasa $paketBiasa)
    {
        $paketBiasa->delete();
        return redirect()->route('content.paket-biasa.index')->with('success', 'Paket Biasa deleted successfully.');
    }
}
