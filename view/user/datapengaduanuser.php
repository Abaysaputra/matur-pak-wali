<?php
include '../../back/koneksi/koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
?>
    <script language="JavaScript">
        alert('Anda Harus Login  Terlebih Dahulu!!');
        document.location = '../index.php';
    </script>
<?php
}
if ($_SESSION['level'] == "Admin") {
?>
    <script language="JavaScript">
        alert('Anda Tidak Mempunyai Akses Dihalaman Ini!!');
        document.location = '../admin/dashboardadmin.php';
    </script>
<?php
};
include 'header.php';

$id_pengguna = $_SESSION['id_pengguna'];
?>
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
    .tambah:hover {
    background-color: #198754; /* lebih gelap dari btn-success */
    transform: scale(1.05);
    transition: all 0.2s ease-in-out;
    }
</style>


                        <div class="topbar-divider d-none d-sm-block"></div>
                        <?php
                        include "../../back/koneksi/koneksi.php";

      

                        //kondisi jika parameter pencarian kosong
  
                        $SqlQuery = mysqli_query($koneksi, "SELECT * FROM tb_pengguna where tb_pengguna.id_pengguna =$id_pengguna");
       
                        $user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna = '$id_pengguna'"));
                        $foto = !empty($user['foto']) ? $user['foto'] : 'User.png';
                        foreach ($SqlQuery as $row ) {
                        ?>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-800"> <?php echo $row['nama']; ?></span>
                                <img src="../../uploads/<?= $foto ?>" class="rounded-circle shadow" width="40" height="40" style="object-fit: cover;" alt="Foto Profil">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                    <?php
                        }
                    ?>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->

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
                                <div class="card-body">
                                    <div class="chart-area">
                                <div style="width: 100%;margin: 0px auto;">
                                <div class="text">
                                <button class="tambah btn btn-success m-3 shadow-sm" style="border-radius: 30px; font-weight: 600; padding: 10px 20px;" 
                                        onclick="location.href='../../back/pengaduan/pengisian.php'" type="button">
                                    <i class="fas fa-plus-circle me-2"></i> Ajukan Pengaduan
                                </button>
                <!-- <input type="text" id="KataKunci" name="KataKunci" placeholder="Cari data pengaduan..." required="" value="" autocomplete="off" <?php if (isset($_GET['KataKunci']))  echo $_GET['KataKunci']; ?>">
                    <button class="cari" type="submit">Cari</button>
                    <button class="reset" onclick="location.href='datapengaduanuser.php'" type="button">Reset</button> -->
            </div>

            <div class="content">
            <table width="100%" id="tabel" class="table table-striped table-bordered">
                    <thead class="text-center">
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Pengaduan</th>
                        <th>Status</th>
                        <th>Tanggal</th>

                        <!--<th>Gambar</th> -->
                        <th>Aksi</th>
                    </thead>

                    <tbody align="center">
                        <?php
                        include "../../back/koneksi/koneksi.php";
                        //kondisi jika parameter pencarian kosong
                       
                            $SqlQuery = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan INNER JOIN tb_pengguna ON tb_pengaduan.id_pengguna = tb_pengguna.id_pengguna where tb_pengguna.id_pengguna =$id_pengguna ORDER BY tb_pengaduan.tgl_pengaduan DESC"  );
                        

                        $no =  1;

                        while ($row = mysqli_fetch_array($SqlQuery)) {
                            
                                            if ($row['status'] === 'Diterima') {
                                               $background_color = '#E76F51';
                                            }
                                            else if( $row['status'] === 'Diproses')
                                            {
                                          $background_color = '#fca311';
                                            }  
                                            else if ($row['status'] === 'Selesai')  
                                            {
                                           $background_color = '#2a9d8f';      
                                       
                                        };
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $row['nik']; ?>
                                    
                                </td>
                                <td>
                                    <?php echo $row['nama']; ?>
                                </td>
                                <td >
                                
                                    <a class="info"  href="../user/infouser.php?id=<?php echo $row['id_pengaduan']; ?>">Detail pengaduan</a>
                                </td>
                                <td>
                                    <div  id="" class="status  fw-bolder rounded-1 text-center">
                                        <span id="status" class="p-2 align-items-center justify-content-center rounded text-light d-flex fw-semibold"  style='background-color: <?= $background_color ?>;' >
                                    <?php echo $row['status']; ?>
                                    </span>
                                    </div>
                                    
                                    
                                </td>
                                <td>
                                    <?php echo $row['tgl_pengaduan']; ?>
                                </td>
                                 <!-- <td>
                                    <img style="widht: 35px;height: 55px;" src="../../assets/img/<?php echo $row['gambar']; ?>" />
                                </td> -->
                                <td>
                                    <?php if ($row['status'] !== 'Selesai') { ?>
                                        <button class="warning btn btn-warning">
                                            <a class="edit text-decoration-none text-light fw-semibold" href="../../back/pengaduan/edit.php?id=<?php echo $row['id_pengaduan']; ?>">Edit</a>
                                        </button>
                                    <?php } ?>
                                    <button class="btn btn-danger">
                                        <a class="hapus text-decoration-none text-light fw-semibold" href="../../back/pengaduan/hapuspengaduan.php?id=<?php echo $row['id_pengaduan']; ?>" onclick="return confirm('Anda yakin ingin hapus pengaduan?')">Hapus</a>
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
       
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php include 'footer.php';?>