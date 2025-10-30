<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pegawai - {{ $employee['employee_name'] }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
        rel="stylesheet"
    >

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fff0f5, #ffe6ef);
            min-height: 100vh;
        }
        .profile-card {
            border-radius: 18px;
            border: none;
            overflow: hidden;
        }
        .sidebar {
            background: linear-gradient(180deg, #f78fb3, #f8a5c2);
            color: white;
            padding: 2rem 1rem;
            text-align: center;
        }
        .sidebar .profile-avatar {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            border: 4px solid white;
            background-color: #ffe6ef;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px auto;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .sidebar .profile-avatar i {
            font-size: 48px;
            color: #d63384;
        }
        .sidebar h4 {
            margin-bottom: 5px;
            font-weight: 600;
        }
        .sidebar p {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        .section-title {
            font-weight: 600;
            color: #d63384;
            border-bottom: 2px solid #f9d9e4;
            padding-bottom: 8px;
            margin-bottom: 1rem;
        }
        .list-group-item {
            border: none;
            padding: 0.6rem 0;
            display: flex;
            align-items: center;
        }
        .list-group-item i {
            color: #f06595;
            margin-right: 12px;
            font-size: 1.1rem;
            width: 22px;
            text-align: center;
        }
        .skill-badge {
            font-size: 0.85em;
            background-color: #f8a5c2 !important;
            color: white !important;
            margin: 3px;
        }
        .content-area {
            padding: 2rem;
            background: #fff;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card profile-card shadow-lg">
                <div class="row g-0">

                    <!-- Sidebar -->
                    <div class="col-md-4 sidebar">
                        <div class="profile-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <h4>{{ $employee['employee_name'] }}</h4>
                        <p>{{ $employee['position'] }}</p>
                    </div>

                    <!-- Content -->
                    <div class="col-md-8">
                        <div class="content-area">

                            <!-- Detail Pribadi -->
                            <h5 class="section-title">
                                <i class="bi bi-person-lines-fill"></i> Detail Pribadi
                            </h5>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="list-group-item">
                                        <i class="bi bi-cake2"></i>
                                        <strong>Usia:</strong>
                                        <span class="ms-auto">{{ $employee['age'] }} tahun</span>
                                    </div>
                                    <div class="list-group-item">
                                        <i class="bi bi-calendar-check"></i>
                                        <strong>Mulai Bekerja:</strong>
                                        <span class="ms-auto">{{ $employee['join_date'] }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="list-group-item">
                                        <i class="bi bi-hourglass-split"></i>
                                        <strong>Lama Bekerja:</strong>
                                        <span class="ms-auto">{{ round($employee['working_duration']) }} hari</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Keahlian -->
                            <h5 class="section-title mt-4">
                                <i class="bi bi-tools"></i> Keahlian
                            </h5>
                            <div>
                                @foreach($employee['skills'] as $skill)
                                    <span class="badge rounded-pill skill-badge">
                                        {{ $skill }}
                                    </span>
                                @endforeach
                            </div>

                            <!-- Karir & Finansial -->
                            <h5 class="section-title mt-4">
                                <i class="bi bi-briefcase-fill"></i> Karir & Finansial
                            </h5>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item">
                                    <i class="bi bi-cash-coin"></i>
                                    <strong>Gaji Bulanan:</strong>
                                    <span class="ms-auto">
                                        Rp {{ number_format($employee['salary'], 0, ',', '.') }}
                                    </span>
                                </div>
                                <div class="list-group-item">
                                    <i class="bi bi-bar-chart-line"></i>
                                    <strong>Status:</strong>
                                    <span class="ms-auto text-success fw-bold">
                                        {{ $employee['status'] }}
                                    </span>
                                </div>
                                <div class="list-group-item">
                                    <i class="bi bi-rocket-takeoff"></i>
                                    <strong>Cita-cita Karir:</strong>
                                    <span class="ms-auto">{{ $employee['career_goal'] }}</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div> <!-- row -->
            </div>
        </div>
    </div>
</div>

</body>
</html>
