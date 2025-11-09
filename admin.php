<?php
session_start();
require 'koneksi_db.php';

if (!$_SESSION['user_id']) {
  header("Location: index.php?error=" . urlencode("Anda harus login terlebih dahulu"));
}
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
      width: 300px;
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
  </style>
</head>

<body>
  <div class="card">
    <h2>Hai, <?php echo $_SESSION['fullname'] ?></h2>
    <p>Selamat Datang Di System "Katalog HP"</p>

    <center>
      <a href="logout.php">Logout</a>
    </center>
  </div>
</body>

</html>