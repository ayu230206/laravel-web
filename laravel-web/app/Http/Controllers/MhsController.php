<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MhsController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('login-mahasiswa');
    }

    // Proses login (bebas, tanpa validasi database)
    public function login(Request $request)
    {
        // Ambil input dari form
        $username = $request->input('username');
        $nim = $request->input('nim');
        $email = $request->input('email');
        $password = $request->input('password');

        // Simpan data ke session agar bisa ditampilkan di home
        $user = (object)[
            'name' => $username ?: 'Mahasiswa',
            'nim' => $nim ?: '2455301216',
            'email' => $email ?: 'mahasiswa@example.com',
            'password' => $password ?: 'password123',
        ];

        session(['user' => $user]);

        // Redirect langsung ke halaman home
        return redirect()->route('home.mahasiswa');
    }

    public function home()
    {
        $user = session('user');

        // Jika belum login, arahkan ke halaman login-mahasiswa
        if (!$user) {
            return redirect()->route('login.mahasiswa')->with('error', 'Silakan login dulu!');
        }

        return view('home-mahasiswa', compact('user'));
    }

    public function showRegisterForm()
    {
        return view('register-mahasiswa');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'regex:/^[^0-9]*$/'],
            'alamat' => ['required', 'max:300'],
            'tanggal_lahir' => ['required', 'date'],
            'username' => ['required', 'string', 'max:255'],
            'password' => [
                'required',
                'min:6',
                'regex:/[A-Z]/', // harus ada huruf kapital
                'regex:/[0-9]/', // harus ada angka
            ],
            'confirm_password' => ['required', 'same:password'],
        ], [
            'nama.regex' => 'Nama tidak boleh mengandung angka.',
            'alamat.max' => 'Alamat maksimal 300 karakter.',
            'password.regex' => 'Password harus mengandung huruf kapital dan angka.',
            'confirm_password.same' => 'Confirm Password tidak sesuai.',
        ]);

        // Simpan sementara ke session
        session([
            'registered_user' => [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'username' => $request->username,
                'password' => $request->password,
            ]
        ]);

        // Redirect langsung ke login-mahasiswa
        return redirect()->route('login.mahasiswa')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout(Request $request)
    {
        // Hapus semua data session user
        $request->session()->flush();
        $request->session()->regenerateToken();

        // Redirect ke halaman login mahasiswa
        return redirect()->route('login.mahasiswa')->with('success', 'Anda berhasil logout.');
    }
}

