<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('login-form');
    }

    public function login(Request $request)
    {
        $nim = '2455301216';

        // Jika username dan password sama dengan NIM -> sukses
        if ($request->input('username') === $nim && $request->input('password') === $nim) {
            Session::put('username', $request->input('username'));

            return redirect()->route('home') // Arahkan ke halaman home
                ->with('success', 'Login berhasil! Username dan password sesuai dengan NIM.');

        }

        // Jalankan validasi normal (biarkan Laravel tangani redirect error)
        $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/',
            ],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 3 karakter.',
            'password.regex'    => 'Password harus mengandung minimal satu huruf kapital.',
        ]);

        // Jika validasi lolos tapi bukan NIM -> error custom
        return redirect()->route('auth.form')
            ->with('error', 'Username atau password tidak sesuai dengan NIM.');
    }
   

}

