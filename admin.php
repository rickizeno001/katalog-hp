<?php
session_start();
require 'koneksi_db.php';

if (!$_SESSION['user_id']) {
  header("Location: login.php?error=" . urlencode("Anda harus login terlebih dahulu"));
}

// Query untuk cari data di tabel "phones"
$sql = "SELECT * FROM phones";

// Simpan hasil cari yg dari hasil pencarian table "phones"
$result = mysqli_query($conn, $sql);
$data_phone = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f6fa;
      display: flex;
      justify-content: center;
      align-items: center;
      /* height: 100vh; */
    }

    .card {
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 70%;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 18px;
    }

    .error {
      color: red;
      text-align: center;
      margin-top: 10px;
    }

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
</head>

<body>
  <div class="card">
    <center>
      <a href="logout.php">Logout</a>
    </center>

    <h2>Hai, <?php echo $_SESSION['fullname'] ?></h2>

    <center>
      <p>Selamat Datang Di System "Katalog HP"</p>
    </center>

    <a href="">Tambah Data</a>

    <table border="1" style="width: 100%; text-align: left; margin-top: 10px">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama HP</th>
          <th>Deskripsi</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $no = 1;
        foreach ($data_phone as $data): ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['name'] ?></td>
            <td><?php echo $data['description'] ?></td>
            <td><?php echo number_format($data['price']) ?></td>
            <td>
              <a href="">Edit</a>
              |
              <a href="">Hapus</a>
            </td>
          </tr>
          <?php
          $no++;
        endforeach; ?>
      </tbody>
    </table>
  </div>
</body>

</html>