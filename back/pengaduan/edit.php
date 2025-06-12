<?php
include "../koneksi/koneksi.php";
session_start();
if (!isset($_SESSION['username'])) {
?>
    <script language="JavaScript">
        alert('Anda Harus Login  Terlebih Dahulu!!');
        document.location = '../../index.php';
    </script>
<?php
}
if ($_SESSION['level'] == "Admin") {
?>
    <script language="JavaScript">
        alert('Anda Tidak Mempunyai Akses Dihalaman Ini!!');
        document.location = '../../index.php';
    </script>
<?php
};
$id = $_GET['id'];
$ambilData = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE id_pengaduan='$id'");
$data = mysqli_fetch_array($ambilData);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengisian</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <style>
        body {
      background: linear-gradient(to right, #e0f7fa, #f1f8e9);
      font-family: 'Segoe UI', sans-serif;
      padding: 20px;
    }

    .card-form {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      max-width: 720px;
      margin: 0 auto;
    }

    h3 {
      text-align: center;
      font-weight: 600;
      color: #2c3e50;
    }

    label {
      font-weight: 500;
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.25rem rgba(30, 136, 229, 0.25);
      border-color: #2196f3;
    }

    .form-control::placeholder {
      color: #bbb;
    }

    .btn-custom {
      transition: all 0.3s ease;
      border-radius: 12px;
    }

    .btn-custom:hover {
      transform: scale(1.03);
    }

    .btn-group-custom {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 20px;
    }

    .badge-tip {
      font-size: 0.85rem;
      background-color: #e0f7fa;
      color: #00796b;
      border-radius: 10px;
      padding: 4px 10px;
      margin-top: 5px;
      display: inline-block;
    }

    .file-label {
      display: flex;
      align-items: center;
      gap: 8px;
    }
    </style>
</head>

<body>
    <div class="card-form">
        <h3><i class="fas fa-comment-dots me-2"></i>Form Pengaduan Masyarakat</h3>

        <form action="" method="post" class="tambah" enctype="multipart/form-data">
        <input type="hidden" name="id_pengguna" value="<?php echo $_SESSION['id_pengguna']; ?>">

        <div class="mb-3">
            <label for="pengaduan" class="form-label"><i class="fas fa-edit me-1"></i> Isi Pengaduan</label>
            <textarea class="form-control" id="pengaduan" name="pengaduan" rows="5" placeholder="<?php echo $data['pengaduan']; ?>"><?php echo htmlspecialchars($data['pengaduan']); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="img" class="form-label file-label"><i class="fas fa-image"></i> Upload Gambar (Opsional)</label>
            <input class="form-control" type="file" name="gambar" id="img" accept="image/*">
            <span class="badge-tip"><i class="fas fa-info-circle"></i> Format gambar .jpg, .jpeg, .png</span>
        </div>

        <div class="btn-group-custom">
            <a href="../../view/user/datapengaduanuser.php" class="btn btn-secondary btn-custom">
            <i class="fas fa-arrow-left"></i> Kembali
            </a>

            <button type="submit" name="simpan" class="btn btn-success btn-custom" onclick="return confirm('Yakin data sudah benar?')">
            <i class="fas fa-paper-plane"></i> Kirim
            </button>

            <button type="reset" class="btn btn-outline-danger btn-custom">
            <i class="fas fa-undo-alt"></i> Reset
            </button>
        </div>
        </form>
    </div>

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
if (isset($_POST['simpan'])) {
    $pengaduan = $_POST['pengaduan'];
    $tgl_pengaduan = date("Y-m-d");

    $nama_file = $_FILES["gambar"]["name"];
    $tmp_file = $_FILES["gambar"]["tmp_name"];
    $ukuran_gambar = $_FILES['gambar']['size'];
    $folder = '../../assets/img/';

    // Cek apakah user mengupload file atau tidak
    if (!empty($tmp_file)) {
        $fileinfo = @getimagesize($tmp_file);
        $width = $fileinfo[0];
        $height = $fileinfo[1];

        // Validasi ukuran dan dimensi gambar
        if ($ukuran_gambar > 80000000) {
            echo "<script>
                alert('Oops! Ukuran file terlalu besar. Maksimal 80MB');
                location = 'edit.php?id=$id';
            </script>";
            exit;
        } else if ($width > 10000 || $height > 10000) {
            echo "<script>
                alert('Oops! Dimensi gambar terlalu besar (maks 10000x10000 px)');
                location = 'edit.php?id=$id';
            </script>";
            exit;
        }

        // Simpan gambar dan update dengan gambar baru
        if (move_uploaded_file($tmp_file, $folder . $nama_file)) {
            $query = "UPDATE tb_pengaduan SET pengaduan='$pengaduan', tgl_pengaduan='$tgl_pengaduan', gambar='$nama_file' WHERE id_pengaduan='$id'";
        } else {
            echo "<script>
                alert('Gagal mengupload gambar');
                location = 'edit.php?id=$id';
            </script>";
            exit;
        }
    } else {
        // Update tanpa mengubah gambar
        $query = "UPDATE tb_pengaduan SET pengaduan='$pengaduan', tgl_pengaduan='$tgl_pengaduan' WHERE id_pengaduan='$id'";
    }

    // Jalankan query update
    $insert = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    echo "<script>
        alert('Data pengaduan berhasil diperbarui');
        location = '../../view/user/datapengaduanuser.php';
    </script>";
}
?>

<!-- 
$ambil = mysqli_query($koneksi, "UPDATE tb_pengaduan
SET kode_obat='$kode_obat',nama_obat='$nama_obat',produsen='$produsen',harga='$harga', stok='$stok', jenis_obat='$jenis_obat'
WHERE id='$id'") or die(mysqli_error($koneksi)); -->