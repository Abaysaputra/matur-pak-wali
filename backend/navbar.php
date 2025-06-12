<?php
// Ambil nama file dari URL saat ini
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
        <!-- Favicon -->
        <link rel="icon" href="assets/images/BudiUtama.webp">
       <!-- My CSS -->
    <link rel="stylesheet" href="../assets/css/main.css">

    <style>
    

        #scrollTopBtn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background-color: #6c7fe1;
            color: white;
            font-size: 24px;
            border: none;
            z-index: 9999;
            border-radius: 50%;
            cursor: pointer;
            display: none; /* Awalnya disembunyikan */
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        #scrollTopBtn:hover {
            background-color:rgb(162, 176, 246);
            transform: scale(1.1);
        }

    </style>
</head>
<body class="loading">
<nav class="navbar navbar-expand-md navbar-light bg-transparent py-4">
        <div class="container">
            <a class="navbar-brand" href="#" style="position: absoulute;">
                <img src="/assets/images/BudiUtama.webp" class="logo-img" alt="Logo">
                <!-- <span class="logo-text">Jasa <br> Wibucode.</span> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <img src="/assets/images/bar.png" class="bar-btn" alt="" >
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'index.php') ? 'active' : ''; ?>" href="/index.php">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= ($current_page == 'hargalayanan.php') ? 'active' : ''; ?>" href="views/hargalayanan.php" id="hargaLayananDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Harga & Layanan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="hargaLayananDropdown">
                            <li><a class="dropdown-item mb-2 <?= ($current_page == 'desain-rumah.php') ? 'active' : ''; ?>" href="/views/desain-rumah.php">Jasa Desain Rumah</a></li>
                            <!-- <li><a class="dropdown-item mb-2 <?= ($current_page == 'desainIntrior.php') ? 'active' : ''; ?>" href="/views/desainIntrior.php">Jasa Desain Rumah Interior</a></li> -->
                            <li><a class="dropdown-item mb-2 <?= ($current_page == 'jasabangunanetc.php') ? 'active' : ''; ?>" href="/views/jasabangunanetc.php">Jasa Desain Bangunan Lainnya</a></li>
                            <li><a class="dropdown-item mb-2 <?= ($current_page == 'apa-yang-didapat.php') ? 'active' : ''; ?>" href="/views/apa-yang-didapat.php">Apa Yang Saya Dapatkan?</a></li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'produk.php') ? 'active' : ''; ?>" href="/views/produk.php">Produk</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= ($current_page == 'informasi.php') ? 'active' : ''; ?>" href="/index.php" id="hargaLayananDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">informasi</a>
                        <ul class="dropdown-menu" aria-labelledby="hargaLayananDropdown">
                            <li><a class="dropdown-item <?= ($current_page == 'faq.php') ? 'active' : ''; ?>" href="/index.php#faq">FAQ</a></li>
                            <li><a class="dropdown-item <?= ($current_page == 'loker.php') ? 'active' : ''; ?>" href="/views/loker.php">Lowongan Kerja</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'contact.php') ? 'active' : ''; ?>" href="/views/contact.php">Contact Me</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Tombol Scroll ke Atas -->
<button id="scrollTopBtn" onclick="scrollToTop()">
    &#8679;
</button>

  <!-- Bootstrap Bundle JS -->
  <script src="../assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>

<!-- AOS JS -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <!-- Link AOS Library -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<!-- Initialize AOS -->
<script>
    AOS.init({
        duration: 600,
        offset: 100,
        easing: 'ease-in-out',
    });
</script>
</body>
</html>