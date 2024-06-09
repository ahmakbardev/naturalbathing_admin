<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeroSectionController extends Controller
{
    // public function index()
    // {
    //     $heroSections = HeroSection::all();
    //     return view('hero.index', compact('heroSections'));
    // }

    public function checkAndRedirect()
    {
        // Mengecek apakah ada data di tabel hero_section
        $heroSection = DB::table('hero_section')->first();

        if ($heroSection) {
            // Jika data ada, arahkan ke halaman edit
            return redirect()->route('content.hero-section.edit', $heroSection->id);
        } else {
            // Jika data tidak ada, arahkan ke halaman create
            return redirect()->route('content.hero-section.create');
        }
    }

    public function create()
    {
        return view('content.hero-section.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image1' => 'required|image',
            'image2' => 'required|image',
            'image3' => 'required|image',
            'title' => 'required',
            'span_title' => 'required',
            'subtitle' => 'required',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:20000'
        ]);

        $image1Path = $request->file('image1')->store('public/hero-section');
        $image2Path = $request->file('image2')->store('public/hero-section');
        $image3Path = $request->file('image3')->store('public/hero-section');

        $videoPath = $request->file('video') ? $request->file('video')->store('public/hero-section') : null;

        DB::table('hero_section')->insert([
            'image1' => basename($image1Path),
            'image2' => basename($image2Path),
            'image3' => basename($image3Path),
            'title' => $request->title,
            'span_title' => $request->span_title,
            'subtitle' => $request->subtitle,
            'video' => $videoPath ? basename($videoPath) : null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Hero Section created successfully');
    }

    public function edit(HeroSection $heroSection)
    {
        return view('content.hero-section.edit', compact('heroSection'));
    }

    public function update(Request $request, HeroSection $heroSection)
    {
        $request->validate([
            'image1' => 'image',
            'image2' => 'image',
            'image3' => 'image',
            'title' => 'required',
            'span_title' => 'required',
            'subtitle' => 'required',
        ]);

        if ($request->hasFile('image1')) {
            $heroSection->image1 = basename($request->file('image1')->store('public/hero-section'));
        }
        if ($request->hasFile('image2')) {
            $heroSection->image2 = basename($request->file('image2')->store('public/hero-section'));
        }
        if ($request->hasFile('image3')) {
            $heroSection->image3 = basename($request->file('image3')->store('public/hero-section'));
        }
        $heroSection->title = $request->title;
        $heroSection->span_title = $request->span_title;
        $heroSection->subtitle = $request->subtitle;
        $heroSection->save();

        return redirect()->route('admin.dashboard')->with('success', 'Hero Section updated successfully');
    }


    public function destroy(HeroSection $heroSection)
    {
        $heroSection->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Hero Section deleted successfully');
    }
}
