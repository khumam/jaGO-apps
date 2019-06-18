<section class="mt-5 mb-5">
	<div class="container">
		<div class="h4 judulWeb text-center m-4">Cari Guru</div>

		<form action="<?php echo base_url('cari/hasil'); ?>" method="post" class="centerMobile">
			<div class="input-group mb-3">
				<select name="cariMapel" type=" text" class="form-control noRadius" placeholder="Pilih Mata Pelajaran" aria-label="Recipient's username" aria-describedby="button-addon2">
					<?php foreach ($dataMapel->result_array() as $dm) : ?>
						<option value="<?php echo $dm['id_mapel']; ?>"><?php echo $dm['nama_mapel'] . ' - ' . $dm['jenjang']; ?></option>
					<?php endforeach; ?>
				</select>
				<div class="input-group-append">
					<button class="btn bgGreen noRadius" type="submit" id="button-addon2">Cari Guru</button>
				</div>
			</div>
		</form>

		<div class="text-center">
			<a href="<?php echo base_url('cari/terdekat'); ?>" class="btn btn-lg btnHover bgBlue1 noRadius mt-5">Cari Berdasarkan Lokasi Terdekat</a>
		</div>
	</div>
</section>