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
                                    <div class="col-3 bgGreen text-center btnHover">
                                        <a href="<?php echo base_url('cari/detail/' . $ps['id_jasa']); ?>" class="linkWhite">
                                            <h6 class="text-center p-2">Detail</h6>
                                        </a>
                                    </div>
                                    <div class="col-3 bgBlue1 text-center btnHover">
                                        <a href="https://api.whatsapp.com/send?phone=<?php echo $ps['hp_guru']; ?>" class="linkWhite">
                                            <h6 class="text-center p-2">Hubungi</h6>
                                        </a>
                                    </div>
                                    <div class="col-3 bgBlue2 text-center p-2 btnHover">
                                        <a data-toggle="modal" data-target="#modalRating<?php echo $ps['id_pesanan']; ?>" class="linkWhite">
                                            <h6 class="text-center">Rating</h6>
                                        </a>
                                    </div>
                                    <div class="col-3 bgRed text-center p-2 btnHover">
                                        <a data-toggle="modal" data-target="#modalBatal<?php echo $ps['id_pesanan']; ?>" class="linkWhite">
                                            <h6 class="text-center">Batalkan</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modalBatal<?php echo $ps['id_pesanan']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalBatalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalBatalLabel">Sertakan alasan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo base_url('dashboard/batalPesan'); ?>" method="post">
                                        <input type="number" value="<?php echo $ps['id_pesanan']; ?>" name="id_pesanan" hidden>
                                        <textarea name="alasanbatal" class="form-control" placeholder="Alasan dibatalkan, kami akan memberitahu guru yang bersangkutan" required></textarea>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary noRadius" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary noRadius">Batal dan kirim</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modalRating<?php echo $ps['id_pesanan']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalRatingLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalRatingLabel">Rating</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <?php if ($ps['status'] == "Selesai") : ?>
                                        <p class="text-center smText mb-3">Rating diberikan untuk memberikan apresiasi kepada Guru yang sudah mengajar</p>
                                        <form action="<?php echo base_url('dashboard/rating/' . $ps['id_pesanan']); ?>" method="post">
                                            <select class="custom-select form-control" name="rating">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        <?php else : echo "Maaf pesanan belum diselesaikan";
                                    endif; ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary noRadius" data-dismiss="modal">Close</button>
                                    <?php if ($ps['status'] == "Selesai") : ?><button type="submit" class="btn btn-primary noRadius">Kirim Rating</button><?php endif; ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>