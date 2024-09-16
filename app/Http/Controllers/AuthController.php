<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login () {

        return view('auth.login');

    }

    public function loginHandle (Request $request) {

          // Xác thực yêu cầu
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Kiểm tra đăng nhập
        if (Auth::attempt($credentials)) {
            // Xác thực thành công, chuyển hướng đến dashboard
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        // Xác thực thất bại
        return back()->withErrors([
            'email' => 'Account does not exist',
        ]);

    }







    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }


}
