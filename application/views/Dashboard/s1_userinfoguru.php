<section class="mt-5 mb-5">

	<!-- User Info -->

	<div class="container">
		<div class="row justify-items-center">
			<div class="col-sm-5">
				<div class="userCard">
					<img class="rounded-circle" style="height:130px; width:130px;" alt="<?php echo $dataMember['nama']; ?>" src="<?php echo base_url('webassets/userimage/' . $dataMember['image']); ?>">
					<div class="text-center mt-2 mb-2">
						<a data-toggle="modal" data-target="#modalUploadFoto"><span class="badge badge-success">Edit Foto</span></a>
					</div>
					<h5 class="text-center mt-4"><?php echo $dataMember['nama']; ?></h5>
					<p class="text-center mb-5"><?php echo $dataMember['bio']; ?></p>
					<p class="text-center"><?php if ($dataMember['lokasi'] == "") echo "Mohon isi alamat Anda. Klik Sunting Profil";
											else echo $dataMember['lokasi']; ?></p>
					<?php if ($dataMember['lat'] == 0 && $dataMember['lon'] == 0 && $dataMember['lokasi'] != "") : ?>

						<div class="text-center">
							<a class="btn bgGreen noRadius btnHover text-white" href="<?php echo base_url('dashboard/validasialamat'); ?>">Validasi Alamat</a>
						</div>
					<?php endif; ?>

					<div class="row mt-4 listItems">
						<div class="col">
							<h6>Jumlah jasa</h6>
						</div>
						<div class="col">
							<p class="float-right"><?php echo $jumlahJasa; ?> Jasa</p>
						</div>
					</div>
					<div class="row  mt-2 listItems">
						<div class="col">
							<h6>Jumlah pelanggan</h6>
						</div>
						<div class="col">
							<p class="float-right"><?php echo count($jumlahPelanggan); ?> Pelanggan</p>
						</div>
					</div>
					<div class="row  mt-2 listItems">
						<div class="col">
							<h6>Jumlah pendapatan</h6>
						</div>
						<div class="col">
							<?php $totalPendapatan = 0;
							foreach ($jumlahPendapatan as $jmlp) {
								$totalPendapatan += $jmlp['pendapatan'];
							} ?>
							<p class="float-right">Rp<?php echo $totalPendapatan; ?></p>
						</div>
					</div>
					<div class="row mt-2 ">
						<div class="col">
							<h6>Jumlah rating</h6>
						</div>
						<div class="col">
							<?php $totalNilai = 0;
							foreach ($jumlahNilai as $jmln) {
								$totalNilai += $jmln['nilai'];
							} ?>
							<p class="float-right"><?php echo $totalNilai / count($jumlahNilai); ?>/5</p>
						</div>
					</div>
				</div>
				<div class="userCardBottom">
					<div class="row align-items-center">
						<div class="col-6 bgGreen btnHover">
							<a data-toggle="modal" data-target="#modalEdit" class="linkWhite">
								<h6 class="text-center p-2">Sunting Profil</h6>
							</a>
						</div>
						<div class="col-6 bgRed btnHover">
							<a href="<?php echo base_url('home/logout'); ?>" class="linkWhite">
								<h6 class="text-center p-2">Logout</h6>
							</a>
						</div>
						<div class="col-12 bgBlue2 hideDesktop">
							<a href="<?php echo base_url('home/addJasa'); ?>" class="linkWhite">
								<h6 class="text-center p-2">Tambah Jasa</h6>
							</a>
						</div>
					</div>
				</div>

				<div class="notifikasi mt-5">
					<div class="row align-items-center">
						<div class="col-12 p-3 notifikasiTeks">
							<a href="<?php echo base_url('dashboard/pesanan'); ?>" class="mr-2 ml-2">Pesanan baru <span class="float-right"><?php $totalPesanan = count($pesanan->result_array()); ?>
									<?php echo $totalPesanan . " Pesanan "; ?></span></a>
						</div>
					</div>
				</div>

			</div>

			<!-- keterangan halaman  -->
			<div class="col-sm-7">
				<h5 class="mtMobile">Jasaku</h5>
				<hr class="mb-5">

				<!-- Jasa -->
				<div class="row">

					<?php foreach ($dataJasa as $dj) : ?>
						<div class="col-6" style="height: 420px;">
							<div class="cardMember" style="height: 330px;">
								<h5 class="text-center"><?php echo $dj['nama_mapel']; ?></h5>
								<p class="text-center mb-5"><?php echo $dj['deskripsi']; ?></p>
								<div class="row listItems">
									<div class="col">
										<h6>Jenjang</h6>
									</div>
									<div class="col">
										<p><?php echo $dj['jenjang']; ?></p>
									</div>
								</div>

								<div class="row listItems">
									<div class="col">
										<h6>Hari</h6>
									</div>
									<div class="col">
										<p><?php echo $dj['hari']; ?></p>
									</div>
								</div>

								<div class="row">
									<div class="col">
										<h6>Biaya</h6>
									</div>
									<div class="col">
										<p><?php echo $dj['biaya'] . ' / ' . $dj['biaya_per']; ?></p>
									</div>
								</div>
							</div>
							<div class="userCardBottom">
								<div class="row">
									<a href="<?php echo base_url('dashboard/updateJasa/' . $dj['id_jasa']); ?>" class="col-6 bgGreen text-center p-2 btnHover text-white">
										<i class="fas fa-pencil-alt"></i>
									</a>
									<a href="<?php echo base_url('dashboard/deleteJasa/' . $dj['id_jasa']); ?>" class="col-6 bgRed text-center p-2 btnHover text-white">
										<i class="fas fa-trash-alt"></i>
									</a>
								</div>
							</div>
						</div>

					<?php endforeach; ?>

					<!-- add new jasa -->
					<div class="col-6 hideMobile">
						<div class="cardMember text-center btnHover">
							<a href="<?php echo base_url('dashboard/addJasa'); ?>"><i class="fas fa-plus" style="font-size: 150px; color: #ddd"></i></a>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</section>