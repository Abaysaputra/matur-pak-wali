<?php
ob_start();
session_start();
include '../koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Pengaduan Interaktif</title>

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

    <form action="simpan.php" method="post" class="mt-4" enctype="multipart/form-data">
      <input type="hidden" name="id_pengguna" value="<?php echo $_SESSION['id_pengguna']; ?>">

      <div class="mb-3">
        <label for="pengaduan" class="form-label"><i class="fas fa-edit me-1"></i> Isi Pengaduan</label>
        <textarea class="form-control" id="pengaduan" name="pengaduan" rows="5" placeholder="Tulis masalah atau keluhan Anda secara jelas..." required></textarea>
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
