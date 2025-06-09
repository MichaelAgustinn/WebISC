<?php

namespace App\Http\Controllers;

use App\Models\Creation;
use App\Models\Event;
use App\Models\Faq;
use App\Models\Landing_page_content;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content = Landing_page_content::whereIn('section', ['hero', 'about', 'visi', 'misi', 'tujuan'])->get()->keyBy('section');
        $users = User::count();
        $creations = Creation::count();
        $pengurus = User::where('role', 'Pengurus')->count();
        $faqs = Faq::all();
        $creations = Creation::all();
        $events = Event::all();
        // dd($pengurus);
        return view('welcome', [
            'hero' => !empty($content['hero']) ?  $content['hero'] : null,
            'about' => $content['about'] ?? null,
            'visi' => $content['visi'] ?? null,
            'misi' => $content['misi'] ?? null,
            'tujuan' => $content['tujuan'] ?? null,
            'cretions' => $creations,
            'users' => $users,
            'pengurus' => $pengurus,
            'faqs' => $faqs,
            'creations' => $creations,
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('uyy');
        $hero = Landing_page_content::where('section', 'hero')->first();
        // dd($cek);
        if (!empty($hero)) {
            return LandingPageController::edit($hero->id);
        }
        // dd($hero);
        return view('dashboard.hero.hero');
    }

    public function createAbout()
    {
        $about = Landing_page_content::where('section', 'about')->first();
        if (!empty($about)) {
            return LandingPageController::edit($about->id);
        }
        return view('dashboard.about.about');
    }

    public function createVisi()
    {
        $content = Landing_page_content::whereIn('section', ['visi', 'misi', 'tujuan'])->get()->keyBy('section');
        return view('dashboard.visi-misi-goals.visi', [
            'visi' => !empty($content['visi']) ? $content['visi'] : null,
            'misi' => $content['misi'] ?? null,
            'tujuan' => $content['tujuan'] ?? null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = new Landing_page_content();
        $data->section = $request->section;
        $data->content = $request->content;
        $data->judul = $request->judul;
        if ($request->hasFile('image')) {
            $data->foto = $request->file('image')->store('landing_page_image', 'public');
        }
        $data->save();
        if ($data->section === 'hero') {
            return redirect()->route('landingpage.create')->with('success', 'Berhasil di tambahkan');
        } elseif ($data->section === 'about') {
            return redirect()->route('about.create')->with('success', 'Berhasil di tambahkan');
        } elseif ($data->section === 'visi' || $data->section === 'misi' || $data->section === 'tujuan') {
            return redirect()->route('visi.create')->with('success', 'Berhasil di tambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd('uyy');
        $item = Landing_page_content::find($id);
        // dd($hero);
        if ($item->section === 'hero') {
            return view('dashboard.hero.hero-edit', ['item' => $item]);
        } elseif ($item->section === 'about') {
            return view('dashboard.about.about-edit', ['item' => $item]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Landing_page_content::find($id);
        $data->section = $request->section;
        $data->content = $request->content;
        $data->judul = $request->judul;
        if ($request->hasFile('image')) {
            if ($data->foto && Storage::disk('public')->exists($data->foto)) {
                Storage::disk('public')->delete($data->foto);
            }
            $data->foto = $request->file('image')->store('landing_page_image', 'public');
        }
        $data->save();
        if ($request->section === 'hero') {
            return redirect()->route('landingpage.create' . $request->id)->with('success', 'Berhasil di update');
        } elseif ($request->section === 'about') {
            return redirect()->route('about.create' . $request->id)->with('success', 'Berhasil di update');
        } elseif ($request->section === 'visi' || $request->section === 'misi' || $request->section === 'tujuan') {
            return redirect()->route('visi.create' . $request->id)->with('success', 'Berhasil di update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
