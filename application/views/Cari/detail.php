<section class="mt-5 mb-5">
	<div class="container">
		<div class="userCard">
			<h3 class="text-center mb-5">Detail Jasa</h3>
			<img src="<?php echo base_url('webassets/img/icons/location.svg'); ?>">
			<h5 class="text-center mt-4"><?php echo $hasilCari[0]['nama']; ?></h5>
			<h6 class="text-center"><?php echo $hasilCari[0]['nama_mapel']; ?></h6>
			<p class="text-center mb-2"><?php echo $hasilCari[0]['deskripsi']; ?></p>
			<?php $jarak = distance($pribadi['lat'], $pribadi['lon'], $hasilCari[0]['lat'], $hasilCari[0]['lon']);
			echo "<p class='text-center mb-5'>Jarak dari lokasi Anda = ± " . round($jarak, 2) . " KM</p>"; ?>
			<div class="row align-items-center text-center">
				<div class="col-sm-4">
					<h6>Hari</h6>
					<p><?php echo $hasilCari[0]['hari']; ?></p>
				</div>
				<div class="col-sm-4">
					<h6>Jam</h6>
					<p><?php echo $hasilCari[0]['jam']; ?></p>
				</div>
				<div class="col-sm-4">
					<h6>Biaya</h6>
					<p><?php echo $hasilCari[0]['biaya'] . "/" . $hasilCari[0]['biaya_per']; ?></p>
				</div>
			</div>
			<div class="mt-5 row align-items-center text-center">
				<div class="col-sm-4">
					<h6>Alamat</h6>
					<p><?php echo $hasilCari[0]['lokasi']; ?></p>
				</div>
				<div class="col-sm-4">
					<h6>Email</h6>
					<p><?php echo $hasilCari[0]['email']; ?></p>
				</div>
				<div class="col-sm-4">
					<h6>No Hp</h6>
					<p><?php echo $hasilCari[0]['no_hp']; ?></p>
				</div>
			</div>

			<?php $ps = $pesanan->result_array();
			if (checkOrdered($ps, $hasilCari) == false) : ?>
				<div class="text-center">
					<a data-toggle="modal" data-target="#pesananModal" class="text-white btn btnHover bgGreen noRadius mt-5 px-auto">Buat Pesanan</a>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>


<?php
function distance($lat1, $lon1, $lat2, $lon2)
{
	if (($lat1 == $lat2) && ($lon1 == $lon2)) {
		return 0;
	} else {
		$degrees = rad2deg(acos((sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lon1 - $lon2)))));
		return $degrees * 111.13384;
	}
}
?>

<div class="modal fade" id="pesananModal" tabindex="-1" role="dialog" aria-labelledby="pesananModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="pesananModalLabel">Buat Pesanan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url('cari/addPesanan'); ?>" method="post">
					<input type="number" name="id_jasa" value="<?php echo $hasilCari[0]['id_jasa']; ?>" hidden>
					<input type="text" name="nama_guru" value="<?php echo $hasilCari[0]['nama']; ?>" hidden>
					<input type="text" name="mapel_pesanan" value="<?php echo $hasilCari[0]['nama_mapel']; ?>" hidden>
					<input type="number" name="id_user" value="<?php echo $pribadi['id_user']; ?>" hidden>
					<label for="hari">Hari (yang diinginkan)</label>
					<p>Saran Guru : <?php echo $hasilCari[0]['hari']; ?></p>
					<select class="noRadius" multiple="multiple" id="pilihHari" placeholder="Silakan pilih hari" name="hari[]" style="width: 400px;">
						<option value="Senin">Senin</option>
						<option value="Selasa">Selasa</option>
						<option value="Rabu">Rabu</option>
						<option value="Kamis">Kamis</option>
						<option value="Jumat">Jumat</option>
						<option value="Sabtu">Sabtu</option>
						<option value="Minggu">Minggu</option>
					</select>
					<label for="jam" class="mt-3"> Jam (yang diinginkan)</label>
					<p>Saran Guru : <?php echo $hasilCari[0]['jam']; ?> </p>
					<div class="row">
						<div class="col">
							<input type="text" class="form-control noRadius" name="jam" id="jam" placeholder="Jam mulai" required>
						</div>
						<div class="col">
							<input type="text" class="form-control noRadius" name="jam2" id="jam2" placeholder="Jam selesai" required>
						</div>
					</div>

					<label for="catatan" class="mt-3">Catatan tambahan</label>
					<textarea class="form-control" name="catatan" id="catatan" placeholder="Catatan tambahan"></textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger noRadius" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn bgGreen noRadius">Buat Pesanan</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php function checkOrdered($dataPesanan, $dataJasa)
{

	$i = 0;
	foreach ($dataPesanan as $dp) :
		if ($dataJasa[0]['id_jasa'] == $dataPesanan[$i]['id_jasa']) :
			return true;
		else :
			return false;
		endif;
		$i++;
	endforeach;
}
