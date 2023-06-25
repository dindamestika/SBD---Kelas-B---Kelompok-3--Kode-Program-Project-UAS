<?php
session_start();
if (!isset($_SESSION['username'])) {
    // Pengguna yang belum login, dialihkan ke halaman login
    header("Location: login.php");
    exit();
}

// Konfigurasi koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "poliklinik";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="sytle.css">
  <title>Klinik Sentosa - Data Pasien</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    align-items: center;
  }

  header {
    background-color: #355f65;
    color: #fff;
    padding: 20px;
    text-align: center;
  }

  nav {
    background-color: #f1f1f1;
    padding: 10px;
  }

  nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
  }

  nav li {
    display: inline;
  }

  nav a {
    display: block;
    color: #333;
    text-decoration: none;
    padding: 10px;
  }

  nav a:hover {
    background-color: #ddd;
  }

  main {
    padding: 20px;
  }

  h1 {
    text-align: center;
  }

  .hero-image {
    width: 100%;
    max-height: 400px;
    object-fit: cover;
  }

  .cta-buttons {
    text-align: center;
    margin-bottom: 20px;
  }

  .cta-button {
    display: inline-block;
    width: 200px;
    padding: 10px;
    margin: 10px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 5px;
  }

  .cta-button:hover {
    background-color: #45a049;
  }

  .navbar {
    background-color: #f2f2f2;
    padding: 10px;
    text-align: center;
  }

  .navbar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
  }

  .navbar li {
    display: inline;
    margin-right: 40px;
  }

  .navbar li a {
    text-decoration: none;
    color: #555;
  }

  .navbar li a:hover {
    color: #000;
  }

  footer {
    text-align: center;
    padding: 10px;
    background-color: #f2f2f2;
    color: #000;
  }

  table {
    border-collapse: collapse;
    width: 100%;
  }

  th,
  td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
  }

  section {
    text-align: center;
  }
  </style>
</head>

<body?>
  <header>

  </header>

  <!-- Navbar Start -->
  <nav class="navbar">
    <a href="#" class="navbar-logo">KLINIK<span>SENTOSA</span></a>

    <div class="navbar-nav">
      <a href="index.php">Home</a>
      <a href="index.php#layanan">Layanan</a>
      <a href="index.php#profile-dokter">Profile Dokter</a>
      <a href="index.php#kontak">Kontak</a>
    </div>
  </nav>
  <!-- Navbar End -->

  <main>
    <section>
      <h2>Data Pasien</h2>
      <?php

      // Mengambil data pasien berdasarkan username
      $username = $_SESSION['username'];
      $sql = "SELECT * FROM pasien, dokter, obat, klinik WHERE pasien.nama_pasien='$username' AND klinik.id_pasien = pasien.id_pasien AND klinik.id_dokter = dokter.id_dokter AND klinik.id_obat = obat.id_obat";
      $result = $conn->query($sql);

      // Menampilkan data pasien
      if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID Pasien</th><th>Nama Pasien</th><th>Jenis Kelamin</th><th>ID Dokter</th><th>Nama Dokter</th><th>Spesialisasi</th><th>ID Obat</th><th>Nama Obat</th><th>Tanggal Kadaluarsa</th><th>ID Berobat</th><th>Tanggal Berobat</th><th>Hasil Diagnosa</th></tr>";
        while ($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["id_pasien"] . "</td><td>" . $row["nama_pasien"] . "</td><td>" . $row["jenis_kelamin"] . "</td><td>" . $row["id_dokter"] . "</td><td>" . $row["nama_dokter"] . "</td><td>" . $row["spesialis"] . "</td><td>" . $row["id_obat"] . "</td><td>" . $row["nama_obat"] . "</td><td>" . $row["tgl_kadaluarsa"] . "</td><td>" . $row["id_berobat"] . "</td><td>" . $row["tgl_berobat"] . "</td><td>" . $row["hasil_diagnosa"] . "</td></tr>";
        }
        echo "</table>";
      } else {
        echo "Data Pasien Tidak Ditemukan.";
      }
      ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2023 Klinik Sentosa. All rights reserved.</p>
  </footer>
  </body>

</html>