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
if ($_SESSION['level'] == "User") {
?>
    <script language="JavaScript">
        alert('Anda Tidak Mempunyai Akses Dihalaman Ini!!');
        document.location = '../user/dashboarduser.php';
    </script>
<?php
};
include 'header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Pengaduan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pengaduan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tabel" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $SqlQuery = mysqli_query($koneksi, "
                            SELECT * FROM tb_pengaduan 
                            INNER JOIN tb_pengguna ON tb_pengaduan.id_pengguna = tb_pengguna.id_pengguna
                            ORDER BY tb_pengaduan.tgl_pengaduan DESC
                        ");

                        if (!$SqlQuery) {
                            die("Query error: " . mysqli_error($koneksi));
                        }

                        $no = 1;
                        while ($row = mysqli_fetch_array($SqlQuery)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nik'] ?></td>
                                <td>
                                    <a class="btn btn-outline-secondary btn-sm" href="pengaduanadmin.php?id_pengguna=<?= $row['id_pengguna'] ?>">
                                        <?= $row['nama'] ?>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Custom Styles -->
<style>
    .table thead th {
        background-color: #4e73df;
        color: white;
        border: none;
        text-align: center;
    }

    .table tbody tr:hover {
        background-color: #f8f9fc;
        transition: 0.3s ease-in-out;
    }

    .table td, .table th {
        vertical-align: middle;
        text-align: center;
    }

    .btn-outline-secondary {
        border-radius: 20px;
        font-weight: 500;
        padding: 5px 12px;  
    }

    .dataTables_wrapper .dataTables_filter input {
        border-radius: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        padding: 6px 12px;
        margin-left: 0.5em;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border-radius: 50%;
        margin: 0 2px;
        padding: 5px 10px;
        border: 1px solid #ddd;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background-color: #4e73df !important;
        color: white !important;
    }
</style>

<!-- JS Scripts -->
<script src="../../assets/js/jquery-3.6.0.js"></script>
<script src="../../assets/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabel').DataTable({
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari data...",
                lengthMenu: "Tampilkan _MENU_ entri",
                zeroRecords: "Tidak ada data ditemukan",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(difilter dari total _MAX_ entri)",
                paginate: {
                    previous: "Sebelumnya",
                    next: "Berikutnya"
                }
            }
        });
    });
</script>

<?php include 'footer.php'; ?>
