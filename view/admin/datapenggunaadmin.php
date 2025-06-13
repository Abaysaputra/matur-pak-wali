<?php
include '../../back/koneksi/koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
?>
    <script language="JavaScript">
        alert('Anda Harus Login  Terlebih Dahulu!!');
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

                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Data Table Pengguna</h6>
                            </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                <div style="width: 100%;margin: 0px auto;">
                                <div class="text">
                                    <!-- <input type="text" id="KataKunci" name="KataKunci" placeholder="Cari data pengaduan..." required="" value="" autocomplete="off" <?php if (isset($_GET['KataKunci']))  echo $_GET['KataKunci']; ?>">
                                    <button class="cari" type="submit">Cari</button>
                                    <button class="reset" onclick="location.href='datapengaduanadmin.php'" type="button">Reset</button> -->
                                </div>
                                <div class="content">
                                    <table width="100%" id="tabel" class="table table-striped table table-bordered text-center" cellspacing="0" >
                                        <thead>
                                        <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>No.Handphone</th>
                                            <th>Alamat</th>
                                            <th>Foto</th>
                                        </thead>

                                        <tbody align="center">
                                            <?php
                                            include "../../back/koneksi/koneksi.php"; 
                                            $SqlQuery = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE level = 'User' ORDER BY id_pengguna DESC");
                                            
                                                $no = 1;

                                                while ($row = mysqli_fetch_array($SqlQuery)) {
                                                ?>
                                                    <tr align="center">
                                                        <td>
                                                            <?php echo $no++ ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['nik']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['nama']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['no_hp']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['alamat_lengkap']; ?>
                                                        </td>
                                                        <td>
                                                            <img src="../../uploads/<?php echo $row['foto']; ?>" alt="foto pengguna" class="img-fluid rounded-circle" style="width: 50px; height: 50px;">
                                                        </td>
                                                    <?php
                                                }
                                                    ?>
                                        </tbody>

                                    </table>
                                </div>
    </div>
    <script src="../../assets/js/jquery-3.6.0.js"></script>
    <script src="../../assets/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tabel').DataTable();
        });
    </script>
    

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

</div>
            <!-- End of Main Content -->
<?php include 'footer.php';?>