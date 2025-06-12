<?php
include '../../back/koneksi/koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda Harus Login Terlebih Dahulu!!'); window.location.href = '../index.php';</script>";
    exit;
}

if ($_SESSION['level'] == "Admin") {
    echo "<script>alert('Anda Tidak Mempunyai Akses Dihalaman Ini!!'); window.location.href = '../admin/dashboardadmin.php';</script>";
    exit;
}

$id_pengguna = $_SESSION['id_pengguna'];

// Proses upload foto
if (isset($_POST['upload'])) {
    $namaFile = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = "../../uploads/";
    $namaBaru = uniqid() . "_" . $namaFile;

    if (move_uploaded_file($tmp, $folder . $namaBaru)) {
        $koneksi->query("UPDATE tb_pengguna SET foto = '$namaBaru' WHERE id_pengguna = '$id_pengguna'");
        echo "<script>alert('Foto profil berhasil diperbarui!');window.location.href='".$_SERVER['PHP_SELF']."';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal upload gambar');</script>";
    }
}

include 'header.php';

// Ambil data user
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna = '$id_pengguna'"));
?>

<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-body d-flex flex-wrap align-items-center">
            <!-- Foto Profil -->
            <div class="text-center p-4">
                <img src="../../uploads/<?= $data['foto'] ?>" class="rounded-circle shadow" width="150" alt="Profile">
                <form method="POST" enctype="multipart/form-data" class="mt-3">
                    <input type="file" name="foto" accept="image/*" required>
                    <button type="submit" name="upload" class="btn btn-sm btn-outline-primary mt-2">Ganti Foto</button>
                </form>
                <h5 class="mt-3 text-primary fw-bold"><?= $data['nama'] ?></h5>
                <p class="text-muted"><?= $data['Status'] ?></p>
            </div>

            <!-- Informasi Profil -->
            <div class="col p-4">
                <h4 class="mb-4 fw-bold text-dark">Profil Kamu</h4>
                <div class="row mb-3">
                    <div class="col-sm-4 text-secondary fw-semibold">NIK</div>
                    <div class="col-sm-8 text-dark"><?= $data['nik'] ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 text-secondary fw-semibold">Nama</div>
                    <div class="col-sm-8 text-dark"><?= $data['nama'] ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 text-secondary fw-semibold">No HP</div>
                    <div class="col-sm-8 text-dark"><?= $data['no_hp'] ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 text-secondary fw-semibold">Alamat Lengkap</div>
                    <div class="col-sm-8 text-dark"><?= $data['alamat_lengkap'] ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 text-secondary fw-semibold">Status</div>
                    <div class="col-sm-8 text-dark"><?= $data['Status'] ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
