<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VotingController extends Controller
{
    public function index()
    {
        return view("voting.voting");
    }
    public function login()
    {
        return view("voting.voting-masuk");
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'code' => 'required|string'
        ]);

        $voting = DB::table('votings')->where('code', $request->code)->first();

        if (!$voting) {
            return back()->withErrors(['code' => 'Kode tidak ditemukan.']);
        }

        if (!$voting->status) {
            return back()->withErrors(['code' => 'Kode sudah tidak aktif.']);
        }

        Session::put('voting_code', $voting->code);

        return redirect()->route('voting');
    }

    public function voting(Request $request, $nama)
    {
        $data = Voting::where('code', session('voting_code'))->first();
        if ($data->status == 1) {
            $data->pilihan = $nama;
            $data->status = 0;
            $data->save();
            return back()->with('success', '');
        }
        return back();
    }

    public function showResults()
    {
        // Asumsikan Anda punya model bernama 'Pilihan' atau tabel 'pilihans'
        // Ganti 'pilihans' dengan nama tabel Anda dan 'nama_pilihan' dengan nama kolom Anda

        // Menghitung suara untuk 'Kanif'
        $totalKanif = DB::table('votings')->where('pilihan', 'kanif')->count();

        // Menghitung suara untuk 'Arma'
        $totalArma = DB::table('votings')->where('pilihan', 'arma')->count();

        // Menghitung total semua suara
        $totalSuara = $totalKanif + $totalArma;

        // Mengirim data ke view 'hasil-voting'
        return view('voting.hasil-voting', [
            'totalKanif' => $totalKanif,
            'totalArma' => $totalArma,
            'totalSuara' => $totalSuara
        ]);
    }

    public function cetak()
    {
        $votings = Voting::all();
        return view('voting.voting-cetak', ['votings' => $votings]);
    }
}
