{{-- resources/views/home-mahasiswa.blade.php --}}
@php
$nama = $user->name; // Ambil dari session MhsController
$inisial = strtoupper(substr($nama, 0, 1));
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Mahasiswa</title>
<!-- Bootstrap & Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Custom Styles -->
<style>
body { font-family: 'Poppins', sans-serif; background-color: #f9fafb; overflow-x: hidden; }
.sidebar { background: linear-gradient(180deg, #14532d, #1b5e20); width: 260px;
 position: fixed; top:0; left:0; height:100vh; color:white; display:flex; flex-direction:column;
 justify-content:space-between; transition: all 0.3s; z-index:1050; }
.sidebar.collapsed { width:80px; }
.sidebar-header { padding:25px 20px; border-bottom:1px solid rgba(255,255,255,0.1); text-align:center; }
.sidebar h4 { font-size:1.2rem; font-weight:600; color:#fff; white-space:nowrap; }
.nav-link { color:#d7ffd9; padding:12px 20px; display:flex; align-items:center; gap:12px; border-radius:10px;
margin:4px 10px; transition:0.3s; font-weight:500; white-space:nowrap; }
.nav-link i { min-width:20px; text-align:center; }
.nav-link.active, .nav-link:hover { background-color:#2e7d32; color:#fff !important; }
.nav-footer { text-align:center; font-size:0.8rem; opacity:0.8; padding:20px; }
.main-content { margin-left:260px; transition:all 0.3s; min-height:100vh; background-color:#f9fafb; }
.main-content.collapsed { margin-left:80px; }
.navbar { background:white; border-bottom:1px solid #e5e7eb; padding:15px 30px;
display:flex; justify-content:space-between; align-items:center; position:sticky; top:0; z-index:100; }
.navbar-brand { font-weight:600; color:#166534; font-size:1.3rem; }
.profile-icon { background-color:#e6f4ea; border-radius:50%; width:44px; height:44px; display:flex;
align-items:center; justify-content:center; color:#166534; font-weight:600; font-size:1.2rem; margin-right:10px; }
.card { border:none; border-radius:16px; box-shadow:0 4px 12px rgba(0,0,0,0.05); transition: all 0.3s; }
.card:hover { transform:translateY(-4px); box-shadow:0 6px 16px rgba(0,0,0,0.08); }
.timeline { list-style:none; position:relative; padding-left:30px; margin-top:20px; }
.timeline::before { content:''; position:absolute; left:12px; top:0; bottom:0; width:2px; background:#1b5e20; }
.timeline li { margin-bottom:20px; position:relative; }
.timeline li::before { content:''; position:absolute; left:-2px; top:6px; width:12px;
 height:12px; border-radius:50%; background:#2e7d32; }
.collapse-btn { position:absolute; top:15px; right:-15px; width:30px; height:30px;
 background:#14532d; color:#fff; border-radius:50%; display:flex; align-items:center;
 justify-content:center; cursor:pointer; box-shadow:0 2px 6px rgba(0,0,0,0.2); transition:all 0.3s; }
.collapse-btn:hover { background:#2e7d32; }
</style>
</head>
<body>
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <div>
    <div class="sidebar-header">
      <h4><i class="bi bi-person-badge me-2"></i>Mahasiswa</h4>
    </div>
    <nav class="nav flex-column mt-3">
      <a href="#profile" class="nav-link active" data-bs-toggle="tab"><i class="bi bi-person-circle"></i> <span class="link-text">Profil</span></a>
      <a href="#ipk" class="nav-link" data-bs-toggle="tab"><i class="bi bi-bar-chart"></i> <span class="link-text">IPK</span></a>
      <a href="#proyek" class="nav-link" data-bs-toggle="tab"><i class="bi bi-code-slash"></i> <span class="link-text">Proyek Akhir</span></a>
      <a href="#magang" class="nav-link" data-bs-toggle="tab"><i class="bi bi-building-check"></i> <span class="link-text">Magang</span></a>
      <a href="#forum" class="nav-link" data-bs-toggle="tab"><i class="bi bi-people-fill"></i> <span class="link-text">Forum</span></a>
      <a href="#notifikasi" class="nav-link" data-bs-toggle="tab"><i class="bi bi-bell-fill"></i> <span class="link-text">Notifikasi</span></a>
    </nav>
  </div>

  <div class="p-3">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn btn-outline-light w-100"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
    </form>
    <div class="nav-footer mt-3"><small>© 2025 Dashboard Mahasiswa</small></div>
  </div>

  <div class="collapse-btn" id="collapseBtn"><i class="bi bi-chevron-left"></i></div>
</div>

<!-- Main Content -->
<div class="main-content" id="mainContent">
  <nav class="navbar">
    <div class="navbar-brand"><i class="bi bi-speedometer2 me-2"></i>Dashboard Mahasiswa</div>
    <div class="d-flex align-items-center">
      <div class="profile-icon">{{ $inisial }}</div>
      <span class="fw-semibold text-secondary me-3">{{ $nama }}</span>
    </div>
  </nav>

  <div class="content tab-content p-4">
    {{-- Profil --}}
    <div class="tab-pane fade show active" id="profile">
      <div class="card p-4 mt-3">
        <h5 class="mb-3 text-success"><i class="bi bi-person-circle me-2"></i>Profil Mahasiswa</h5>
        <p><strong>Nama:</strong> {{ $nama }}</p>
        <p><strong>NIM:</strong> 23051100XX</p>
        <p><strong>Program Studi:</strong> Teknologi Rekayasa Komputer</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
      </div>
    </div>

    {{-- IPK --}}
    <div class="tab-pane fade" id="ipk">
      <div class="row g-4 mt-2">
        <div class="col-lg-7">
          <div class="card p-4">
            <h5 class="mb-3 text-success"><i class="bi bi-graph-up-arrow me-2"></i>Grafik IPK Tiap Semester</h5>
            <canvas id="ipkChart" height="200"></canvas>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card text-center p-5">
            <h6 class="text-muted">IPK Terakhir</h6>
            <h1 class="text-success display-3 fw-bold">3.82</h1>
            <p class="text-secondary mb-0">Status: <strong>Sangat Memuaskan</strong></p>
          </div>
        </div>
      </div>
    </div>

    {{-- Proyek Akhir --}}
    <div class="tab-pane fade" id="proyek">
      <div class="card p-4 mt-4">
        <h5 class="mb-3 text-success"><i class="bi bi-code-slash me-2"></i>Informasi Proyek Akhir</h5>
        <p><strong>Judul:</strong> Sistem Prediksi Panen Sawit Menggunakan Machine Learning</p>
        <p><strong>Dosen Pembimbing:</strong> Dr. Ir. Budi Santoso, M.T</p>
        <p><strong>Status:</strong> Sedang Diuji Proposal</p>
      </div>
    </div>

    {{-- Magang --}}
    <div class="tab-pane fade" id="magang">
      <div class="card p-4 mt-4">
        <h5 class="mb-3 text-success"><i class="bi bi-building-check me-2"></i>Informasi Magang</h5>
        <p><strong>Perusahaan:</strong> PT Astra Agro Lestari</p>
        <p><strong>Durasi:</strong> Juni - September 2025</p>
        <p><strong>Status:</strong> Selesai & Mendapatkan Sertifikat</p>
      </div>
    </div>

    {{-- Forum --}}
    <div class="tab-pane fade" id="forum">
      <div class="card p-4 mt-4">
        <h5 class="mb-3 text-success"><i class="bi bi-people-fill me-2"></i>Forum Mahasiswa</h5>
        <p>Belum ada postingan. Nantinya di sini mahasiswa bisa berdiskusi atau berbagi info seperti LinkedIn.</p>
      </div>
    </div>

    {{-- Notifikasi --}}
    <div class="tab-pane fade" id="notifikasi">
      <div class="card p-4 mt-4">
        <h5 class="mb-3 text-success"><i class="bi bi-bell-fill me-2"></i>Notifikasi Terbaru</h5>
        <ul class="timeline">
          <li><strong>20 Okt 2025</strong> — Forum Mahasiswa telah tersedia di dashboard.</li>
          <li><strong>10 Okt 2025</strong> — Pengumpulan draft laporan PA maksimal tanggal 15 Oktober 2025.</li>
          <li><strong>1 Okt 2025</strong> — KRS online semester ganjil telah dibuka.</li>
        </ul>
      </div>
    </div>
  </div>
</div>

{{-- Scripts --}}
<script>
const ctx = document.getElementById('ipkChart');
new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Semester 1','Semester 2','Semester 3','Semester 4'],
    datasets:[{
      label:'Nilai IPK',
      data:[3.4,3.6,3.75,3.82],
      borderColor:'#2e7d32',
      backgroundColor:'rgba(46,125,50,0.25)',
      fill:true,
      tension:0.4,
      pointRadius:5,
      pointBackgroundColor:'#1b5e20'
    }]
  },
  options:{ scales:{ y:{ beginAtZero:true, max:4 } }, plugins:{ legend:{ display:false } } }
});

// Sidebar Collapse
const sidebar = document.getElementById('sidebar');
const mainContent = document.getElementById('mainContent');
const collapseBtn = document.getElementById('collapseBtn');
collapseBtn.addEventListener('click', () => {
  sidebar.classList.toggle('collapsed');
  mainContent.classList.toggle('collapsed');
  collapseBtn.innerHTML = sidebar.classList.contains('collapsed')
    ? '<i class="bi bi-chevron-right"></i>'
    : '<i class="bi bi-chevron-left"></i>';
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
