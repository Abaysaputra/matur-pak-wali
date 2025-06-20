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
        document.location = '../admin/dashboarduser.php';
    </script>
<?php
};
$sql = "SELECT * From tb_pengaduan";
$sql2 = "SELECT * FROM tb_pengguna";
$sql3 = "SELECT * FROM tb_pengaduan";
$result = mysqli_query($koneksi, $sql);
$result2 = mysqli_query($koneksi, $sql2);
$result3 = mysqli_query($koneksi, $sql3);
$rowDataPengaduan = mysqli_num_rows($result);
$rowDataPengguna = mysqli_num_rows($result2);
$rowDataRespon = mysqli_num_rows($result3);

include 'header.php';
?>
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<!-- FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<!-- Animate.css (optional) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>



                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
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

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Data Pengguna</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $rowDataPengguna ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Persebaran Status Aduan</h6>
                                
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area" style="min-height:55vh; position: relative;">
                                    <div style="width: 345px;margin: 0px auto; ">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                    <script>
                                            var ctx = document.getElementById("myChart").getContext('2d');
                                            var myChart = new Chart(ctx, {
                                                type: 'pie',
                                                data: {
                                                    labels: ["Diterima","Diproses","Selesai"],
                                                    datasets: [{
                                                        label: '',
                                                        data: [
                                                        <?php 
                                                        $sql = "SELECT * From tb_pengaduan where status = 'Diterima'";
                                                        $result = mysqli_query($koneksi, $sql);                    
                                                        $rowDataPengaduan = mysqli_num_rows($result);
                                                        
                                                            echo  $rowDataPengaduan ;
                                                        
                                                        ?>, 
                                                        <?php 
                                                        $sql1 = "SELECT * From tb_pengaduan where status = 'Diproses'";
                                                        $result1 = mysqli_query($koneksi, $sql1);                    
                                                        $rowDataPengaduan1 = mysqli_num_rows($result1);
                                                        
                                                            echo  $rowDataPengaduan1 ;
                                                        
                                                        ?>, 
                                                        <?php 
                                                        $sql2 = "SELECT * From tb_pengaduan where status = 'Selesai'";
                                                        $result2= mysqli_query($koneksi, $sql2);                    
                                                        $rowDataPengaduan2 = mysqli_num_rows($result2);
                                                        
                                                            echo  $rowDataPengaduan2 ;
                                                        
                                                        ?>
                                                        
                                                        ],
                                                        backgroundColor: [
                                                        'rgba(255, 99, 132, 1)',
                                                        '#ffb703',
                                                        '#2a9d8f'
                                                        ],
                                                        borderColor: [
                                                        'rgba(255,99,132,1)',
                                                        '#fca311',
                                                        '#2a9d8f'
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
                    <!-- Data Pesebaran per daerah -->
                        <?php
                        $lokasi_data = [];
                        $query_lokasi = "
                            SELECT 
                                tb_pengguna.id_pengguna,
                                tb_pengguna.alamat_lengkap AS lokasi,
                                tb_pengguna.latitude,
                                tb_pengguna.longitude,
                                COUNT(tb_pengaduan.id_pengaduan) AS jumlah
                            FROM tb_pengaduan
                            JOIN tb_pengguna ON tb_pengaduan.id_pengguna = tb_pengguna.id_pengguna
                            GROUP BY tb_pengguna.id_pengguna
                        ";
                        $result_lokasi = mysqli_query($koneksi, $query_lokasi);
                        if (!$result_lokasi) {
                            die("Query Error: " . mysqli_error($koneksi));
                        }
                        while ($row = mysqli_fetch_assoc($result_lokasi)) {
                            $id_pengguna = $row['id_pengguna'];
                            $lokasi = $row['lokasi'];
                            $jumlah = $row['jumlah'];
                            $lat = $row['latitude'];
                            $lon = $row['longitude'];

                            // Jika lat/lon belum tersedia, ambil dari Nominatim
                            if (!$lat || !$lon) {
                                $alamat_encoded = urlencode($lokasi);
                                $url = "https://nominatim.openstreetmap.org/search?format=json&q=$alamat_encoded";

                                $opts = [
                                    "http" => [
                                        "header" => "User-Agent: demo/1.0\r\n"
                                    ]
                                ];
                                $context = stream_context_create($opts);
                                $geo = json_decode(file_get_contents($url, false, $context), true);

                                if (!empty($geo[0])) {
                                    $lat = $geo[0]['lat'];
                                    $lon = $geo[0]['lon'];

                                    // Simpan ke DB
                                    $update_sql = "UPDATE tb_pengguna SET latitude='$lat', longitude='$lon' WHERE id_pengguna='$id_pengguna'";
                                    mysqli_query($koneksi, $update_sql);
                                }
                            }

                            $lokasi_data[] = [
                                'lokasi' => $lokasi,
                                'jumlah' => $jumlah,
                                'lat' => $lat,
                                'lon' => $lon
                            ];
                        }
                        ?>

                    <!-- Data Persebaran Wilayah -->
                   <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Persebaran Wilayah</h6>
                                </div>
                        
                        <div class="card-body">
                            <div id="map" style="height: 80vh; width: 80em;margin: 0px auto;"></div>
                                <script>
                                    // Inisialisasi peta
                                    var map = L.map('map').setView([-7.265757, 112.734146], 11);

                                    // Tambahkan tile OpenStreetMap
                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        attribution: '© OpenStreetMap contributors'
                                    }).addTo(map);

                                   

                                    // Data lokasi dari PHP
                                    var dataLokasi = <?php echo json_encode($lokasi_data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;

                                    // Tambahkan marker lokasi
                                    dataLokasi.forEach(function (item) {
                                        if (item.lat && item.lon) {
                                            L.circleMarker([item.lat, item.lon], {
                                                radius: 8,
                                                color: 'red',
                                                fillColor: '#f03',
                                                fillOpacity: 0.5
                                            }).addTo(map)
                                              .bindPopup(`<strong>Lokasi:</strong> ${item.lokasi}<br><strong>Jumlah Pengaduan:</strong> ${item.jumlah}`);
                                        }
                                    });

                            </script>
                        </div>
                        </div>

                                    <!-- Content Row -->
                    <div class="row">
    <!-- Prosedur Pengajuan Aduan -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-lg border-left-primary h-100">
            <div class="card-header bg-primary text-white">
                <h6 class="m-0 font-weight-bold"><i class="fas fa-paper-plane mr-2"></i>Prosedur Pengajuan Aduan</h6>
            </div>
             <div class="card-body">
        <div class="text-center">
            <img class="img-fluid rounded mb-4" style="max-width: 300px;" src="../../assets/img/5127314.jpg" alt="img">
        </div>
        <div class="timeline">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex align-items-center">
                    <span class="badge badge-primary mr-3">1</span> Masyarakat Registrasi
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <span class="badge badge-primary mr-3">2</span> Memilih menu data pengaduan
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <span class="badge badge-primary mr-3">3</span> Ajukan Pengaduan
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <span class="badge badge-primary mr-3">4</span> Tulis Pengaduan
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <span class="badge badge-primary mr-3">5</span> Respon dari Petugas
                </li>
            </ul>
        </div>
    </div>
        </div>
    </div>

    <!-- Pengenalan -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-lg border-left-success h-100">
            <div class="card-header bg-success text-white">
                <h6 class="m-0 font-weight-bold"><i class="fas fa-bullhorn mr-2"></i>Pengenalan</h6>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    <img class="img-fluid rounded" style="max-width: 300px;" src="../../assets/img/bgm.jpg" alt="Pengenalan">
                </div>
                <p class="lead text-justify" style="font-size: 1rem;">
                    Selamat datang di <strong>Matur Pak Wali</strong> — tempat di mana suara Anda dihargai.
                    Rasakan kemudahan dalam menyampaikan pengaduan dengan cepat, aman, dan transparan.
                </p>
                <p class="mb-0"><em>“Suara Anda, Perubahan Kami.”</em></p>
            </div>
        </div>
    </div>
</div>


                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>

<?php include 'footer.php';?>