<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(){

        return view('pages.auth.login');
    }

    public function register(){
        return view('pages.auth.register');
    }

    public function registerProses(Request $request) {
         $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5',
        ]);

             User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success', 'Registrasi Berhasil');
        return redirect('/login');
    }

   public function loginProses(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $user = Auth::user();

        if ($user->role === 'admin') {
            session()->flash('success', 'Login Berhasil');
            return redirect('/dashboard');
        }else if ($user->role === User::ROLE_USER) {
            session()->flash('success', 'Selamat datang '.$user->name);
            return redirect('/home');
        }else {
            Auth::logout();
            return redirect()->back()->with('error', 'Anda tidak memiliki akses admin.');
        }
    } else {
        return redirect()->back()->with('error', 'Email atau Password salah');
    }
}

     public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
