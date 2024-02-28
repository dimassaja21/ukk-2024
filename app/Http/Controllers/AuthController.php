<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ], [
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 5 karakter',
            // 'email.confirmed' => 'Email salah!!',
            // 'password.confirmed' => 'Password salah!!',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/home')->withSuccess('Berhasil Login!!');
        }
        return redirect('/')->withErrors('Gagal Login!!');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:5',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah terpakai',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 5 karakter',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        if (Auth::attempt($request->only('name', 'email', 'password'))) {
            return redirect('/')->withSuccess('Berhasil Registrasi!!');
        }
        return redirect('/regsiter')->withErrors('Gagal Registrasi!!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->withSuccess('Berhasil Logout!!');
    }
}
