<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $infouser = User::all();
        return view('dashboard.infoUser', ['infouser' => $infouser]);
    }

    public function validate()
    {
        $infouser = User::all();
        return view('dashboard.validasi');
    }
}
