<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function index()
    {
        return view('dashboard.divisi.logo-lihat', [
            'logos' => Logo::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.divisi.logo');
    }

    public function store(Request $request)
    {
        $data = new Logo;
        $data->name = $request->name;
        if ($request->hasFile('image')) {
            $data->image = $request->file('image')->store('landing_page_image', 'public');
        }
        $data->save();
        return redirect()->route('logo.index')->with('success', 'Data Berhasil DItambahkan');
    }

    public function edit($id)
    {
        $logo = Logo::find($id);
        return view('dashboard.divisi.logo-edit', compact('logo'));
    }


    public function update(Request $request)
    {
        $data = Logo::find($request->id);
        $data->name = $request->name;
        if ($request->hasFile('image')) {
            $data->image = $request->file('image')->store('landing_page_image', 'public');
        }
        $data->save();
        return redirect()->route('logo.index')->with('success', 'Data Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $data = Logo::find($id);
        $data->delete();
        return redirect()->route('logo.index')->with('success', 'Data Berhasil Dihapus');
    }
}
