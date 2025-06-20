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
        $users = User::with('profile')->where('role', '!=', 'Admin')->get();
        return view('dashboard.creation.karya', ['user' => $users]);
    }

    public function total()
    {
        $data = Creation::with('user')->get();
        return view('dashboard.creation.karya-total', ['data' => $data]);
    }

    public function detail($id)
    {
        $data = Creation::find($id);
        if (!$data || $data->status !== 'approve') {
            abort(404);
        }
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

            if ($request->hasFile('image')) {
                $data->image_path = $request->file('image')->store('landing_page_image', 'public');
            }

            $data->divisi = $request->divisi;
            $data->save();

            $allUserIds = $request->user_ids ? $request->user_ids : [];
            $allUserIds[] = Auth::id();
            $data->User()->attach($allUserIds);
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

    public function edit($id)
    {
        $creation = Creation::with('user')->find($id);
        $selectedUserIds = [];

        if ($creation && $creation->users) {
            $selectedUserIds = $creation->users->pluck('id')->toArray();
        }
        $users = User::with('profile')->where('role', '!=', 'Admin')->get();

        return view('dashboard.creation.karya-edit', compact('creation', 'users', 'selectedUserIds'));
    }

    public function destroy($id)
    {
        $data = Creation::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function validated($id)
    {
        $data = Creation::find($id);
        $data->status = 'approve';
        $data->save();
        return redirect()->back()->with('success', ($data->title . ' Diverifikasi.'));
    }

    public function unvalidated($id)
    {
        $data = Creation::find($id);
        $data->status = 'rejected';
        $data->save();
        return redirect()->back()->with('success', ($data->title . ' Diverifikasi.'));
    }

    public function validate()
    {
        $data = Creation::where('status', 'pending')->get();
        return view('dashboard.creation.karya-validate', ['data' => $data]);
    }
}
