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
      height: 100vh;
    }

    .login-box {
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    input[type="text"],
    input[type="password"] {
      width: 93%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;

      margin-bottom: 20px;
    }

    button {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 6px;
      background-color: #3498db;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }

    button:hover {
      background-color: #2980b9;
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
  <div class="login-box">
    <h2>Login</h2>

    <?php if (isset($_GET['error'])): ?>
      <div class="error"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <?php if (isset($_GET['pesan'])): ?>
      <div class="pesan"><?= htmlspecialchars($_GET['pesan']) ?></div>
    <?php endif; ?>
    <br>

    <form action="login_aksi.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">LOGIN</button>
    </form>
  </div>
</body>

</html>