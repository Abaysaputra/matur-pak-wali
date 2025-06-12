<?php 
session_start();
if (isset($_SESSION['level'])) {
    include '../../back/koneksi/koneksi.php';

    $awal = $_GET['awal'];
    $akhir = $_GET['akhir'];
    $id_pengguna = $_GET['id_pengguna'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pengaduan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h3, h4 {
            text-align: center;
            margin: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 30px;
        }

        table, th, td {
            border: 1px solid black;
            padding: 6px;
        }

        .footer {
            margin-top: 80px;
            text-align: right;
        }
    </style>
</head>
<body onload="window.print()">
    <h3>MATUR PAK WALI</h3>
    <h4>LAPORAN PENGADUAN</h4>

    <table>
        <tr>
            <th>NO</th>
            <th>ID Pengguna</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Pengaduan</th>
            <th>Media</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
        <?php 
        $sql = mysqli_query($koneksi, "
            SELECT 
                p.*, 
                u.nik, 
                u.nama, 
                (SELECT r.media FROM tb_respon r WHERE r.id_pengaduan = p.id_pengaduan ORDER BY r.id_respon DESC LIMIT 1) AS media_admin 
            FROM tb_pengaduan p
            INNER JOIN tb_pengguna u ON p.id_pengguna = u.id_pengguna
            WHERE p.id_pengguna = '$id_pengguna'
            AND p.tgl_pengaduan BETWEEN '$awal' AND '$akhir'
            ORDER BY p.id_pengaduan
        ");

        $no = 1;
        while ($row = mysqli_fetch_assoc($sql)) {
        ?>
        <tr>
            <td align="center"><?= $no++ ?></td>
            <td align="center"><?= $row['id_pengguna'] ?></td>
            <td align="center"><?= $row['nik'] ?></td>
            <td align="center"><?= $row['nama'] ?></td>
            <td><?= $row['pengaduan'] ?></td>
            <td align="center">
                <?php if (!empty($row['media_admin'])): ?>
                    <img src="../../uploads/<?= $row['media_admin'] ?>" width="80">
                <?php else: ?>
                    <em>Tidak ada</em>
                <?php endif; ?>
            </td>
            <td align="center"><?= $row['tgl_pengaduan'] ?></td>
            <td align="center"><?= $row['status'] ?></td>
        </tr>
        <?php } ?>
    </table>

    <!-- FOOTER TANDA TANGAN -->
    <div class="footer">
        <p>Purwosari, <?= date('d/m/y') ?><br>Operator,</p>
        <br><br><br>
        <p>_____________________</p>
    </div>
</body>
</html>
<?php 
} else {
    header("location:log.php");
}
?>
