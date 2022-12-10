<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function addUser(Request $request)
    {
        $userData = $request->validate(
            [
                'email' => ['unique:users'],
                'name' => ['min:3', 'max:255'],
                'no_hp' => ['numeric'],
                'password' => ['min:8', 'same:conf_pass'],
            ],

            $messages = array(
                'password.same' => 'Konfirmasi password tidak sesuai.',
                'no_hp.numeric' => 'Nomor hp harus berupa angka.',
                'password.min' => 'Password minimal 8 karakter.',
                'nama.min' => 'Nama minimal 3 karakter.',
                'email.unique' => 'Email telah terdaftar dalam database.',
                'email.email' => 'Masukan email yang benar.',
            )
        );

        $userData['password'] = bcrypt($userData['password']);

        User::create($userData); 

        return redirect('/login')
            ->with('toast', 'Registrasi berhasil, sekarang anda bisa login.')
            ->with('color', 'text-primary');
    }

    public function authUser(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => '',
                'password' => '',
            ],

            $messages = array(
                'email.email' => 'Masukan email yang benar.',
            )
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')
                ->with('toast', 'Selamat datang, ' . auth()->user()->name . '!')
                ->with('color', 'text-primary');
        };

        return back()
            ->with('toast', 'Email atau password salah.')
            ->with('color', 'text-danger');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('toast', 'Anda berhasil logout.')
            ->with('color', 'text-danger');;
    }
}
