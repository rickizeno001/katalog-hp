<?php
session_start();
require 'koneksi_db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
  $user = mysqli_fetch_assoc($result);
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['fullname'] = $user['fullname'];
  header("Location: admin.php");
  exit;
} else {
  header("Location: index.php?error=" . urlencode("Username atau password salah"));
  exit;
}
