<?php

namespace App\Http\Controllers;

use App\Models\Landing_page_content;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('dashboard.general');
    }

    public function tambah(Request $request)
    {
        $data = new Landing_page_content;
        $data->section = $request->section;
        $data->content = $request->content;
        if ($request->hasFile('image')) {
            $data->image_path = $request->file('image')->store('landing_page_image', 'public');
        }
        $data->save();
        return redirect('/general');
    }
}
