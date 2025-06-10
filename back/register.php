<?php
include "koneksi/koneksi.php";

if (isset($_POST['simpan'])) {
    // Bersihkan dan ambil data dari POST
    $nik = mysqli_real_escape_string($koneksi, trim($_POST['nik']));
    $nama = mysqli_real_escape_string($koneksi, trim($_POST['nama']));
    $level = "User";
    $username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
    $password = mysqli_real_escape_string($koneksi, trim($_POST['password']));
    $Status = "Masyarakat";
    $no_hp = mysqli_real_escape_string($koneksi, trim($_POST['no_hp']));
    $tgl_lahir = $_POST['tgl_lahir'];
    $kecamatan = mysqli_real_escape_string($koneksi, trim($_POST['kecamatan']));
    $desa = mysqli_real_escape_string($koneksi, trim($_POST['desa']));
    $alamat_lengkap = mysqli_real_escape_string($koneksi, trim($_POST['alamat_lengkap'])); // gabungan kecamatan, desa, RT, RW

    // Validasi input kosong
    if ($nik == "" || $nama == "" || $username == "" || $password == "" || $tgl_lahir == "" || $no_hp == "" || $kecamatan == "" || $desa == "" || $alamat_lengkap == "") {
        echo "<script>
            alert('Input Tidak Boleh Kosong');
            window.location.href = '../registrasi.php';
        </script>";
        exit;
    }

    // Validasi nik numeric dan panjang 16 digit
    if (!is_numeric($nik) || strlen($nik) != 16) {
        echo "<script>
            alert('NIK harus berupa 16 digit angka');
            window.location.href = '../registrasi.php';
        </script>";
        exit;
    }

    // Validasi no_hp numeric dan max 13 digit
    if (!is_numeric($no_hp) || strlen($no_hp) > 13) {
        echo "<script>
            alert('No. HP harus berupa angka maksimal 13 digit');
            window.location.href = '../registrasi.php';
        </script>";
        exit;
    }

    // Cek NIK sudah terdaftar atau belum
    $cekNik = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE nik='$nik'");
    if (mysqli_num_rows($cekNik) > 0) {
        echo "<script>
            alert('NIK sudah terdaftar');
            window.location.href = '../registrasi.php';
        </script>";
        exit;
    }

    // Hash password (opsional, tapi sangat disarankan)
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Simpan data ke database, tambahkan kolom kecamatan, desa, alamat_lengkap jika ada di DB
    $insert = mysqli_query($koneksi, "INSERT INTO tb_pengguna (nik, username, level, password, no_hp, tgl_lahir, nama, Status, kecamatan, desa, alamat_lengkap) VALUES ('$nik', '$username', '$level', '$passwordHash', '$no_hp', '$tgl_lahir', '$nama', '$Status', '$kecamatan', '$desa', '$alamat_lengkap')");

    if ($insert) {
        echo "<script>
            alert('Good! Pengguna Berhasil Ditambahkan');
            window.location.href = '../index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menyimpan data: " . mysqli_error($koneksi) . "');
            window.location.href = '../registrasi.php';
        </script>";
    }
}
?>
