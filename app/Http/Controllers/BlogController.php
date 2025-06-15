<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function detail()
    {
        return view('detail-blog');
    }

    public function index()
    {
        return view('blog');
    }
}
