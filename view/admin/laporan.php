<?php 
include '../../back/koneksi/koneksi.php';
include 'header.php';
?>
<div class="card show mb-4">	
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Cetak Data Laporan</h6>
		</div>
		<div class="card-body">
			<form action="../../back/pengaduan/laporanadmin.php" method="get" target="_blank">
				<label style="font-size: 14px">Nama Masyarakat</label>
					<select class="form-control mb-2" name="id_pengguna">
						<option>-Pilih-</option>
						<?php
						$query = $koneksi->query("SELECT tb_pengguna.id_pengguna, tb_pengguna.nama FROM tb_pengguna ORDER BY nama");
						while ($data = $query->fetch_assoc()) {
							echo "<option value='{$data['id_pengguna']}'>{$data['nama']}</option>";
						}
						?>
			        </select>
				<input type="date" name="awal" class="form-control mb-2">
				<input type="date" name="akhir" class="form-control mb-2">
				<button type="submit" class="btn btn-primary" name="cetak">Cetak</button>
			</form>
		</div>
<!-- <?php include 'footer.php'; ?> -->
</div>

