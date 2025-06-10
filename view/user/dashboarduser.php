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
if ($_SESSION['level'] == "Admin") {
?>
    <script language="JavaScript">
        alert('Anda Tidak Mempunyai Akses Dihalaman Ini!!');
        document.location = '../user/dashboarduser.php';
    </script>
<?php
};

$id_pengguna = $_SESSION['id_pengguna'];

// These queries are already correctly filtered for the logged-in user
$sql = "SELECT * FROM tb_pengaduan WHERE id_pengguna = $_SESSION[id_pengguna]";
$sql2 = "SELECT * FROM tb_pengaduan WHERE id_pengguna = $_SESSION[id_pengguna]";
$sql3 = "SELECT * FROM tb_pengaduan WHERE id_pengguna = $_SESSION[id_pengguna]";



$result = mysqli_query($koneksi, $sql);
$result2 = mysqli_query($koneksi, $sql2);
$result3 = mysqli_query($koneksi, $sql3);
$rowDataPengaduan = mysqli_num_rows($result);
$rowDataPengguna = mysqli_num_rows($result2); // This seems to be counting pengaduan for the user, not distinct users. If it's meant to be "1" for the current user, it's fine.
$rowDataRespon = mysqli_num_rows($result3); // This also counts pengaduan. It's not used in the display currently.

include 'header.php';
?>
<div class="topbar-divider d-none d-sm-block"></div>
<?php
include "../../back/koneksi/koneksi.php";


//kondisi jika parameter pencarian kosong

    $SqlQuery = mysqli_query($koneksi, "SELECT * FROM tb_pengguna where tb_pengguna.id_pengguna =$id_pengguna");


foreach ($SqlQuery as $row ) {
?>
      
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-800"> <?php echo $row['nama']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../../assets/img/User.png">
                            </a>
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
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Pengaduan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rowDataPengaduan ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Data Pengguna</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo "1"?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area" style="min-height:45vh;">
                                    <div style="width: 345px;margin: 0px auto; ">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                    <script>
                                		var ctx = document.getElementById("myChart").getContext('2d');
                                		var myChart = new Chart(ctx, {
                                			type: 'polarArea',
                                			data: {
                                				labels: ["Diterima","Diproses","Selesai"],
                                				datasets: [{
                                					label: '',
                                					data: [
                                                    <?php
                                                        // Filter by the logged-in user's ID
                                                        $sql = "SELECT * FROM tb_pengaduan WHERE id_pengguna = $_SESSION[id_pengguna] AND status = 'Diterima' ";
                                                        $result = mysqli_query($koneksi, $sql);
                                                        $rowDataPengaduanDiterima = mysqli_num_rows($result);
                                                        echo  $rowDataPengaduanDiterima;
                                					?>, 
                                					<?php 
                                                        // Filter by the logged-in user's ID
                                                        $sql2 = "SELECT * FROM tb_pengaduan WHERE id_pengguna = $_SESSION[id_pengguna] AND status = 'Diproses'";
                                                        $result2= mysqli_query($koneksi, $sql2);                    
                                                        $rowDataPengaduanDiproses = mysqli_num_rows($result2);
                                                        echo  $rowDataPengaduanDiproses;
                                					?>, 
                                					<?php 
                                                        // Filter by the logged-in user's ID
                                                        $sql3 = "SELECT * FROM tb_pengaduan WHERE id_pengguna = $_SESSION[id_pengguna] AND status = 'Selesai'";
                                                        $result3= mysqli_query($koneksi, $sql3);                    
                                                        $rowDataPengaduanSelesai = mysqli_num_rows($result3);
                                                        echo  $rowDataPengaduanSelesai;
                                                      
                                					?>
                                					
                                					],
                                					backgroundColor: [
                                					'rgba(255, 99, 132, 1)',
                                					'rgba(54, 162, 235, 1)',
                                					'rgba(255, 206, 86, 1)'
                                					],
                                					borderColor: [
                                					'rgba(255,99,132,1)',
                                					'rgba(54, 162, 235, 1)',
                                					'rgba(255, 206, 86, 1)'
                                					],
                                					borderWidth: 1
                                				}]
                                			},
                                			options: {
                                				scales: {
                                					yAxes: [{
                                						ticks: {
                                							beginAtZero:true
                                						}
                                					}]
                                				}
                                			}
                                		});
                                	</script>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="row">

                        <div class="col-lg-6 mb-4">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                </div>
                                    <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;"
                                            src="../../assets/img/5127314.jpg" alt="img">
                                    </div>
                                    <p>
                                        <ul class="list-group list-group-flush">
                                              <li class="list-group-item">Masyarkat Registrasi</li>
                                              <li class="list-group-item">Memilih menu data pengaduan</li>
                                              <li class="list-group-item">Ajukan Pengaduan</li>
                                              <li class="list-group-item">Tulis Pengaduan</li>
                                              <li class="list-group-item">Respon</li>
                                        </ul>
                                    </p>
                                  </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                         <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pengenalan</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;"
                                            src="../../assets/img/bgm.jpg" alt="img">
                                    </div>
                                    <p>Temukan pengalaman mengutarakan pendapat dengan bebas
                                            
                                            Ajukan Pengaduan dengan bebas di Matur Bay</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
            <?php include 'footer.php';?>