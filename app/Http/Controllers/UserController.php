<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $infouser = User::all();
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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->getPassword());
        $user->role = $request->role;
        $user->nim = $request->nim;
        $user->angkatan = $request->angkatan;
        $user->jabatan = $request->jabatan;
        $user->divisi = $request->divisi;
        if ($request->hasFile('image')) {
            $user->foto = $request->file('image')->store('photo_profil', 'public');
        }
        $user->save();
        return redirect('/add-member')->with('success', 'Berhasil DI Tambah');
    }

    public function edit(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->getPassword());
        $user->role = $request->role;
        $user->nim = $request->nim;
        $user->angkatan = $request->angkatan;
        $user->jabatan = $request->jabatan;
        $user->divisi = $request->divisi;
        if ($request->hasFile('image')) {
            $user->foto = $request->file('image')->store('photo_profil', 'public');
        }
        $user->save();
        return redirect('/listuser')->with('success', 'Berhasil Diedit');
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
}
