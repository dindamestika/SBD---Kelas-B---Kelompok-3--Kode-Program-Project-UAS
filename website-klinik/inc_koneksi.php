<?php
      // Konfigurasi koneksi database
      $host = 'localhost'; // host 
      $username = 'root'; // username database 
      $password = ''; // password database 
      $database = 'poliklinik'; // nama database 

      // Membuat koneksi ke database
      $koneksi = mysqli_connect($host, $username, $password, $database);

      // Memeriksa koneksi database
      if (!$koneksi) {
            die('Koneksi database gagal: ' . mysqli_connect_error());
      }

      // Query database
      $query = "SELECT * FROM dokter";
      $result = mysqli_query($koneksi, $query);

// Menampilkan data dari database
if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>ID Dokter : " . $row["id"] . "</p>";
            echo "<p>Nama Dokter: " . $row["nama"] . "</p>";
            echo "<p>Spesialis: " . $row["spesialis"] . "</p>";
      }
      } else {
      echo "<p>Data dokter tidak ditemukan.</p>";
      }

      // Menutup koneksi database
      mysqli_close($koneksi);

      ?>