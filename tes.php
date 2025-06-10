                            <!-- HTML + MAP -->
                                <div class="col-xl-12 col-lg-7">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Data Persebaran</h6>
                                        </div>

                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="chart-area" style="min-height: 45vh;">
                                                <div style="width: 345px; margin: 0px auto;">
                                                    <div id="map" style="height: 300px; width: 100%; border-radius: 10px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Leaflet JS & CSS (pastikan diletakkan di luar body jika bisa) -->
                                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

                                <script>
                                // Inisialisasi map
                                var map = L.map('map').setView([-7.2575, 112.7521], 12); // Titik tengah Surabaya

                                // Tambahkan tile layer
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; OpenStreetMap contributors'
                                }).addTo(map);

                                // Tambahkan batas wilayah dari file GeoJSON (sesuaikan path file jika perlu)
                                fetch('surabaya.geojson')
                                    .then(response => response.json())
                                    .then(data => {
                                        var surabayaLayer = L.geoJSON(data, {
                                            style: {
                                                color: 'blue',
                                                weight: 2,
                                                fillColor: 'lightblue',
                                                fillOpacity: 0.1
                                            }
                                        }).addTo(map);

                                        // Fokuskan ke wilayah Surabaya
                                        map.fitBounds(surabayaLayer.getBounds());
                                    });

                                            // Data lokasi dari PHP
                                            var dataLokasi = <?php echo json_encode($lokasi_data); ?>;

                                            dataLokasi.forEach(function (item) {
                                                if (item.lat && item.lon) {
                                                    L.circleMarker([item.lat, item.lon], {
                                                        radius: 8,
                                                        color: 'red',
                                                        fillColor: '#f03',
                                                        fillOpacity: 0.5
                                                    }).addTo(map)
                                                      .bindPopup(`<strong>${item.lokasi}</strong><br>Jumlah Pengaduan: ${item.jumlah}`);
                                                }
                                            });
                                        </script>