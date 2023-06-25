<?php

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
  <link rel="stylesheet" href="web.html">
  <title>Klinik Sentosa</title>

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
  </style>

</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar">
    <a href="#" class="navbar-logo">KLINIK<span>SENTOSA</span></a>

    <div class="navbar-nav">
      <a href="#beranda">Home</a>
      <a href="#layanan">Layanan</a>
      <a href="#profile-dokter">Profile Dokter</a>
      <a href="#kontak">Kontak</a>
    </div>
    <!-- Navbar End -->
  </nav>

  <main>
    <section class="hero" id="beranda">
      <img class="hero-image" src="Klinik.png" alt="Klinik XYZ">

      <p>Kami adalah klinik yang menyediakan layanan medis yang berkualitas</p>
      <p>Klinik Sentosa adalah klinik yang didirikan dengan tujuan menyediakan layanan kesehatan yang terjangkau dan
        berkualitas bagi masyarakat.</p>
      <p>
        <li>MISI</li>
      </p>
      <span> Terwujudnya pelayanan dan promosi kesehatan Klinik Pratama Kementerian PUPR yang professional melalui upaya
        peningkatan mutu untuk memberikan manfaat dan kepuasan kepada seluruh pelanggan</span>
      <p>
        <li>VISI</li>
      </p>
      <span>Peningkatan kompetensi petugas, pemastian pelayanan sesuai standar, peningkatan sumber daya serta
        peningkatan kepuasan kepada pelanggan.</span>


      <div class="cta-buttons">
        <a class="cta-button" href="login.php">Riwayat Data Berobat</a>
        <a class="cta-button" href="regist.php">Daftar Pasien Baru</a>
      </div>

    </section>

    <section>
      <h2 id="layanan">Layanan/Fasilitas</h2>
      <p>
        <li>Spesialis Jantung</li>
      </p>
      <p>
        <li>Spesialis Bedah</li>
      </p>
      <p>
        <li>Dokter Anak</li>
      </p>
      <p>
        <li>Poli Gigi</li>
      </p>
    </section>

    <section>
      <h2 id="profile-dokter">Profile Dokter</h2>
      <table>
        <thead>
          <tr>
            <th>Nama Dokter</th>
            <th>Spesialis</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sqlSelect = "SELECT * FROM dokter";
            $result = mysqli_query($conn,$sqlSelect);
            while($data = mysqli_fetch_array($result)){
            ?>
          <tr>
            <td><?= $data["nama_dokter"]; ?></td>
            <td><?= $data["spesialis"]; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

    </section>

    <section>
      <h2 id="kontak">Kontak</h2>
      <p>Email: kliniksentosa@gmaill.com</p>
      <p>Alamat: Jl. Dr. Moh. Hatta No. 123, Padang, Indonesia</p>
      <p>WhatsApp : +62-853-7412-5601</p>
      <p>Call Center: 123-567292</p>
    </section>

  </main>

  <footer>
    <p>&copy; 2023 Klinik Sentosa. All rights reserved.</p>
  </footer>
</body>

</html>