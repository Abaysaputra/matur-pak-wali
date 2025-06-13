<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matur Pak Wali | Aplikasi Pengaduan Masyarakat</title>
    <meta name="description" content="CV. Budi Utama Mandiri adalah penyedia jasa desain rumah, kontraktor, dan distributor bahan bangunan berkualitas.">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    <link rel="icon" href="https://budiutamamandiri.com/favicon.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.min.css">

    <!-- Favicon -->
    <link rel="icon" href="assets/img/matur2.png">

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "CV. Budi Utama Mandiri",
      "url": "https://budiutamamandiri.com"
    }
    </script>

    
    <link rel="stylesheet" href="assets/css/hargalayanan.css">
    <style>
      h1,
      h2,
      h3,
      h4,
      h5 {
        font-family: 'Playfair Display', sans-serif;
      }
    .navbar-nav .nav-item .nav-link {
    color:rgb(255, 255, 255);
    }
    .navbar-nav .nav-item .nav-link.active {
    color:rgb(255, 255, 255);
    font-weight: 500;
    position: relative;
    }
    .navbar-nav .nav-item .nav-link.active::after {
    content: '';
    position: absolute;
    width: 25px;
    height: 2px;
    background-color: #4164e0;
    bottom: 2.5px;
    left: 50%;
    transform: translateX(-50%);
    }
            /* Elemen Siku */
    .card::before,
    .card::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        border: 2px solid #f39c12;
        background: #fff;
        z-index: 1;
    }

    .card::before {
        top: -10px;
        left: -10px;
        border-right: none;
        border-bottom: none;
    }

    .card::after {
        bottom: -10px;
        right: -10px;
        border-left: none;
        border-top: none;
    }

    </style>

    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body class="loading">
 <!-- Navbar -->
    <?php include("backend/navbarwhite.php"); ?>
    <div class="loader-overlay">
      <div class="text-center">
        <img
          src="assets/img/matur2.png"
          alt="Loading..."
          class="loader-logo"
        />
        <div class="loader-text">Loading, please wait...</div>
      </div>
    </div>

<section class="home">
  <div class="container">
    <div class="desc" data-aos="zoom-in" data-aos-delay="300">
      <div class="headline">Silahkan Berikan Aduan!</div>
      <h1 class="title">
        <span class="highlight" style="color:#ea7c58;font-size: 5rem">M</span>atur Pak Wali
        <br>    
        <span class="creative-decor">
          <img src="assets/images/creative-decor.png" alt="" />
          <p>Kota</p>
        </span>
      </h1>
      <p class="text" style="max-width: 600px">
        "Matur Pak Wali" adalah aplikasi pengaduan masyarakat yang bertujuan untuk membantu masyarakat dalam mengadu kepada pemerintah."
      </p>
      <div class="btns">
        <a
          href="loginpage.php"
          class="button btn-orange btn-lg cta text-light">Ajukan Pengaduan</a>
        <a href="#alurpengaduan" class="cta-link">Langkah-langkah Pengaduan</a>
      </div>
    </div>
    <div class="images">
      <div class="img-logo-content code">
        <img src="assets/images/architect.png" class="img-logo" alt="" />
      </div>
      <div class="img-logo-content wordpress">
        <img src="assets/images/engineer.png" class="img-logo" alt="" />
      </div>
      <div class="img-logo-content figma">
        <img src="assets/images/blueprint.png" class="img-logo" alt="" />
      </div>
      <img src="assets/images/cs-services.png" class="hero-img" alt="cs-services" width="500" height="500"/>
    </div>
  </div>
