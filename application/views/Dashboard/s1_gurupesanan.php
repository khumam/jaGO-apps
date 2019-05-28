<section class="mt-5 mb-5">
    <div class="container">
        <h5 class="text-center mb-5">Pesanan</h5>
        <?php if (!$pesanan) echo "Tidak ada pesanan"; ?>
        <?php foreach ($pesanan->result_array() as $ps) : ?>
            <!-- Jasa -->
            <p>ID : <?php echo $ps['id_pesanan']; ?> (<?php echo $ps['status']; ?>)</p>
            <div class="row">
                <div class="col">
                    <div class="cardMember">
                        <div class="row">
                            <div class="col">
                                <h5><?php echo $ps['nama_guru']; ?></h5>
                                <p><?php echo $ps['mapel_pesanan']; ?></p>
                                <p><?php echo $ps['req_hari']; ?> <br> <?php echo $ps['req_jam']; ?></p>
                                <p>Rp<?php echo $ps['biaya']; ?> /<?php echo $ps['biaya_per']; ?></p>
                            </div>
                            <div class="col">
                                <p><b>Catatan pemesan:</b><br><?php echo $ps['catatan']; ?></p>
                            </div>
                        </div>

                    </div>
                    <div class="userCardBottom">
                        <div class="row d-flex align-items-center">
                            <div class="col-6 bgGreen text-center btnHover">
                                <a href="<?php echo base_url('dashboard/selesai/' . $ps['id_jasa']); ?>" class="linkWhite">
                                    <h6 class="text-center p-2">Pesanan selesai</h6>
                                </a>
                            </div>
                            <div class="col-6 bgRed text-center p-2 btnHover">
                                <a href="<?php echo base_url('dashboard/batalPesan/' . $ps['id_pesanan']); ?>" class="linkWhite">
                                    <h6 class="text-center">Batalkan Pesanan</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>