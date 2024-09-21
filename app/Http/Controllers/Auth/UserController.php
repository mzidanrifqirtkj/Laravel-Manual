<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Pastikan hanya admin yang bisa mengakses
        if (Auth::guard('admin')->check()) {
            return view('user.dashboard'); // Ganti dengan view dashboard admin
        }

        return redirect('/login')->with('error', 'Unauthorized access.');
    }
}
