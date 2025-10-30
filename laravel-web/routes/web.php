<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MhsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\CustomerController;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/pcr', function () {
//     return 'Selamat Datang di Website Kampus PCR!';
// });

// Route::get('/nama/{param1}', function ($param1) {
//     return 'Nama saya: '.$param1;
// });

// Route::get('/mahasiswa', function () {
//     return 'Halo Mahasiswa';
// })->name('mahasiswa.show');

// Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

// Route::get('/about', function () {
//     return view('halaman-about');
// });

// Route::get('home', [HomeController::class,'index']);

// Route::get('/halaman-pegawai', [PegawaiController::class,'index']);

// Route::get('/simple-home', [HomeController::class,'index']);



// Route::post('/home/signup', [HomeController::class, 'signup'])->name('home.signup');



// Route::view('/', 'simple-home')->name('home.form');

// // proses signup (POST)
// Route::post('/home/signup', [HomeController::class, 'signup'])->name('home.signup');

// Route::get('/home', [HomeController::class, 'index'])->name('home');



// Route::get('/', function () {
//     return view('welcome');
// });

//Auth
// Route::get('/auth', [AuthController::class, 'index'])->name('auth.form');
// Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
// Route::get('/home', function () {
//     return view('simple-home'); // Pastikan file view ini ada
// })->name('home');
// Route::post('/home/signup', [HomeController::class, 'signup'])->name('home.signup');


//mhssawit
// Route::get('/login-mahasiswa', [MhsController::class, 'showLoginForm'])->name('login.mahasiswa');
// Route::post('/login-mahasiswa', [MhsController::class, 'login'])->name('login.submit');
// Route::get('/home-mahasiswa', [MhsController::class, 'home'])->name('home.mahasiswa');
// Route::post('/logout', [MhsController::class, 'logout'])->name('logout');
// Route::get('/register-mahasiswa', [MhsController::class, 'showRegisterForm'])->name('register.form.mhs');
// Route::post('/register-mahasiswa', [MhsController::class, 'register'])->name('register.mhs');




// //registrasi
// Route::get('/register', [RegisterController::class, 'showRegister'])->name('register.show');
// Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.list');
Route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
//customer
Route::get('customer', [CustomerController::class, 'index'])->name('customer.list');
Route::get('customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('customer', [CustomerController::class, 'store'])->name('customer.store');
