<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class VotingAuth
{
    public function handle(Request $request, Closure $next)
    {
        $code = Session::get('voting_code');

        if (!$code) {
            return redirect()->route('voting.login')->withErrors(['msg' => 'Silakan login dengan kode.']);
        }

        $voting = DB::table('votings')->where('code', $code)->first();

        if (!$voting || !$voting->status) {
            Session::forget('voting_code'); 
            return redirect()->route('voting.login')->with(['success' => 'Kode sudah digunakan | Terima kasih telah memilih']);
        }

        return $next($request);
    }
}
