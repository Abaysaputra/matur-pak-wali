<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .chat-container {
            max-width: 720px;
            margin: auto;
            margin-top: 50px;
            border: 1px solid #dee2e6;
            border-radius: 15px;
            overflow: hidden;
            background-color: #f8f9fa;
        }

        .chat-box {
            padding: 20px;
            height: 450px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .message-wrapper {
            display: flex;
            flex-direction: column;
            max-width: 70%;
        }

        .message {
            padding: 10px 15px;
            border-radius: 20px;
            word-wrap: break-word;
        }

        .outgoing {
            align-self: flex-end;
            text-align: right;
        }

        .incoming {
            align-self: flex-start;
            text-align: left;
        }

        .level-user {
            background-color: #4dabf7; /* Ubah di sini untuk warna masyarakat */
            color: white;
        }

        .level-petugas {
            background-color: #28a745;
            color: white;
        }

        .level-admin {
            background-color: #ffc107;
            color: black;
        }

        .sender-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .timestamp {
            font-size: 0.75rem;
            opacity: 0.6;
            margin-top: 5px;
        }

        .message-form {
            padding: 15px;
            border-top: 1px solid #dee2e6;
            display: flex;
            gap: 10px;
        }

        .message-form textarea {
            flex-grow: 1;
            border-radius: 25px;
            border: 1px solid #ced4da;
            padding: 10px 20px;
            resize: none;
        }

        .message-form button {
            border-radius: 25px;
        }
    </style>
</head>

<body>
    <div class="chat-container shadow">
        <div class="chat-box">
            <?php
            session_start();
            include "../../back/koneksi/koneksi.php";
            $id_pengguna = $_SESSION['id_pengguna'];
            $level = $_SESSION['level'];
            $id_pengaduan = $_GET['id_pengaduan'];
            
            $sql = "SELECT tb_respon.respon, tb_respon.id_pengguna, tb_respon.date, tb_respon.nik, tb_pengguna.nama, tb_pengguna.level
                    FROM tb_respon
                    INNER JOIN tb_pengguna ON tb_respon.id_pengguna = tb_pengguna.id_pengguna
                    WHERE tb_respon.id_pengaduan = '$id_pengaduan'
                    ORDER BY tb_respon.date ASC";

            $exe = mysqli_query($koneksi, $sql);
            while ($r = mysqli_fetch_array($exe)) {
                $respon = $r['respon'];
                $id_pg = $r['id_pengguna'];
                $nama = $r['nama'];
                $level_pengirim = $r['level'];
                $tanggal = date("d F Y, H:i", strtotime($r['date']));

                $is_self = $id_pg == $id_pengguna;
                $alignment = $is_self ? 'outgoing' : 'incoming';
                $level_class = 'level-' . strtolower($level_pengirim);

                echo "<div class='message-wrapper $alignment'>
                        <div class='sender-name'>$nama</div>
                        <div class='message $level_class'>$respon</div>
                        <div class='timestamp'>$tanggal</div>
                      </div>";
            }
            ?>
        </div>

        <form method="POST" class="message-form">
            <textarea name="respon" rows="1" placeholder="Ketik pesan..." required></textarea>
            <input type="hidden" name="nik" value="<?php echo ($level == 'masyarakat') ? $_SESSION['nik'] : ''; ?>">
            <input type="hidden" name="id_pengaduan" value="<?php echo $id_pengaduan; ?>">
            <button type="submit" class="btn btn-success" name="simpan"><i class="fas fa-paper-plane"></i></button>
        </form>

        <div class="text-center p-2">
            <a href="infoadmin.php?id=<?php echo $id_pengaduan; ?>" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
    </div>

    <?php
    if (isset($_POST['simpan'])) {
        $respon = $_POST['respon'];
        $id_pengguna = $_SESSION['id_pengguna'];
        $nik = ($level == "admin") ? $_POST['nik'] : "";
        $id_pengaduan = $_POST['id_pengaduan'];
        date_default_timezone_set("Asia/Jakarta");
        $date = date("Y-m-d H:i:s");

        $sql = "INSERT INTO tb_respon (respon, id_pengguna, id_pengaduan, date, nik)
                VALUES ('$respon', '$id_pengguna', '$id_pengaduan', '$date', '$nik')";

        mysqli_query($koneksi, $sql);
        echo "<script>location.href = window.location.href;</script>";
    }
    ?>
    <script>
        // Scroll ke bawah saat halaman selesai dimuat
        window.onload = function () {
            const chatBox = document.querySelector('.chat-box');
            chatBox.scrollTo({ top: chatBox.scrollHeight, behavior: 'smooth' });
        };
    </script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</div>

</body>
</html>
