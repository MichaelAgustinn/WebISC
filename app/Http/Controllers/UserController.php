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
            'name' => $request['name'],
            'email' => $request['email'],
        ]);

        if (!empty($request['password'])) {
            $user->password = bcrypt($request['password']);
        }

        $user->save();

        $profileData = $request['profile'] ?? [];

        if ($request->hasFile('profile.image')) {
            $oldPhoto = $user->profile->foto ?? null;
            if (!empty($oldPhoto) && Storage::disk('public')->exists($oldPhoto)) {
                Storage::disk('public')->delete($oldPhoto);
            }

            $profileData['foto'] = $request->file('profile.image')->store('photo_profil', 'public');
        }

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            $profileData
        );
        // $user = User::with('profile')->findOrFail($id);
        // $profile = Profile::find($user->id);
        // $user->fill($request->validated());
        // $user->save();

        // return $request->validated();
        // dd($user);
        // dd($request->validated());

        // Update data Profile jika ada
        // if ($user->profile) {
        //     $user->profile->nim = $request->nim;
        //     $user->profile->angkatan = $request->angkatan;
        //     $user->profile->jabatan = $request->jabatan;
        //     $user->profile->divisi = $request->divisi;

        //     // Handle file upload
        //     if ($request->hasFile('image')) {
        //         if ($user->profile->foto && Storage::disk('public')->exists($user->profile->foto)) {
        //             Storage::disk('public')->delete($user->profile->foto);
        //         }
        //         $user->profile->foto = $request->file('image')->store('photo_profil', 'public');
        //     }

        //     $user->profile->save();
        // }
        // dd($user);

        // $user->name = $validatedData['name'];
        // $user->email = $validatedData['email'];
        // $user->password = !empty($validatedData['password']) ? bcrypt($validatedData['password']) : $user->password;
        // $user->role = $validatedData['role'];

        // $profile->nim = $validatedData['nim'];
        // $profile->angkatan = $validatedData['angkatan'];
        // $profile->jabatan = $validatedData['jabatan'];
        // $profile->divisi = $validatedData['divisi'];

        // $profile->save();

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
