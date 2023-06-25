<?php
session_start();
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

// Proses login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan validasi data login 

    // Periksa username dan password pada database
    $sql = "SELECT * FROM pasien WHERE nama_pasien='$username' AND id_pasien='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login berhasil, set session dan alihkan pengguna ke halaman pasien.php
        $_SESSION['username'] = $username;
        header("Location: pasien.php"); 
        exit();
    } else {
        $error = "Username atau password salah.";

    }
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="sytle_login.css">
  <title>Klinik Sentosa - Login</title>

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
      <a href="index.php">Home</a>
      <a href="index.php#layanan">Layanan</a>
      <a href="index.php#profile-dokter">Profile Dokter</a>
      <a href="index.php#kontak">Kontak</a>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Kolom login Start -->
  <main>
    <div class="login">
      <h1>Login</h1>
      <form method="post" action="">
        <div class="txt-field">
          <input type="text" name="username" required>
          <span></span>
          <label>Nama Pasien</label>
        </div>
        <div class="txt-field">
          <input type="text" name="password" required>
          <span></span>
          <label>ID Pasien</label>
        </div>
        <input type="submit" name="login" value="Login">
        <div class="signup-link">
          Pasien baru? <a href="regist.php">Daftar</a>
        </div>
      </form>
    </div>
  </main>
  <!-- Kolon login End -->

  <footer>
    <p>&copy; 2023 Klinik Sentosa. All rights reserved.</p>
  </footer>
</body>

</html>