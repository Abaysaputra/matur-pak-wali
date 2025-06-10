<?php
include '../../back/koneksi/koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
?>
    <script language="JavaScript">
        alert('Anda Harus Login Terlebih Dahulu!!');
        document.location = '../../index.php';
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
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "Select * from tb_pengaduan inner join tb_pengguna on tb_pengaduan.id_pengguna = tb_pengguna.id_pengguna where id_pengaduan = $id");
$row = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <style>
        .card-detail-custom {
            max-width: 900px; /* Limit max width for larger screens */
            margin: auto;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .img-preview-custom {
            max-width: 100%;
            height: auto;
            max-height: 250px; /* Limit image height in card */
            object-fit: contain; /* Ensures the image fits without cropping */
            display: block; /* Remove extra space below image */
            margin: 0 auto; /* Center image */
        }

        .modal-body img {
            width: 100%;
            height: auto;
            max-height: 70vh; /* Limit modal image height */
            object-fit: contain;
        }

        /* Adjust textarea height if needed */
        textarea.form-control-plaintext {
            min-height: 150px; /* Give more room for pengaduan text */
            resize: vertical; /* Allow vertical resizing */
        }
    </style>
</head>

<body>
    <div class="container-fluid py-4">
        <h3 class="card-title text-center mb-4">Detail Pengaduan</h3>

        <div class="card shadow-lg card-detail-custom">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-lg-7 col-md-12 mb-4 mb-lg-0">
                        <form>
                            <div class="mb-3">
                                <label for="nik" class="form-label fw-bold">NIK:</label>
                                <input type="text" class="form-control-plaintext" id="nik" value="<?php echo htmlspecialchars($row['nik']); ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label fw-bold">Nama:</label>
                                <input type="text" class="form-control-plaintext" id="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_pengaduan" class="form-label fw-bold">Tanggal Pengaduan:</label>
                                <input type="text" class="form-control-plaintext" id="tgl_pengaduan" value="<?php echo htmlspecialchars($row['tgl_pengaduan']); ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="pengaduan" class="form-label fw-bold">Pengaduan:</label>
                                <textarea class="form-control-plaintext" id="pengaduan" readonly><?php echo htmlspecialchars($row['pengaduan']); ?></textarea>
                            </div>
                        </form>
                        <a class="btn btn-secondary mt-3" href="../user/datapengaduanuser.php?id_pengguna=<?php echo htmlspecialchars($row['id_pengguna']); ?>">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <div class="col-lg-5 col-md-12 text-center d-flex flex-column justify-content-between align-items-center">
                        <div class="mb-4">
                            <label for="gambar" class="form-label fw-bold">Gambar:</label><br>
                            <?php if (!empty($row['gambar'])): ?>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal">
                                    <img src="../../assets/img/<?php echo htmlspecialchars($row['gambar']); ?>" class="img-fluid img-thumbnail img-preview-custom" alt="Gambar Pengaduan">
                                    <p class="small text-muted mt-2">Klik gambar untuk memperbesar</p>
                                </a>
                            <?php else: ?>
                                <p class="text-muted">Tidak ada gambar terlampir.</p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mt-auto w-100">
                            <a href="respon.php?id_pengaduan=<?php echo htmlspecialchars($id); ?>" class="btn btn-danger w-100">Berikan Respon</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Gambar Pengaduan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <?php if (!empty($row['gambar'])): ?>
                        <img src="../../assets/img/<?php echo htmlspecialchars($row['gambar']); ?>" class="img-fluid" alt="Gambar Pengaduan Besar">
                    <?php else: ?>
                        <p class="text-muted">Tidak ada gambar terlampir.</p>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>