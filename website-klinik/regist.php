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

// menghasilkan ID Pasien baru secara otomatis
function generateIDPasien($conn)
{
    $sql = "SELECT MAX(id_pasien) AS max_id FROM pasien";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $maxID = $row['max_id'];

    // ID pasien diperiksa (sudah ada atau belum)
    if ($maxID === null) {
        $newID = 'PS1'; // Jika belum ada data, mulai dari PS1
    } else {
        $number = intval(substr($maxID, 2)); // Mengambil angka dari ID pasien terakhir
        $newNumber = $number + 1; // Menambahkan 1 ke angka terakhir
        $newID = 'PS' . $newNumber; // Format ID pasien dengan angka yang telah ditambahkan
    }

    return $newID;
}


?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="sytle_regist.css">
  <title>Klinik Sentosa</title>

  <style>
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

  <header>

  </header>

  <nav class="navbar">
    <a href="#" class="navbar-logo">KLINIK<span>SENTOSA</span></a>

    <div class="navbar-nav">
      <a href="index.php">Home</a>
      <a href="index.php#layanan">Layanan</a>
      <a href="index.php#profile-dokter">Profile Dokter</a>
      <a href="index.php#kontak">Kontak</a>
  </nav>
  </div>

  <!-- Regist Start -->
  <main>
    <div class="login">
      <h1>Daftar Pasien Baru</h1>
      <form method="post">
        <div class="txt-field">
          <input type="text" name="nama_pasien" required>
          <span></span>
          <label>Nama Lengkap</label>
        </div>
        <div class="radio-field">
          <input type="radio" id="Laki-laki" name="gender" value="L" required>
          <label for="Laki-laki">Laki-laki</label>
          <span></span>
          <input type="radio" id="Perempuan" name="gender" value="P" required>
          <label for="Perempuan">Perempuan</label>

        </div>
        <input type="submit" name="submit" value="Daftar">
        <div class="signup-link">
          Sudah pernah berobat? <a href="login.php">Masuk</a>
        </div>
      </form>
  </main>

  <div id="pesan"></div>

  <section>
    <?php
    // Memproses form pendaftaran pasien baru
    if (isset($_POST['submit'])) {
    $nama_pasien = $_POST['nama_pasien'];
    $jenis_kelamin = $_POST['gender'];

    // Menghasilkan ID Pasien baru secara otomatis
    $id_pasien = generateIDPasien($conn);

    // Memasukkan data pasien baru ke dalam tabel pasien
    $sql = "INSERT INTO pasien (id_pasien, nama_pasien, jenis_kelamin) VALUES ('$id_pasien', '$nama_pasien', '$jenis_kelamin')";

    if ($conn->query($sql) === TRUE) {
        echo "Pasien baru berhasil didaftarkan dengan ID: " . $id_pasien;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
    ?>
  </section>

  <!-- Regist End -->


  </main>
  <footer>
    <p>&copy; 2023 Klinik Sentosa. All rights reserved.</p>
  </footer>

</body>

</html>