</section>
    <section class="about" id="about">
        <div class="container">
            <div class="desc">
            <h3 class="title" data-aos="fade-right">
                <span style="color:#ea7c58; font-size: 2rem">Apa</span> itu Matur Pak Wali?
            </h3>
            </div>
            <div class="cards">
            <div class="card uiux" data-aos="fade-up" data-aos-anchor-placement="center-center">
                <div class="card-body">
                <img src="assets/images/uiux.png" alt="Pengaduan Icon">
                <h4>Platform Pengaduan</h4>
                <p>
                    Matur Pak Wali adalah aplikasi pengaduan masyarakat khusus untuk warga Kota Surabaya. Warga dapat dengan mudah menyampaikan aduan, kritik, maupun keresahan terkait pelayanan publik, infrastruktur, lingkungan, dan lainnya.
                </p>
                </div>
            </div>
            <div class="card logo-icon" data-aos="fade-up" data-aos-anchor-placement="center-center">
                <div class="card-body">
                <img src="assets/images/logo-icon.png" alt="Fitur Lengkap">
                <h4>Layanan Responsif</h4>
                <p>
                    Setiap aduan yang masuk akan ditindaklanjuti oleh tim yang bertugas. Kami menjembatani komunikasi antara masyarakat dan pemerintah kota dengan sistem pelaporan yang transparan dan cepat.
                </p>
                </div>
            </div>
            <div class="card development" data-aos="fade-up" data-aos-anchor-placement="center-center">
                <div class="card-body">
                <img src="assets/images/development.png" alt="Pengawasan Tindak Lanjut">
                <h4>Kami Mendengarkan</h4>
                <p>
                    Kami hadir untuk mendengarkan dan mencari solusi bersama. Mari bersama membangun Surabaya yang lebih nyaman, aman, dan sejahtera melalui partisipasi aktif dari masyarakat.
                </p>
                </div>
            </div>
            </div>
        </div>
    </section>
    <div class="py-3" id="alurpengaduan">
    <div class="text-center" data-aos="fade-up">
        <h3 class="section-title">Alur <span style="color:#ea7c58; font-size: 2rem">Pengaduan</span></h3>
        <p class="text-muted">Ikuti langkah-langkah berikut untuk mengajukan pengaduan Anda dengan mudah.</p>
    </div>
    <br />

    <div class="row justify-content-center align-items-center mt-4 d-flex flex-column flex-md-row">
        <div class="col-12 col-md-2 text-center step-item mb-3" data-aos="fade-up" data-aos-delay="100">
            <div class="item-icon mb-2">
                <i class="fa-solid fa-user-plus fa-2x" style="color: rgb(44, 145, 114); background-color: #cdffde; padding: 0.8rem; border-radius: 15px;"></i>
            </div>
            <h5>1. Buat Akun</h5>
            <p>Daftarkan diri Anda untuk memulai. Prosesnya cepat dan mudah!</p>
        </div>

        <div class="col-md-1 text-center d-none d-md-flex justify-content-center mb-3" data-aos="fade-up" data-aos-delay="150">
            <i class="fa-solid fa-arrow-right fa-lg" style="color: rgb(44, 145, 114);"></i>
        </div>

        <div class="col-12 col-md-2 text-center step-item mb-3" data-aos="fade-up" data-aos-delay="200">
            <div class="item-icon mb-2">
                <i class="fa-solid fa-sign-in-alt fa-2x" style="color: #9780db; background-color: #cecdff; padding: 0.8rem; border-radius: 15px;"></i>
            </div>
            <h5>2. Login Akun</h5>
            <p>Masuk ke akun Anda untuk mengakses formulir pengaduan.</p>
        </div>

        <div class="col-md-1 text-center d-none d-md-flex justify-content-center mb-3" data-aos="fade-up" data-aos-delay="150">
            <i class="fa-solid fa-arrow-right fa-lg" style="color: #9780db;"></i>
        </div>

        <div class="col-12 col-md-2 text-center step-item mb-3" data-aos="fade-up" data-aos-delay="300">
            <div class="item-icon mb-2">
                <i class="fa-solid fa-edit fa-2x" style="color: rgb(178, 139, 0); background-color: #ffd43b; padding: 0.8rem; border-radius: 15px;"></i>
            </div>
            <h5>3. Ajukan Pengaduan</h5>
            <p class="text-muted">Isi formulir dengan detail masalah yang ingin Anda laporkan.</p>
        </div>
    </div>

    <div class="row justify-content-center align-items-center mt-4 d-flex flex-column flex-md-row">
        <div class="col-12 col-md-2 text-center step-item mb-3" data-aos="fade-up" data-aos-delay="400">
            <div class="item-icon mb-2">
                <i class="fa-solid fa-hourglass-half fa-2x" style="color: rgb(42, 132, 201); background-color: #ccf3ff; padding: 0.8rem; border-radius: 15px;"></i>
            </div>
            <h5>4. Tunggu Respon</h5>
            <p class="text-muted">Pengaduan Anda sedang diproses. Mohon bersabar.</p>
        </div>

        <div class="col-md-1 text-center d-none d-md-flex justify-content-center mb-3" data-aos="fade-up" data-aos-delay="150">
            <i class="fa-solid fa-arrow-right fa-lg" style="color: #4783c5;"></i>
        </div>

        <div class="col-12 col-md-2 text-center step-item mb-3" data-aos="fade-up" data-aos-delay="500">
            <div class="item-icon mb-2">
                <i class="fa-solid fa-clock-rotate-left fa-2x" style="color: #d21e1e; background-color: rgb(255, 172, 172); padding: 0.8rem; border-radius: 15px;"></i>
            </div>
            <h5>5. Cek Status</h5>
            <p class="text-muted">Pantau perkembangan pengaduan Anda secara berkala di akun.</p>
        </div>

        <div class="col-md-1 text-center d-none d-md-flex justify-content-center mb-3" data-aos="fade-up" data-aos-delay="150">
            <i class="fa-solid fa-arrow-right fa-lg" style="color: #d21e1e;"></i>
        </div>

        <div class="col-12 col-md-2 text-center step-item mb-3" data-aos="fade-up" data-aos-delay="600">
            <div class="item-icon mb-2">
                <i class="fa-solid fa-map-marked-alt fa-2x" style="color: #8a2be2; background-color: #e0b0ff; padding: 0.8rem; border-radius: 15px;"></i>
            </div>
            <h5>6. Penanganan Lapangan</h5>
            <p class="text-muted">Petugas kami akan turun ke lokasi jika diperlukan untuk tindak lanjut.</p>
        </div>
    </div>
