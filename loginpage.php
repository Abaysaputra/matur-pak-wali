<?php
session_start();
include 'back/koneksi/koneksi.php';

// === Proses Login ===
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
    $password = trim($_POST['password']);

    // Ambil data berdasarkan username
    $query = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE username='$username'");
    $data = mysqli_fetch_assoc($query);

    // Jika data ditemukan dan password cocok
    if ($data && password_verify($password, $data['password'])) {
        // Set session
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['id_pengguna'] = $data['id_pengguna']; // Pastikan nama kolom sesuai

        // Redirect berdasarkan level
        if ($data['level'] == "Admin") {
            header("Location: view/admin/dashboardadmin.php");
        } else {
            header("Location: view/user/dashboarduser.php");
        }
        exit;
    } else {
        echo "<script>alert('Username atau Password salah'); window.location.href='loginpage.php';</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Sistem Pengaduan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #4e54c8, #8f94fb);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-box {
      background: #fff;
      padding: 2.5rem;
      border-radius: 16px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
      width: 100%;
      max-width: 420px;
      animation: fadeIn 0.6s ease-in-out;
    }

    .login-logo {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .login-logo img {
      width: 100px;
      height: auto;
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(78, 84, 200, 0.25);
      border-color: #4e54c8;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(-20px);}
      to {opacity: 1; transform: translateY(0);}
    }

    .btn-primary {
      background-color: #4e54c8;
      border-color: #4e54c8;
    }

    .btn-primary:hover {
      background-color: #3c40a0;
      border-color: #3c40a0;
    }

    .link-reg {
      font-size: 0.9rem;
      color: #555;
    }

    .link-reg a {
      color: #4e54c8;
      text-decoration: none;
    }

    .link-reg a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <div class="login-logo">
      <img src="assets/img/matur2.png" alt="Logo Sistem">
    </div>
    <h4 class="text-center mb-4">Masuk ke Sistem Pengaduan</h4>
    <form method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="username" required autocomplete="off">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
      </div>

      <div class="d-grid mb-3">
        <button type="submit" name="login" class="btn btn-primary">Login</button>
      </div>

      <p class="text-center link-reg">
        Belum punya akun? <a href="registrasi.php">Registrasi di sini</a>
      </p>
    </form>
  </div>
</body>
</html>
