<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login_page()
    {
        return view("loginPage");
    }

    public function handleLogin(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        try {
            if(Auth::attempt($validate)) {
                $request->session()->regenerate();

                return redirect()->intended(route('dashboard'));
            }
        } catch(Exception $e) {
            Log::error('Login Error : ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'data' => $validate
            ]);

            return back()->withInput()->with('error', 'Error, terjadi kesalahan pada sistem! ' . $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/loginPage')->with('success', 'Anda berhasil logout');
    }
}
