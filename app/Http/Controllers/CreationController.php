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

    public function karyaSaya()
    {
        $data = Auth::user()->creation()->with('user')->get();
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
                'title'       => 'required|string|max:255',
                'description' => 'required|string',
                'divisi'      => 'required|string',
                'image'       => 'nullable|image|max:2048',   // untuk upload file biasa
                'image_base64' => 'nullable|string',           // untuk cropper (base64)
                'user_ids'    => 'nullable|array',
            ]);

            $data = new Creation();
            $data->fill([
                'title'       => $request->input('title'),
                'description' => $request->input('description'),
                'divisi'      => $request->input('divisi'),
            ]);

            $imagePath = null;
            // --- Prioritas: pakai hasil cropper (base64) ---
            if ($request->filled('image_base64')) {
                $image = preg_replace('/^data:image\/\w+;base64,/', '', $request->image_base64);
                $imageData = base64_decode($image);

                $filename  = uniqid() . '.jpg';
                Storage::disk('public')->put('karya/' . $filename, $imageData);

                $imagePath = 'karya/' . $filename;
            }
            // --- Kalau tidak ada cropper, pakai file upload biasa ---
            elseif ($request->hasFile('image')) {
                $file     = $request->file('image');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $imagePath = $file->storeAs('karya', $filename, 'public');
            }


            // Set path (boleh null kalau user tidak upload)
            $data->image_path = $imagePath;

            $data->save();

            // attach user login + user lain (kalau ada)
            $allUserIds   = $request->user_ids ?? [];
            $allUserIds[] = Auth::id();
            $data->user()->attach($allUserIds);

            DB::commit();

            return redirect()->route('karya.lihat')->with('success', 'Karya berhasil diunggah');
        } catch (\Exception $e) {
            DB::rollBack();

            // hapus file jika sempat terupload
            if (!empty($data->image_path) && Storage::disk('public')->exists($data->image_path)) {
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
