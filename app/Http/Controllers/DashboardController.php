<?php

namespace App\Http\Controllers;

use App\Models\Creation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        $totalCreation = Creation::count();
        // dd($totalUser);

        return view('dashboard.dashboard', ['totalUser' => $totalUser, 'totalCreation' => $totalCreation]);
    }
}
