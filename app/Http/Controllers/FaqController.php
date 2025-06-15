<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $data = Faq::all();
        return view('dashboard.faq.faq', ['faqs' => $data]);
    }

    public function tambah()
    {
        return view('dashboard.faq.faq-tambah');
    }

    public function store(Request $request)
    {
        $data = new Faq();
        $data->question = $request->question;
        $data->answered = $request->answered;
        $data->save();
        return redirect()->route('faq.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        $data = Faq::find($request->id);
        $data->question = $request->question;
        $data->answered = $request->answered;
        $data->save();
        return redirect()->route('faq.index')->with('success', 'Data Berhasil Di Update');
    }

    public function destroy(Request $request)
    {
        $data = Faq::find($request->id);
        $data->delete();
        return redirect()->route('faq.index')->with('success', 'Data Berhasil Dihapus');
    }
}
