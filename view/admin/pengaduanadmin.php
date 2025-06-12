<?php
include '../../back/koneksi/koneksi.php';
session_start();
$id_pengguna = $_GET["id_pengguna"];
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
};include 'header.php';
?>
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
    .tambah:hover {
    background-color: #198754; /* lebih gelap dari btn-success */
    transform: scale(1.05);
    transition: all 0.2s ease-in-out;
    }
</style>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
                                    <div class="dropdown no-arrow">
                                       
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
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
                        <th>Pengaduan</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <!-- <th>Gambar</th> -->
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        include "../../back/koneksi/koneksi.php";

                        $SqlQuery = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan INNER JOIN tb_pengguna ON tb_pengaduan.id_pengguna = tb_pengguna.id_pengguna WHERE tb_pengaduan.id_pengguna = $id_pengguna ORDER BY tb_pengaduan.tgl_pengaduan DESC ");


                        $no =  1;

                        
                        while ($row = mysqli_fetch_array($SqlQuery)) {
                            
                            if ($row['status'] === 'Diterima') {
                               $background_color = 'rgba(231, 111, 81, 1)';
                            }
                            else if( $row['status'] === 'Diproses')
                            {
                          $background_color = 'rgb(76, 148, 255)';
                            }  
                            else if ($row['status'] === 'Selesai')  
                            {
                           $background_color = 'rgba(42, 157, 143, 1)';      
                       
                        };
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>

                                <td>
                                    <a class="info" href="../../view/admin/infoadmin.php?id=<?php echo $row['id_pengaduan']; ?>">Detail Pengaduan</a>
                                    <!-- <?php echo $row['pengaduan']; ?> -->
                                </td>
                                <td>
                                <div  id="" class="status  fw-bolder rounded-1 text-center">
                                        <span id="status" class="p-2 rounded text-light d-flex justify-content-center align-item-center"  style='background-color: <?= $background_color ?>;' >
                                    <?php echo $row['status']; ?>
                                    </span>
                                    </div>
                                    
                                </td>
                                <td>
                                    <?php echo $row['tgl_pengaduan']; ?>
                                </td>
                                <!-- <td>
                                    <img style="widht: 35px;height: 55px;" src="../../assets/img/<?php echo $row['gambar']; ?>" />
                                </td>
                                <td>
                                    <a class="balas" href="../../view/admin/balas.php?id=<?php echo $row['id_pengaduan']; ?>">Respon</a>
                                    <a class="balas" href="../../back/pengaduan/hapuspengaduan.php?id=<?php echo $row['id_pengaduan']; ?>">Delete</a>
                                </td> -->
                                <td>
                                    <button class="btn btn-danger">
                                    <a class="balas text-decoration-none text-light fw-semibold" href="../../back/pengaduan/hapuspengaduan.php?id=<?php echo $row['id_pengaduan']; ?>">Delete</a>
                                    </button>
                                </td>
                            </tr>
                        <?php

                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="../../assets/js/jquery-3.6.0.js"></script>
    <!-- <script src=".../assets/js/jquery.dataTables.min.js"></script>
 -->
    <script src="../../assets/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tabel').DataTable();
        });
    </script>
    

</div>

            </div>
            <!-- End of Main Content -->
<?php include 'footer.php';?>