<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Pastikan hanya admin yang bisa mengakses
        if (Auth::guard('admin')->check()) {
            return view('admin.dashboard'); // Ganti dengan view dashboard admin
        }

        return redirect('/login')->with('error', 'Unauthorized access.');
    }
}
