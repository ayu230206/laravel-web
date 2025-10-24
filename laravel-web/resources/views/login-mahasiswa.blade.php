<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login Mahasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Animasi muncul lembut */
    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(40px) scale(0.95);
      }
      100% {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
    }

    .animate-fadeInUp {
      animation: fadeInUp 0.8s ease-out forwards;
    }
  </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-700 to-green-900">
  <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg opacity-0 animate-fadeInUp">
    <h1 class="text-2xl font-bold mb-6 text-center text-green-800">Login Mahasiswa</h1>

    {{-- Pesan error dari controller --}}
    @if(session('error'))
      <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
        {{ session('error') }}
      </div>
    @endif

    {{-- Pesan sukses (misalnya setelah logout) --}}
    @if(session('success'))
      <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
      @csrf

      {{-- Input Nama --}}
      <label class="block mb-2 font-medium text-gray-700">Nama</label>
      <input type="text" name="username" placeholder="Masukkan nama anda"
             class="w-full p-2 mb-4 border border-gray-300 rounded focus:ring-2 focus:ring-green-600">

      {{-- Input NIM --}}
      <label class="block mb-2 font-medium text-gray-700">NIM</label>
      <input type="text" name="nim" placeholder="Masukkan NIM anda"
             class="w-full p-2 mb-4 border border-gray-300 rounded focus:ring-2 focus:ring-green-600">

      {{-- Input Email --}}
      <label class="block mb-2 font-medium text-gray-700">Email</label>
      <input type="email" name="email" placeholder="Masukkan email anda"
             class="w-full p-2 mb-4 border border-gray-300 rounded focus:ring-2 focus:ring-green-600">

      {{-- Input Password --}}
      <label class="block mb-2 font-medium text-gray-700">Password</label>
      <input type="password" name="password" placeholder="Masukkan password anda"
             class="w-full p-2 mb-6 border border-gray-300 rounded focus:ring-2 focus:ring-green-600">

      {{-- Tombol Login --}}
      <button type="submit"
              class="w-full py-2 bg-green-800 text-white font-semibold rounded hover:bg-green-900 transition duration-300">
        Login
      </button>
    </form>
  </div>
</body>
</html>
