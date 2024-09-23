<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // dd($request->all);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        }

        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.dashboard');
        }

        return redirect('/login')->with('error', 'Email atau password salah.');
    }

    public function logout()
{
    if (Auth::guard('admin')->check()) {
        Auth::guard('admin')->logout();
    } elseif (Auth::guard('user')->check()) {
        Auth::guard('user')->logout();
    }

    // Redirect ke halaman login setelah logout
    return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
}
}
