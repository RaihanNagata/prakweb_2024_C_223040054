<?php
// Koneksi ke database
$host = 'localhost';  // Sesuaikan dengan host database Anda
$user = 'root';       // Ganti dengan username database Anda
$pass = '';           // Ganti dengan password database Anda
$db_name = 'prakweb_2024_C_223040054';

$conn = new mysqli($host, $user, $pass, $db_name);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar 10 Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }

        .table {
            margin-top: 30px;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 40px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Daftar Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Container utama -->
    <div class="container">
        <h1>Daftar 10 Buku</h1>

        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mengambil data dari tabel buku
                $sql = "SELECT * FROM buku LIMIT 10";
                $result = $conn->query($sql);
                $no = 1;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $no++ . "</td>
                            <td>{$row['judul']}</td>
                            <td>{$row['pengarang']}</td>
                            <td>{$row['penerbit']}</td>
                            <td>{$row['tahun_terbit']}</td>
                          </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Tidak ada data buku tersedia</td></tr>";
                }
                ?>
            </tbody>
            </