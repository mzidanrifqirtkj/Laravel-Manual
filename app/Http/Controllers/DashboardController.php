<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Metode untuk dashboard admin
    public function index()
    {
        // Pastikan hanya admin yang bisa mengakses
        if (Auth::guard('admin')->check()) {
            return view('admin.dashboard'); // Ganti dengan view dashboard admin
        }

        return redirect('/login')->with('error', 'Unauthorized access.');
    }

    // Metode untuk slide1 (hanya untuk admin)
    public function adminSlide()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.slide1'); // Ganti dengan view slide1 admin
        }

        return redirect('/login')->with('error', 'Unauthorized access.');
    }

    // Metode untuk slide2 (untuk user)
    public function userDashboard()
    {
        if (Auth::guard('user')->check()) {
            return view('user.dashboard'); // Ganti dengan view dashboard user
        }

        return redirect('/login')->with('error', 'Unauthorized access.');
    }

    public function userSlide()
    {
        if (Auth::guard('user')->check()) {
            return view('user.slide2'); // Ganti dengan view slide2 user
        }

        return redirect('/login')->with('error', 'Unauthorized access.');
    }
}
