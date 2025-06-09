<?php

namespace App\Http\Controllers;

use App\Models\Creation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class CreationController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('dashboard.creation.karya', ['user' => $user]);
    }

    public function detail($id)
    {
        $data = Creation::find($id);
        return view('detail-creation', ['data' => $data]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'divisi' => 'required|string',
                'image' => 'nullable|image|max:2048',
                'user_ids' => 'nullable|array',
            ]);
            $data = new Creation();
            $data->title = $request->title;
            $data->description = $request->description;

            // Simpan gambar (kalau ada), dan catat path-nya
            if ($request->hasFile('image')) {
                $data->image_path = $request->file('image')->store('landing_page_image', 'public');
            }

            $data->divisi = $request->divisi;
            $data->save();

            // Tambahkan pembuat + user lainnya ke relasi
            $allUserIds = $request->user_ids ? $request->user_ids : [];
            $allUserIds[] = Auth::id();
            $data->User()->attach($allUserIds);

            // Commit transaksi jika semua berhasil
            DB::commit();

            return redirect()->route('karya.lihat')->with('success', 'Karya berhasil diunggah');
        } catch (\Exception $e) {
            DB::rollBack();

            // Hapus gambar yang sempat diunggah jika ada
            if (!empty($data->image_path)) {
                Storage::disk('public')->delete($data->image_path);
            }
            return redirect()->route('karya.lihat')->with('failed', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy() {}
}
