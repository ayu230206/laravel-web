<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Menampilkan form register
    public function showRegister()
    {
        return view('register');
    }

    // Proses data register tanpa database
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => ['required', 'regex:/^[^0-9]*$/'],
            'alamat' => ['required', 'max:300'],
            'tanggal_lahir' => ['required', 'date'],
            'username' => ['required', 'string', 'max:255'],
            'password' => [
                'required',
                'min:6',
                'regex:/[A-Z]/', // Huruf besar
                'regex:/[0-9]/', // Angka
            ],
            'confirm_password' => ['required', 'same:password'],
        ], [
            'nama.regex' => 'Nama tidak boleh mengandung angka.',
            'alamat.max' => 'Alamat maksimal 300 karakter.',
            'password.regex' => 'Password harus mengandung huruf kapital dan angka.',
            'confirm_password.same' => 'Confirm Password tidak sesuai.',
        ]);

        // Ambil inputan user
        $name = $request->input('nama');
        $email = $request->input('username'); // misalnya username kamu anggap sebagai email
        $password = $request->input('password');

        // // Kirim ke halaman sukses
        // return view('signup-success', compact('name', 'email', 'password'));
        return redirect('/auth')->with('success', 'Registrasi berhasil! Silahkan Login');
        
    }
}
