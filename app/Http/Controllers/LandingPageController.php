<?php

namespace App\Http\Controllers;

use App\Models\Landing_page_content;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Landing_page_content::where('section', 'description')->first();
        return view('welcome', ['hero' => $hero]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('uyy');
        $hero = Landing_page_content::where('section', 'description')->first();
        // dd($hero);
        return view('dashboard.general', ['hero' => $hero]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

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
        //
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
            $data->foto = $request->file('image')->store('landing_page_image', 'public');
        }
        $data->save();
        return redirect()->route('landingpage.create')->with('success', 'Berhasil di update');
    }

    public function updateAbout(Request $request, string $id)
    {
        $data = Landing_page_content::find($id);
        $data->section = $request->section;
        $data->content = $request->content;
        $data->judul = $request->judul;
        if ($request->hasFile('image')) {
            $data->foto = $request->file('image')->store('landing_page_image', 'public');
        }
        $data->save();
        return redirect()->route('landingpage.create')->with('success', 'Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
