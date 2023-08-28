<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function example()
    {
        return view('admin.example');
    }
}
