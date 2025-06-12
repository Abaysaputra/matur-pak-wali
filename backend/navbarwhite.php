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
        <link rel="icon" href="assets/img/matur2.png" type="image/png">
       <!-- My CSS -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <style>

        .navbar-nav .nav-item .nav-link.active::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 2px;
            background-color: #ea7c58;
            bottom: 2.5px;
            left: 50%;
            transform: translateX(-50%);
        }    
        .dropdown-menu{
            
        }
        .dropdown-item.active, .dropdown-item:active{
            background-color: #b1a29f;
            border-radius: 8px;
        }
        @media (max-width: 768px) {
            .navbar-nav .nav-link {
                color: #3a3c45 !important;
            }
        }
                /* Tombol Scroll ke Atas */
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
<nav class="navbar navbar-expand-md navbar-light bg-transparent py-4 " style="">
        <div class="container">
            <a class="navbar-brand" href="#" style="position: absoulute; left: 10px; z-index: 9999;">
                <img src="assets/img/matur.png" class="logo-img" alt="Logo" whidth="50" height="50">
                <!-- <span class="logo-text">Jasa <br> Wibucode.</span> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <img src="/assets/images/menu.png" class="bar-btn" alt="" >
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item text-white">
                        <a class="nav-link <?= ($current_page == 'index.php') ? 'active' : ''; ?> text-white" href="/index.php">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= ($current_page == 'hargalayanan.php') ? 'active' : ''; ?> text-white" href="views/hargalayanan.php" id="hargaLayananDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Layanan Kami 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="hargaLayananDropdown">
                            <li><a class="dropdown-item mb-2 <?= ($current_page == 'desain-rumah.php') ? 'active' : ''; ?>" href="#about">Apa Itu Matur Pak Wali?</a></li>
                            <!-- <li><a class="dropdown-item mb-2 <?= ($current_page == 'desainIntrior.php') ? 'active' : ''; ?>" href="/views/desainIntrior.php">Jasa Desain Rumah Interior</a></li> -->
                            <li><a class="dropdown-item mb-2 <?= ($current_page == 'jasabangunanetc.php') ? 'active' : ''; ?>" href="#alurpengaduan">Alur Aduan</a></li>
                            <li><a class="dropdown-item mb-2 <?= ($current_page == 'apa-yang-didapat.php') ? 'active' : ''; ?>" href="#solution">Solusi Keresahan Anda</a></li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'produk.php') ? 'active' : ''; ?>" href="/views/produk.php">Produk</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= ($current_page == 'informasi.php') ? 'active' : ''; ?> text-white" href="/index.php" id="hargaLayananDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">informasi</a>
                        <ul class="dropdown-menu" aria-labelledby="hargaLayananDropdown">
                            <li><a class="dropdown-item <?= ($current_page == 'faq.php') ? 'active' : ''; ?>" href="#faqAccordion">FAQ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'contact.php') ? 'active' : ''; ?> text-white" href="#contact">Contact Me</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        <!-- Tombol Scroll ke Atas -->
<button id="scrollTopBtn" onclick="scrollToTop()">
    &#8679;
</button>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var scrollTopBtn = document.getElementById("scrollTopBtn");

        // Tampilkan tombol saat user scroll ke bawah 200px
        window.onscroll = function () {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                scrollTopBtn.style.display = "flex";
            } else {
                scrollTopBtn.style.display = "none";
            }
        };

        // Fungsi untuk scroll ke atas saat tombol ditekan
        window.scrollToTop = function () {
            window.scrollTo({ top: 0, behavior: "smooth" });
        };
    });
</script>
</body>
</html>


