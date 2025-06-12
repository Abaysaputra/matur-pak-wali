<?php
include '../../back/koneksi/koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
?>
    <script language="JavaScript">
        alert('Anda Harus Login  Terlebih Dahulu!!');
        document.location = '../index.php';
    </script>
<?php
}
if ($_SESSION['level'] == "Admin") {
?>
    <script language="JavaScript">
        alert('Anda Tidak Mempunyai Akses Dihalaman Ini!!');
        document.location = '../admin/dashboardadmin.php';
    </script>
<?php
};
include 'header.php';
$id_pengguna = $_SESSION['id_pengguna'];
?>
<?php
// Include koneksi database
// Proses upload foto
if (isset($_POST['upload'])) {
    $namaFile = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    $folder = "../../uploads/";
    $namaBaru = uniqid() . "." . $ext;
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($ext, $allowed) && $ukuran < 2 * 1024 * 1024) {
        if (move_uploaded_file($tmp, $folder . $namaBaru)) {
            mysqli_query($koneksi, "UPDATE tb_pengguna SET foto = '$namaBaru' WHERE id_pengguna = '$id_pengguna'");
            echo "<script>alert('Foto berhasil diperbarui!'); window.location.href='" . $_SERVER['PHP_SELF'] . "';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal menyimpan file.');</script>";
        }
    } else {
        echo "<script>alert('Hanya file gambar (jpg/png/gif) maks 2MB.');</script>";
    }
}

$user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna = '$id_pengguna'"));
$foto = !empty($user['foto']) ? $user['foto'] : 'User.png';
?>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <?php
        include "../../back/koneksi/koneksi.php";

      

        //kondisi jika parameter pencarian kosong
  
            $SqlQuery = mysqli_query($koneksi, "SELECT * FROM tb_pengguna where tb_pengguna.id_pengguna =$id_pengguna");
       

        foreach ($SqlQuery as $row ) {
        ?>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-800"> <?php echo $row['nama']; ?></span>
                                <img src="../../uploads/<?= $foto ?>" class="rounded-circle shadow" width="40" height="40" style="object-fit: cover;" alt="Foto Profil">
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <div class="container-fluid">
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
                                </div>
                                <!-- Card Body -->
                 

                    <div class="content">
                        <div>
                            <div class="jumbotron d-flex">
                                <div class="content w-auto rounded-1 p-5 min-vh-50">
                                     <div class="text-center p-4">
                                        <img src="../../uploads/<?= $foto ?>" class="rounded-circle shadow" width="150" height="150" style="object-fit: cover;" alt="Foto Profil">
                                        <form method="POST" enctype="multipart/form-data" class="mt-3">
                                        <!-- Label dengan ikon upload -->
                                        <label for="file-upload">
                                            <img src="../../assets/img/user-avatar.png" width="40" height="40" alt="Upload Foto">
                                        </label>
                                        <!-- Input file disembunyikan -->
                                        <input type="file" id="file-upload" name="foto" accept="image/*" required hidden>
                                        
                                        <br><br>
                                        <button type="submit" name="upload" class="btn btn-sm btn-primary">Ganti Foto</button>
                                    </form>

                                    </div>
                                    <br><br><br><br>
                                    <!-- <div class="log d-flex mt-5">
                                        <img src="../../assets/img/matur2.png" alt="image" class="logo" width="40px">
                                        <p class="">Matur Bay</p>
                                    </div> -->
                                </div>
                                <div class="text p-4">
                                </div>
                        <form>
                          <fieldset disabled>
                            <div class="card shadow p-4">
                            <div class="card-header bg-primary text-white fw-bold fs-4 text-center">
                                Profil Kamu
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label fw-bold">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext border bg-light rounded px-3" value="<?php echo $row['nik']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label fw-bold">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext border bg-light rounded px-3" value="<?php echo $row['nama']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label fw-bold">Nomor HP</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext border bg-light rounded px-3" value="<?php echo $row['no_hp']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label fw-bold">Alamat Lengkap</label>
                                    <div class="col-sm-9">
                                        <textarea readonly class="form-control-plaintext border bg-light rounded px-3"><?php echo $row['alamat_lengkap']; ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label fw-bold">Status</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext border bg-light rounded px-3" value="<?php echo $row['Status']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
<?php
        }
            ?>
</div>
        </div>
    </div>
    <script src="../../assets/js/jquery-3.6.0.js"></script>
    <!-- <script src=".../assets/js/jquery.dataTables.min.js"></script>
 -->
    <script src="../../assets/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tabel').DataTable();
        });
    </script>
    

</div>
<?php include 'footer.php'; ?>
            </div>
            <!-- End of Main Content -->
