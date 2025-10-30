<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light p-4">
  <div class="container">
    <div class="col-md-6 mx-auto bg-white p-4 shadow rounded">
      <h3 class="text-center mb-4">Form Registrasi Mahasiswa</h3>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('register.mhs') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control">
        </div>
        <div class="mb-3">
          <label>Alamat</label>
          <textarea name="alamat" class="form-control"></textarea>
        </div>
        <div class="mb-3">
          <label>Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" class="form-control">
        </div>
        <div class="mb-3">
          <label>Username</label>
          <input type="text" name="username" class="form-control">
        </div>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
          <label>Konfirmasi Password</label>
          <input type="password" name="confirm_password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary w-100">Daftar</button>
      </form>
    </div>
  </div>
</body>
</html>
