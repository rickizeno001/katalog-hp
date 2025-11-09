<?php
session_start();

// panggil file koneksi_db.php
require 'koneksi_db.php';

// Tangkap data yg dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk cari username dan password di tabel "users"
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";

// Simpan hasil cari yg dari hasil pencarian table "users"
$result = mysqli_query($conn, $sql);

// Jika data nya ketemu minimal 1 data ketemu
if (mysqli_num_rows($result) === 1) {

  // Convert hasil data yg di cari jadi array
  $user = mysqli_fetch_assoc($result);

  // Buat session
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['fullname'] = $user['fullname'];

  // Arahkan ke admin.php
  header("Location: admin.php");
  exit;
} else {
  // Kalo username dan password tidak ditemukan arahkan ke login.php
  header("Location: login.php?error=" . urlencode("Username atau password salah"));
  exit;
}
