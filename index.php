<?php
session_start();
require 'koneksi_db.php';

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
  <title>Katalog HP</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f6fa;
      display: flex;
      justify-content: center;
      /* height: 100vh; */
    }

    .card {
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 70%;
      text-align: center;
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

    .error {
      color: red;
      text-align: center;
      margin-top: 10px;
    }

    .pesan {
      color: green;
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <div class="card">
    <a href="login.php">Login</a>

    <?php if (isset($_GET['error'])): ?>
      <div class="error"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <?php if (isset($_GET['pesan'])): ?>
      <div class="pesan"><?= htmlspecialchars($_GET['pesan']) ?></div>
    <?php endif; ?>
    <br>

    <p>Selamat Datang Di System "Katalog HP"</p>

    <table border="1" style="width: 100%; text-align: left;">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama HP</th>
          <th>Deskripsi</th>
          <th>Harga</th>
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
          </tr>
          <?php
          $no++;
        endforeach; ?>
      </tbody>
    </table>
  </div>
</body>

</html>