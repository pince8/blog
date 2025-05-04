<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Kullanıcı kayıt işlemi
    public function register(Request $request)
    {
        $request->validate([
            'adsoyad' => 'required|string|max:255',
            'meslek' => 'required|string|max:255',
            'adress' => 'required|string|max:1000',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User();
        $user->adsoyad = $request->adsoyad;
        $user->meslek = $request->meslek;
        $user->adress = $request->adress;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // Kullanıcıyı giriş yaptıktan sonra yönlendir
        Auth::login($user);

        return redirect()->route('login');
    }

    // Kullanıcı giriş işlemi
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors(['email' => 'Email or password is incorrect']);
    }

    // Kullanıcı çıkışı (logout)
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

