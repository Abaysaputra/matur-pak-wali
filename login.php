<?php
ob_start();
session_start();
include "back/koneksi/koneksi.php"
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Pengaduan Masyarakat</title>
    <link rel="stylesheet" type="text/css" href="asset/index.css">
</head>

<body style="background-image:url(BG.png)">
    <div class="bingkai">
        <h1>Silahkan Masuk</h1>
        <form class="login" action="" method="POST">
            <input class="username" autocomplete="off" type="text" name="username" class="" placeholder="Username" required>
            <input class="password" type="password" placeholder="Password" id="showpw" name="password" required>
            <br><br>
            <input type="checkbox" onclick="myFunction()">Tampilkan Password</input>

            <script>
                function myFunction(){
                    let x = documment.getElementById("showpw");
                    if (x.type == "password"){
                        x.type === "text";
                    }else{
                        x.type === "password";
                    }
                }
            </script>
            <button class="masuk" type="submit" name="masuk">Masuk</button>
        </form>
    </div>
</body>

</html>
<?php
session_start();
include 'koneksi.php'; // pastikan koneksi sudah tersambung

if (isset($_POST['masuk'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Gunakan prepared statement untuk mencegah SQL Injection
    $stmt = $koneksi->prepare("SELECT * FROM tb_pengguna WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah username ditemukan
    if ($result->num_rows === 1) {
        $data = $result->fetch_assoc();

        // Verifikasi password hash
        if (password_verify($password, $data['password'])) {
            $_SESSION['username'] = $data['username'];
            $_SESSION['level'] = $data['level'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['id_user'] = $data['id_user'];

            // Redirect berdasarkan level user
            if ($data['level'] == "Admin") {
                header("Location: view/dashboardadmin.php");
            } elseif ($data['level'] == "User") {
                header("Location: dashboard.php");
            }
            exit;
        } else {
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!');</script>";
    }
}
//     <script type="text/javascript">
//         alert("Username dan Password Anda Salah");
//     </script>
// <?php
?>