<?php

namespace App\Http\Controllers;

use App\Models\MapSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapSectionController extends Controller
{
    // public function index()
    // {
    //     $mapSections = MapSection::all();
    //     return view('content.maps.index', compact('mapSections'));
    // }

    public function checkAndRedirect()
    {
        // Mengecek apakah ada data di tabel hero_section
        $mapSection = DB::table('map_sections')->first();

        if ($mapSection) {
            // Jika data ada, arahkan ke halaman edit
            return redirect()->route('content.map-section.edit', $mapSection->id);
        } else {
            // Jika data tidak ada, arahkan ke halaman create
            return redirect()->route('content.map-section.create');
        }
    }

    public function create()
    {
        return view('content.maps.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'google_map_url' => 'required|url',
        ]);

        MapSection::create($request->only('name', 'google_map_url'));

        return redirect()->route('admin.dashboard')->with('success', 'Map section created successfully.');
    }

    public function edit(MapSection $mapSection)
    {
        return view('content.maps.edit', compact('mapSection'));
    }

    public function update(Request $request, MapSection $mapSection)
    {
        $request->validate([
            'name' => 'required',
            'google_map_url' => 'required|url',
        ]);

        $mapSection->update($request->only('name', 'google_map_url'));

        return redirect()->route('admin.dashboard')->with('success', 'Map section updated successfully.');
    }

    public function destroy(MapSection $mapSection)
    {
        $mapSection->delete();
        return redirect()->route('map-section.index')->with('success', 'Map section deleted successfully.');
    }
}
