<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi | Sistem Pengaduan</title>
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
      max-width: 480px;
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

    .btn-secondary {
      background-color: #ccc;
      border-color: #ccc;
    }

    .btn-secondary:hover {
      background-color: #bbb;
      border-color: #bbb;
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

    .form-check-label {
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <div class="login-logo">
      <img src="assets/img/matur2.png" alt="Logo Sistem">
    </div>
    <h4 class="text-center mb-4">Form Registrasi Pengguna</h4>
    <form action="back/register.php" method="post">
      <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" name="nik" id="nik" maxlength="16" oninput="if((this.value.length)>16){this.value=this.value.substring(0,16);}" class="form-control" placeholder="Maks. 16 digit" required autocomplete="off">
      </div>

      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" required autocomplete="off">
      </div>

      <div class="mb-3">
        <label for="no_hp" class="form-label">No. Handphone</label>
        <input type="text" name="no_hp" id="no_hp" maxlength="13" class="form-control" placeholder="Maks. 13 digit" required autocomplete="off">
      </div>
    <div class="mb-3">
      <label for="kecamatan" class="form-label">Kecamatan</label>
      <select class="form-select" id="kecamatan" name="kecamatan" required>
        <option value="">-- Pilih Kecamatan --</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="desa" class="form-label">Kelurahan / Desa</label>
      <select class="form-select" id="desa" name="desa" required>
        <option value="">-- Pilih Kelurahan --</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="rt" class="form-label">RT</label>
      <input type="text" id="rt" name="rt" class="form-control" maxlength="3" required oninput="this.value=this.value.replace(/[^0-9]/g,'')" placeholder="Contoh: 01">
    </div>

    <div class="mb-3">
      <label for="rw" class="form-label">RW</label>
      <input type="text" id="rw" name="rw" class="form-control" maxlength="3" required oninput="this.value=this.value.replace(/[^0-9]/g,'')" placeholder="Contoh: 02">
    </div>

    <!-- Field alamat_lengkap (hidden) -->
    <input type="hidden" name="alamat_lengkap" id="alamat_lengkap">

      <div class="mb-3">
        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" required autocomplete="off">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" required autocomplete="off">
      </div>
      <div class="row mb-3">
        <div class="col-6 d-grid">
          <button type="submit" class="btn btn-primary" name="simpan" onclick="return confirm('Anda yakin ingin menyimpan data ini?')">Simpan</button>
        </div>
        <div class="col-6 d-grid">
          <button type="reset" class="btn btn-secondary" onclick="location.href='back/registrasi.php'">Reset</button>
        </div>
      </div>

      <p class="text-center link-reg">
        Sudah punya akun? <a href="index.php">Kembali ke login</a>
      </p>
    </form>
  </div>
<script>
  const idKotaSurabaya = "3578";

  // Load Kecamatan
  fetch("https://ibnux.github.io/data-indonesia/kecamatan/" + idKotaSurabaya + ".json")
    .then(response => response.json())
    .then(data => {
      const kecamatanSelect = document.getElementById("kecamatan");
      data.forEach(kec => {
        kecamatanSelect.innerHTML += `<option value="${kec.nama}">${kec.nama}</option>`;
      });
    });

  // Load Kelurahan berdasarkan kecamatan
  document.getElementById("kecamatan").addEventListener("change", function () {
    const kecamatanNama = this.value;
    fetch("https://ibnux.github.io/data-indonesia/kecamatan/" + idKotaSurabaya + ".json")
      .then(response => response.json())
      .then(kecamatanData => {
        const kec = kecamatanData.find(k => k.nama === kecamatanNama);
        if (kec) {
          fetch("https://ibnux.github.io/data-indonesia/kelurahan/" + kec.id + ".json")
            .then(res => res.json())
            .then(desaData => {
              const desaSelect = document.getElementById("desa");
              desaSelect.innerHTML = "<option value=''>-- Pilih Kelurahan --</option>";
              desaData.forEach(desa => {
                desaSelect.innerHTML += `<option value="${desa.nama}">${desa.nama}</option>`;
              });
              updateAlamatLengkap(); // update otomatis
            });
        }
      });
  });

  // Update alamat_lengkap saat Desa, RT, RW berubah
  document.getElementById("desa").addEventListener("change", updateAlamatLengkap);
  document.getElementById("rt").addEventListener("input", updateAlamatLengkap);
  document.getElementById("rw").addEventListener("input", updateAlamatLengkap);

  // Fungsi untuk update alamat_lengkap
  function updateAlamatLengkap() {
    const kecamatan = document.getElementById("kecamatan").value;
    const desa = document.getElementById("desa").value;
    const rt = document.getElementById("rt").value;
    const rw = document.getElementById("rw").value;

    let alamat = "";

    if (desa) alamat += desa;
    if (kecamatan) alamat += alamat ? ", " + kecamatan : kecamatan;
    if (rt) alamat += alamat ? ", RT " + rt : "RT " + rt;
    if (rw) alamat += alamat ? " / RW " + rw : "RW " + rw;

    document.getElementById("alamat_lengkap").value = alamat;
  }
</script>



  <script>
    function togglePassword() {
      const pw = document.getElementById("password");
      pw.type = pw.type === "password" ? "text" : "password";
    }
  </script>
</body>
</html>
