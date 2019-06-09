<section class="mt-5 mb-5">

    <!-- User Info -->

    <div class="container">
        <div class="row justify-items-center">
            <div class="col-sm-5">
                <div class="userCard">
                    <img src="<?php echo base_url('webassets/img/icons/location.svg'); ?>">
                    <h5 class="text-center mt-4"><?php echo $dataMember['nama']; ?></h5>
                    <p class="text-center mb-5"><?php echo $dataMember['bio']; ?></p>
                    <p class="text-center"><?php if ($dataMember['lokasi'] == "") echo "Mohon isi alamat Anda. Klik Sunting Profil";
                                            else echo $dataMember['lokasi']; ?></p>
                    <?php if ($dataMember['lat'] == 0 && $dataMember['lon'] == 0 && $dataMember['lokasi'] != "") : ?>

                        <div class="text-center">
                            <a class="btn bgGreen noRadius btnHover text-white" href="<?php echo base_url('dashboard/validasialamat'); ?>">Validasi Alamat</a>
                        </div>
                    <?php endif; ?>
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
                    </div>
                </div>
            </div>

            <!-- keterangan halaman  -->
            <div class="col-sm-7">
                <h5 class="mtMobile">Pesanan</h5>
                <hr class="mb-5">

                <?php if (!$pesanan->result_array()) echo "Tidak ada pesanan"; ?>
                <?php foreach ($pesanan->result_array() as $ps) : ?>
                    <!-- Jasa -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="cardMember">
                                <h5><?php echo $ps['nama_guru']; ?></h5>
                                <p><?php echo $ps['mapel_pesanan']; ?></p>
                                <p><?php echo $ps['hari']; ?> - <?php echo $ps['jam']; ?></p>
                                <p>ID : <?php echo $ps['id_pesanan']; ?> (<?php echo $ps['status']; ?>)</p>
                            </div>
                            <div class="userCardBottom">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4 bgGreen text-center btnHover">
                                        <a href="<?php echo base_url('cari/detail/' . $ps['id_jasa']); ?>" class="linkWhite">
                                            <h6 class="text-center p-2">Detail</h6>
                                        </a>
                                    </div>
                                    <div class="col-4 bgBlue2 text-center p-2 btnHover">
                                        <h6>Rating</h6>
                                    </div>
                                    <div class="col-4 bgRed text-center p-2 btnHover">
                                        <a href="<?php echo base_url('dashboard/batalPesan/' . $ps['id_pesanan']); ?>" class="linkWhite">
                                            <h6 class="text-center">Batalkan</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>