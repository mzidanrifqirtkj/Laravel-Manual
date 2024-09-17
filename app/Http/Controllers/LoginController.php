<?php

namespace App\Http\Controllers;

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
            return view('admin.dashboard');
        }

        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return view('user.dashboard');
        }

        return redirect('/login')->with('error', 'Email atau password salah.');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
