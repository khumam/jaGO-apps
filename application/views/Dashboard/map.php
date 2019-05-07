<div class="container text-center py-4">
	<h5>Silahkan tentukan lokasi Anda dengan klik area pada peta</h5>

	<form class="mt-3" action="<?php echo base_url('dashboard/validasialamat'); ?>" method="post">
		<input name="id" hidden value="<?php echo $dataMember['id_user']; ?>">
		<div class="row">
			<div class="col-6">
				<label for="lat">Lattitude</label>
				<input id="lat" type="number" step="any" class="form-control noRadius" name="lat"
					placeholder="Posisi Anda">
			</div>
			<div class="col-6">
				<label for="lon">Longitude</label>
				<input id="lon" type="number" step="any" class="form-control noRadius" name="lon"
					placeholder="Posisi Anda">
			</div>
		</div>

		<button class="mt-3 btn bgBlue2 noRadius" type="submit">Verifikasi Lokasi</button>
	</form>

	<span class="mt-3" id="address"></span>
</div>

<div id="map_validasi"></div>