</div>
    <section class="solution mt-5" id="solution">
    <div class="container">
        <div class="images" data-aos="slide-right" data-aos-offset="100">
            <div class="img-decor">
                <img src="assets/images/ellipse-decoration.png" alt="" class="img-decor-item ellipse">
                <img src="assets/images/triangle-decoration.png" alt="" class="img-decor-item triangle">
            </div>
            <img src="assets/images/customer1.png" alt="Ilustrasi Aplikasi Matur Pak Wali" class="img-person2">
        </div>
        <div class="desc">
            <h3 class="title" data-aos="fade-right">
                Suara Anda, Solusi Kami <br> Bersama Matur Pak Wali
            </h3>
            <div class="solutions">
                <div class="solution-item" data-aos="zoom-in">
                    <svg width="12.5" height="12.5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" rx="4" fill="#F78D75"/>
                    </svg>
                    <p>
                        Laporkan Semua Aduan: Dari jalan rusak hingga masalah lingkungan, sampaikan segala keresahan Anda.
                    </p>
                </div>
                <div class="solution-item" data-aos="zoom-in">
                    <svg width="12.5" height="12.5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" rx="4" fill="#75A1F6"/>
                    </svg>
                    <p>
                        Khusus Warga Surabaya: Aplikasi ini didesain untuk memudahkan Anda, masyarakat Kota Surabaya, bersuara.
                    </p>
                </div>
                <div class="solution-item" data-aos="zoom-in">
                    <svg width="12.5" height="12.5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" rx="4" fill="#F675AB"/>
                    </svg>
                    <p>
                        Respons Cepat & Tepat: Tim kami siap menindaklanjuti setiap aduan Anda dengan sigap.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="text-center mb-5">
        <h3 id="faq" class="title" data-aos="fade-right" style="font-size: 3rem; font-family: 'Playfair Display';">F.A.Q</h3>
        <p class="text-muted" data-aos="fade-left">
            Temukan jawaban atas pertanyaan umum seputar penggunaan aplikasi Matur Pak Wali.
        </p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item mb-3" data-aos="fade-up">
                    <h2 class="accordion-header" id="faqOne">
                        <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Apa itu aplikasi Matur Pak Wali?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="faqOne"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Matur Pak Wali adalah aplikasi pengaduan resmi dari Pemerintah Kota Surabaya yang dirancang khusus untuk masyarakat Surabaya. Aplikasi ini memungkinkan Anda melaporkan berbagai aduan dan keresahan secara langsung.
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="accordion-header" id="faqTwo">
                        <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Bagaimana cara mengajukan pengaduan di aplikasi ini?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Anda cukup membuat akun, login, lalu pilih menu "Ajukan Pengaduan". Isi detail masalah yang ingin Anda laporkan dan kirimkan. Prosesnya mudah dan cepat!
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="accordion-header" id="faqThree">
                        <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Jenis aduan apa saja yang bisa dilaporkan?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Kami menerima segala jenis aduan dan keresahan dari masyarakat, mulai dari masalah infrastruktur, lingkungan, pelayanan publik, hingga isu sosial lainnya di Kota Surabaya.
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3" data-aos="fade-up" data-aos-delay="300">
                    <h2 class="accordion-header" id="faqFour">
                        <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Bagaimana saya bisa memantau status pengaduan saya?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="faqFour"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Anda dapat memeriksa status pengaduan Anda secara berkala langsung di aplikasi setelah Anda login. Kami akan memberikan pembaruan pada setiap tahapan penanganan aduan Anda.
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3" data-aos="fade-up" data-aos-delay="400">
                    <h2 class="accordion-header" id="faqFive">
                        <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Berapa lama waktu respon untuk pengaduan?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="faqFive"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Kami berusaha memberikan respon secepat mungkin. Setelah pengaduan diajukan, petugas kami akan segera meninjau dan jika diperlukan, akan turun ke lapangan untuk penanganan lebih lanjut.
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3" data-aos="fade-up" data-aos-delay="500">
                    <h2 class="accordion-header" id="faqSix">
                        <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            Apakah saya bisa memberikan masukan tambahan setelah pengaduan?
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="faqSix"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Untuk saat ini, Anda bisa menghubungi tim kami melalui kontak yang tertera di aplikasi jika ada informasi tambahan mendesak terkait pengaduan Anda.
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3" data-aos="fade-up" data-aos-delay="600">
                    <h2 class="accordion-header" id="faqSeven">
                        <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            Apakah aplikasi ini hanya untuk warga Surabaya?
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="faqSeven"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Ya, aplikasi Matur Pak Wali dikhususkan untuk masyarakat Kota Surabaya agar pengaduan dapat ditangani secara efisien oleh pihak terkait di wilayah kota.
                        </div>
                    </div>
                </div>

                </div>
        </div>
    </div>
