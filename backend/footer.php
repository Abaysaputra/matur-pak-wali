<link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        rel="stylesheet"
      />
<style>
          h3 {
        font-family: 'Playfair Display', sans-serif;
      }
      .container-konsultasi-bg {
        background-image: url('/assets/images/backgroundfooter.webp'); /* Ganti dengan gambar Anda */
        background-attachment: fixed; /* Efek parallax */
        background-size: cover;
        background-position: center;
        color: white;
        position: relative;
        min-height: 100vh;
        
    }
    .overlay {
        background: rgba(0, 0, 0, 0.6); /* Highlight hitam */
        top: 0;
        left: 0;
        z-index: 1;
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .content {
        z-index: 2; /* Supaya konten berada di atas overlay */
    }

    .fade-in {
        opacity: 0;
        animation: fadeIn 1.5s ease-in forwards; /* Animasi fade-in */
    }
    .is-invalid {
        border-color: #dc3545;
    }
    .is-valid {
        border-color: #28a745;
    }
    /* Efek Hover untuk Link */
    a.text-decoration-none {
        position: relative;
        transition: color 0.3s ease-in-out; /* Efek transisi warna */
    }

    a.text-decoration-none:hover {
        color: #FFA500; /* Warna oranye saat hover */
    }

    /* Efek underline saat hover */
    a.text-decoration-none::after {
        content: '';
        display: block;
        width: 0;
        height: 2px;
        background-color: #FFA500; /* Warna garis underline */
        transition: width 0.3s ease-in-out;
    }

    a.text-decoration-none:hover::after {
        width: 100%; /* Efek garis muncul saat hover */
    }
    .footer a {
    text-decoration: none; /* Menghilangkan garis bawah */
    color: #4C5574; /* Warna default */
    transition: color 0.3s ease, transform 0.2s ease; /* Efek transisi */
    }

    .footer a:hover {
        color: #ff6600; /* Warna saat hover */
        transform: scale(1.1); /* Efek zoom sedikit saat hover */
    }

    .footer .btn-orange:hover {
        background-color: #e65c00; /* Mengubah warna tombol saat hover */
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .text-white a {
        color: #ffffff; /* Link tetap putih */
    }

    .text-white a:hover {
        color: #ffcc00; /* Hover berwarna kuning */
    }
    .mb-4 .mb-2 img{
        max-width: 50px;
        height: 50px;
    }
    
/* Tablet (768px to 1024px) */
@media (max-width: 1024px) {
    .container-konsultasi-bg {
        padding: 4rem 2rem;
    }

    .content {
        padding: 0 20px;
    }

    .img-avatar {
        width: 100px;
        height: 100px;
    }

    .btn {
        font-size: 0.9rem;
    }

    .d-flex {
        flex-direction: column;
        align-items: center;
    }

    .d-flex .mb-2 {
        margin-bottom: 1rem;
    }
}

/* Mobile (up to 768px) */
@media (max-width: 768px) {
    .container-konsultasi-bg {
        padding: 3rem 1rem;
    }

    .content {
        padding: 0 10px;
    }

    .img-avatar {
        width: 80px;
        height: 80px;
    }

    .btn {
        font-size: 0.85rem;
        padding: 8px 15px;
    }

    .d-flex {
        flex-direction: column;
        align-items: center;
    }

    .d-flex .mb-2 {
        margin-bottom: 1rem;
    }

    /* Adjust Text Alignment */
    .text-start {
        text-align: center;
    }

    /* Adjust Contact Info */
    .text-start p {
        font-size: 0.9rem;
    }
}

/* Very Small Mobile (up to 480px) */
@media (max-width: 480px) {
    .container-konsultasi-bg {
        padding: 2rem 1rem;
    }

    .img-avatar {
        width: 70px;
        height: 70px;
    }

    .btn {
        font-size: 0.8rem;
        padding: 6px 12px;
    }

    .d-flex {
        flex-direction: column;
        align-items: center;
    }

    .text-start p {
        font-size: 0.85rem;
    }

    .overlay {
        opacity: 0.7;
    }
}
</style>
<section class="footer">
    <div class="container flex-column">
        <div class="row w-100 mb-5 justify-content-between"> <div class="col-lg-3 d-flex flex-column mb-4 mb-lg-0"> <a class="footer-brand" href="#">
                    <img src="assets/img/matur2.png" class="logo-img" alt="Logo Matur Pak Wali">
                </a>
                <p>Aplikasi pengaduan masyarakat untuk mewujudkan <br> Surabaya yang lebih baik dan responsif.</p>
            </div>

            <div class="col-lg-2 footer-item mb-4 mb-lg-0">
                <h6 class="mb-3 mb-lg-4">Tentang Aplikasi</h6>
                <a href="#alurpengaduan" class="footer-link">Alur Pengaduan</a>
                <a href="#faq" class="footer-link">Pertanyaan Umum</a>
                <a href="#" class="footer-link">Kebijakan Privasi</a>
            </div>
            <div class="col-lg-2 footer-item mb-4 mb-lg-0">
                <h6 class="mb-3 mb-lg-4">Fitur Utama</h6>
                <a href="#solution" class="footer-link">Laporkan Aduan</a>
                <a href="#alurpengaduan" class="footer-link">Pantau Status</a>
                <a href="#" class="footer-link">Jenis Aduan</a>
            </div>
            <div class="col-lg-3 footer-item mb-4 mb-lg-0"> <h6 class="mb-3 mb-lg-4">Kontak Kami</h6>
                <p class="footer-text">Butuh bantuan atau informasi lebih lanjut?</p>
                <p class="footer-text">
                    <strong>Telepon:</strong>
                    <ul class="mb-1 list-unstyled"> <li><a href="tel:+6285230241224" class="footer-link">+62 852-3024-1224 (Admin 1)</a></li>
                        <li><a href="tel:+6288226191123" class="footer-link">+62 882-2619-1123 (Admin 2)</a></li>
                    </ul>
                </p>
                <p class="footer-text">
                    <strong>Email:</strong> <a href="mailto:contact@maturpakwali.surabaya.go.id" class="footer-link">contact@maturpakwali.surabaya.go.id</a>
                </p>
                <a href="https://wa.me/6288226191123" target="_blank" class="btn btn-orange mt-2 text-light">Live Chat</a>
            </div>
        </div>
        <div class="row w-100 justify-content-center justify-content-lg-between text-center">
            <div class="col-lg-auto icons mb-4 mb-lg-0">
                <a href="https://www.instagram.com/pemerintahkotasurabaya/" class="me-4" target="_blank" aria-label="Instagram Pemerintah Kota Surabaya">
                    <svg width="25" height="25" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M28.5938 24C28.5938 26.5371 26.5371 28.5938 24 28.5938C21.4629 28.5938 19.4062 26.5371 19.4062 24C19.4062 21.4629 21.4629 19.4062 24 19.4062C26.5371 19.4062 28.5938 21.4629 28.5938 24Z" fill="#4C5574"/>
                        <path d="M34.7432 15.8724C34.5223 15.274 34.17 14.7324 33.7123 14.2878C33.2677 13.8301 32.7264 13.4778 32.1277 13.257C31.6421 13.0684 30.9126 12.8439 29.569 12.7827C28.1155 12.7164 27.6797 12.7021 24 12.7021C20.3199 12.7021 19.8842 12.7161 18.431 12.7823C17.0874 12.8439 16.3575 13.0684 15.8723 13.257C15.2736 13.4778 14.7319 13.8301 14.2877 14.2878C13.83 14.7324 13.4777 15.2737 13.2565 15.8724C13.0679 16.358 12.8434 17.0879 12.7822 18.4315C12.7159 19.8846 12.7017 20.3204 12.7017 24.0005C12.7017 27.6802 12.7159 28.116 12.7822 29.5695C12.8434 30.9131 13.0679 31.6426 13.2565 32.1282C13.4777 32.7269 13.8296 33.2682 14.2874 33.7128C14.7319 34.1705 15.2732 34.5228 15.8719 34.7436C16.3575 34.9326 17.0874 35.1571 18.431 35.2183C19.8842 35.2845 20.3196 35.2985 23.9996 35.2985C27.6801 35.2985 28.1158 35.2845 29.5686 35.2183C30.9122 35.1571 31.6421 34.9326 32.1277 34.7436C33.3296 34.28 34.2795 33.3301 34.7432 32.1282C34.9318 31.6426 35.1562 30.9131 35.2178 29.5695C35.2841 28.116 35.298 27.6802 35.298 24.0005C35.298 20.3204 35.2841 19.8846 35.2178 18.4315C35.1566 17.0879 34.9321 16.358 34.7432 15.8724ZM24 31.0768C20.0914 31.0768 16.923 27.9087 16.923 24.0001C16.923 20.0916 20.0914 16.9235 24 16.9235C27.9082 16.9235 31.0767 20.0916 31.0767 24.0001C31.0767 27.9087 27.9082 31.0768 24 31.0768ZM31.3564 18.2975C30.4431 18.2975 29.7026 17.557 29.7026 16.6437C29.7026 15.7303 30.4431 14.9899 31.3564 14.9899C32.2698 14.9899 33.0103 15.7303 33.0103 16.6437C33.0099 17.557 32.2698 18.2975 31.3564 18.2975Z" fill="#4C5574"/>
                        <path d="M24 0C10.7472 0 0 10.7472 0 24C0 37.2528 10.7472 48 24 48C37.2528 48 48 37.2528 48 24C48 10.7472 37.2528 0 24 0ZM37.6981 29.6818C37.6315 31.1488 37.3982 32.1504 37.0576 33.0271C36.3417 34.8783 34.8783 36.3417 33.0271 37.0576C32.1508 37.3982 31.1488 37.6311 29.6821 37.6981C28.2125 37.7651 27.743 37.7812 24.0004 37.7812C20.2573 37.7812 19.7882 37.7651 18.3182 37.6981C16.8516 37.6311 15.8496 37.3982 14.9733 37.0576C14.0533 36.7115 13.2206 36.1692 12.5321 35.4679C11.8312 34.7798 11.2888 33.9467 10.9427 33.0271C10.6022 32.1508 10.3689 31.1488 10.3022 29.6821C10.2345 28.2122 10.2188 27.7427 10.2188 24C10.2188 20.2573 10.2345 19.7878 10.3019 18.3182C10.3685 16.8512 10.6014 15.8496 10.942 14.9729C11.2881 14.0533 11.8308 13.2202 12.5321 12.5321C13.2202 11.8308 14.0533 11.2885 14.9729 10.9424C15.8496 10.6018 16.8512 10.3689 18.3182 10.3019C19.7878 10.2349 20.2573 10.2188 24 10.2188C27.7427 10.2188 28.2122 10.2349 29.6818 10.3022C31.1488 10.3689 32.1504 10.6018 33.0271 10.942C33.9467 11.2881 34.7798 11.8308 35.4683 12.5321C36.1692 13.2206 36.7119 14.0533 37.0576 14.9729C37.3986 15.8496 37.6315 16.8512 37.6985 18.3182C37.7655 19.7878 37.7812 20.2573 37.7812 24C37.7812 27.7427 37.7655 28.2122 37.6981 29.6818Z" fill="#4C5574"/>
                    </svg>
                </a>
                <a href="https://www.tiktok.com/@pemerintahkotasurabaya" class="me-4" target="_blank" aria-label="TikTok Pemerintah Kota Surabaya">
                    <img src="assets/images/tiktok.png" alt="TikTok Icon" width="25" height="25">
                </a>
                <a href="https://wa.me/6288226191123" target="_blank" aria-label="WhatsApp Matur Pak Wali">
                    <svg width="25" height="25" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 0C10.7472 0 0 10.7472 0 24C0 37.2528 10.7472 48 24 48C37.2528 48 48 37.2528 48 24C48 10.7472 37.2528 0 24 0ZM24.5087 37.9735C24.5083 37.9735 24.509 37.9735 24.5087 37.9735H24.5028C22.0986 37.9724 19.7362 37.3696 17.6382 36.2256L10.0236 38.2225L12.0615 30.7811C10.8043 28.6036 10.1429 26.1332 10.144 23.6023C10.1473 15.6848 16.5912 9.24353 24.5087 9.24353C28.351 9.245 31.9578 10.7406 34.6696 13.4546C37.3817 16.1689 38.8744 19.7769 38.8729 23.6136C38.8696 31.5315 32.425 37.9735 24.5087 37.9735Z" fill="#4C5574"/>
                        <path d="M24.5134 11.6689C17.9279 11.6689 12.572 17.0226 12.5691 23.6034C12.5684 25.8585 13.1997 28.0547 14.3947 29.955L14.6785 30.4065L13.4722 34.8109L17.9908 33.6259L18.427 33.8844C20.2599 34.972 22.3612 35.5474 24.5035 35.5481H24.5083C31.0888 35.5481 36.4446 30.1941 36.4475 23.6129C36.4486 20.4236 35.2079 17.425 32.9539 15.1692C30.6998 12.9133 27.702 11.67 24.5134 11.6689ZM31.5359 28.7347C31.2367 29.5726 29.803 30.3376 29.1134 30.4409C28.4949 30.5332 27.7127 30.5717 26.8528 30.2988C26.3313 30.1333 25.663 29.9125 24.8064 29.543C21.2062 27.9888 18.8547 24.3647 18.6753 24.1252C18.4959 23.8857 17.2097 22.1796 17.2097 20.4133C17.2097 18.6475 18.137 17.7792 18.4658 17.4203C18.795 17.061 19.184 16.9713 19.4231 16.9713C19.6622 16.9713 19.9017 16.9735 20.1108 16.9838C20.3313 16.9948 20.6272 16.8999 20.9183 17.5997C21.2175 18.3182 21.9353 20.0841 22.025 20.2635C22.1148 20.4434 22.1744 20.6528 22.0551 20.8923C21.9353 21.1318 21.5376 21.6486 21.1578 22.1195C20.9985 22.3169 20.7909 22.4927 21.0004 22.8519C21.2095 23.2108 21.9302 24.386 22.997 25.3374C24.368 26.5598 25.5245 26.9385 25.8834 27.1183C26.242 27.2977 26.4514 27.2677 26.6609 27.0286C26.8709 26.7891 27.5581 25.9808 27.7972 25.6216C28.0364 25.2623 28.2759 25.3224 28.6047 25.4421C28.934 25.5615 30.6984 26.4298 31.0573 26.6093C31.4161 26.7891 31.6553 26.8788 31.745 27.0286C31.8351 27.1783 31.8351 27.8965 31.5359 28.7347Z" fill="#4C5574"/>
                    </svg>
                </a>
            </div>
            <div class="col-lg-auto">
                <p class="mb-0">© 2025 Aplikasi Matur Pak Wali. Hak Cipta Dilindungi Undang-Undang.</p>
            </div>
        </div>
    </div>
</section>

    <script>
    // Fungsi untuk memvalidasi email
    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Fungsi untuk menangani pengiriman formulir
    document.querySelector("form").addEventListener("submit", function (event) {
        event.preventDefault(); // Mencegah reload halaman

        // Ambil nilai input email
        const emailInput = document.getElementById("email").value;
        const emailField = document.getElementById("email");
        const submitButton = this.querySelector("button[type='submit']");

        // Validasi email
        if (!validateEmail(emailInput)) {
            emailField.classList.add("is-invalid");
            emailField.classList.remove("is-valid");
            alert("Mohon masukkan email yang valid.");
            return;
        } else {
            emailField.classList.remove("is-invalid");
            emailField.classList.add("is-valid");
        }

        // Kirim email (gunakan layanan seperti EmailJS untuk pengiriman sebenarnya)
        submitButton.textContent = "Mengirim...";
        submitButton.disabled = true;

        setTimeout(() => {
            alert(`Email "${emailInput}" berhasil dikirim!`);
            emailField.value = ""; // Kosongkan input email
            emailField.classList.remove("is-valid");
            submitButton.textContent = "Kirim";
            submitButton.disabled = false;
        }, 1500); // Simulasi waktu pengiriman
    });
</script>
