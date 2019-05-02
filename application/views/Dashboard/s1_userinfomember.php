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
                            <a class="btn bgGreen noRadius btnHover text-white" data-toggle="modal" data-target="#modalValidasiMap">Validasi Alamat</a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="userCardBottom">
                    <div class="row align-items-center">
                        <div class="col-6 bgGreen">
                            <a data-toggle="modal" data-target="#modalEdit">
                                <h6 class="text-center p-2">Sunting Profil</h6>
                            </a>
                        </div>
                        <div class="col-6 bgRed">
                            <a href="<?php echo base_url('home/logout'); ?>">
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

                <!-- Jasa -->
                <div class="row">
                    <div class="col">
                        <div class="cardMember">
                            <h5>Nama Guru</h5>
                            <p>Mata Pelajaran</p>
                            <p>Id Pesanan (status)</p>
                        </div>
                        <div class="userCardBottom">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 bgGreen text-center p-2">
                                    <h6>Detail</h6>
                                </div>
                                <div class="col-4 bgBlue2 text-center p-2">
                                    <h6>Rating</h6>
                                </div>
                                <div class="col-4 bgRed text-center p-2">
                                    <h6>Batalkan</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>