</div>


        <!-- Call to Action -->
        <div class="text-center mt-5 mb-5" data-aos="fade-up">
            <p class="text-muted">Tidak menemukan jawaban yang Anda cari?</p>
        </div>
        <br>
    </div>
</section>
    
    <section class="contact" id="contact">
        <div class="container">
            <h3 class="title" data-aos="fade-right">Hubungi<span style="color:#ea7c58; font-size: 2rem"> Kami</span> </h3>
            <form action="" class="w-100">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="mb-4">
                                <label for="nama">Nama</label>
                                <div class="input-group">
                                    <span class="input-group-text"><svg width="17.5" height="17.5" viewBox="0 0 29 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.5 17C19.0766 17 22.7857 13.1949 22.7857 8.5C22.7857 3.80508 19.0766 0 14.5 0C9.92344 0 6.21429 3.80508 6.21429 8.5C6.21429 13.1949 9.92344 17 14.5 17ZM20.3 19.125H19.219C17.7819 19.8023 16.183 20.1875 14.5 20.1875C12.817 20.1875 11.2246 19.8023 9.78103 19.125H8.7C3.89687 19.125 0 23.1227 0 28.05V30.8125C0 32.5723 1.39174 34 3.10714 34H25.8929C27.6083 34 29 32.5723 29 30.8125V28.05C29 23.1227 25.1031 19.125 20.3 19.125Z" fill="#CCC"/>
                                    </svg>
                                    </span>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><svg width="17.5" height="17.5" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M29.4316 8.17969C29.6602 7.99805 30 8.16797 30 8.45508V20.4375C30 21.9902 28.7402 23.25 27.1875 23.25H2.8125C1.25977 23.25 0 21.9902 0 20.4375V8.46094C0 8.16797 0.333984 8.00391 0.568359 8.18555C1.88086 9.20508 3.62109 10.5 9.59766 14.8418C10.834 15.7441 12.9199 17.6426 15 17.6309C17.0918 17.6484 19.2188 15.709 20.4082 14.8418C26.3848 10.5 28.1191 9.19922 29.4316 8.17969ZM15 15.75C16.3594 15.7734 18.3164 14.0391 19.3008 13.3242C27.0762 7.68164 27.668 7.18945 29.4609 5.7832C29.8008 5.51953 30 5.10938 30 4.67578V3.5625C30 2.00977 28.7402 0.75 27.1875 0.75H2.8125C1.25977 0.75 0 2.00977 0 3.5625V4.67578C0 5.10938 0.199219 5.51367 0.539062 5.7832C2.33203 7.18359 2.92383 7.68164 10.6992 13.3242C11.6836 14.0391 13.6406 15.7734 15 15.75Z" fill="#CCC"/></svg>
                                    </span>
                                    <input type="text" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="notelp">No telp</label>
                                <div class="input-group">
                                    <span class="input-group-text"><svg width="17.5" height="17.5" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.08996 1.44106L7.18371 0.0348133C7.84582 -0.11753 8.52551 0.228173 8.79504 0.849266L11.6075 7.41177C11.8536 7.98598 11.6896 8.65981 11.2032 9.05239L7.65246 11.9586C9.76183 16.4528 13.4474 20.1911 18.0353 22.3415L20.9415 18.7907C21.34 18.3043 22.0079 18.1403 22.5822 18.3864L29.1447 21.1989C29.7716 21.4743 30.1173 22.154 29.965 22.8161L28.5587 28.9098C28.4122 29.5426 27.8497 29.9997 27.1876 29.9997C12.1818 29.9997 0.000109673 17.8415 0.000109673 2.81216C0.000109673 2.15591 0.451285 1.58755 1.08996 1.44106Z" fill="#CCC"/>
                                    </svg>
                                    </span>
                                    <input type="text" class="form-control" id="notelp">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea id="pesan" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-orange" onclick="sendWhatsApp()">Kirim Pesan</button>
            </form>
        </div>
    </section>
    <?php include 'backend/footer.php'; ?>
    <!-- Bootstrap Bundle JS -->
    <script src="assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>

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

    <script>
        function sendWhatsApp() {
        // Mengambil data dari form
        const name = document.getElementById('nama').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('notelp').value;
        const message = document.getElementById('pesan').value;

        // Validasi form
        if (!name || !email || !phone || !message) {
            alert('Harap isi semua data pada formulir!');
            return;
        }

        // Format pesan untuk WhatsApp
        const formattedMessage = `
            Terimakasih atas pesan yang dikirimkan melalui form kami. Berikut adalah data yang Anda kirimkan:
            - Nama: ${name}
            - Email: ${email}
            - No. Telp/WA: ${phone}
            - Pesan: ${message}

            Kami akan segera menghubungi Anda!
        `;

        // Nomor WhatsApp tujuan (ganti dengan nomor WhatsApp Anda)
        const waNumber = '6288226191123'; // Ganti dengan nomor WhatsApp Anda

        // Buat link WhatsApp
        const waLink = `https://wa.me/${waNumber}?text=${encodeURIComponent(formattedMessage)}`;

        // Redirect ke WhatsApp
        window.open(waLink, '_blank');
    }

    </script>

    <!-- My JS -->
    <script src="backend/script.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>