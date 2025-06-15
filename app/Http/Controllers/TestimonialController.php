<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function lihat()
    {
        $testimonials = Testimonial::all();
        return view('dashboard.testimonial.testimonial-lihat', ['testimonials' => $testimonials]);
    }
    public function index()
    {
        $users = User::all();
        return view('dashboard.testimonial.testimonial', ['users' => $users]);
    }

    public function create(Request $request)
    {
        $data = new Testimonial();
        $data->user_id = $request->user_id;
        $data->rating = $request->rating;
        $data->message = $request->message;
        $data->save();
        return redirect()->route('testimonial.lihat')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = Testimonial::find($id);
        return view('dashboard.testimonial.testimonial-edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $data = Testimonial::find($request->id);
        $data->user_id = $request->user_id;
        $data->rating = $request->rating;
        $data->message = $request->message;
        $data->save();
        return redirect()->route('testimonial.lihat')->with('success', 'Data Berhasil Diedit');
    }

    public function destroy(Request $request)
    {
        $data = Testimonial::find($request->id);
        // dd($data);
        $data->delete();
        return redirect()->route('testimonial.lihat')->with('deleted', 'Data Berhasil Dihapus');
    }
}
