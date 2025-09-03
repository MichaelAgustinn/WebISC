<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $infouser = User::with('profile')->paginate(6);
        return view('dashboard.member.infoUser', ['infouser' => $infouser]);
    }

    public function addMember()
    {
        $infouser = User::all();
        return view('dashboard.member.addMember', ['infouser' => $infouser]);
    }

    public function storeMember(Request $request)
    {
        $user = new User;
        $profile = Profile::find($user->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->getPassword());
        $user->save();

        $profile->role = $request->role;
        $profile->nim = $request->nim;
        $profile->angkatan = $request->angkatan;
        $profile->jabatan = $request->jabatan;
        $profile->divisi = $request->divisi;
        if ($request->hasFile('image')) {
            $user->foto = $request->file('image')->store('photo_profil', 'public');
        }
        $profile->save();
        return redirect('/add-member')->with('success', 'Berhasil DI Tambah');
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::with('profile')->findOrFail($id);

        $user->fill([
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        if (!empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        $profileData = $request->input('profile', []);
        if (!empty($profileData['image'])) {
            // hapus lama
            $oldPhoto = $user->profile->foto ?? null;
            if (!empty($oldPhoto) && Storage::disk('public')->exists($oldPhoto)) {
                Storage::disk('public')->delete($oldPhoto);
            }

            // decode base64
            $image = preg_replace('/^data:image\/\w+;base64,/', '', $profileData['image']);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);

            $filename = uniqid() . '.jpg';
            Storage::disk('public')->put('photo_profil/' . $filename, $imageData);

            $profileData['foto'] = 'photo_profil/' . $filename;

            // hapus field image biar ga ikut ke DB
            unset($profileData['image']);
        }

        // update atau create profile
        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            $profileData
        );

        return redirect()->route('profile.index')->with('success', 'Berhasil Diedit');
    }


    public function validate()
    {
        $unverUser = User::where('role', 'None')->get();
        return view('dashboard.member.validasi', ['unverUser' => $unverUser]);
    }

    public function validated($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'anggota';
        $user->save();

        return redirect()->back()->with('success', ($user->name . ' Diverifikasi.'));
    }

    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back()->with('success', ($data->name . ' Dihapus.'));
    }
}
