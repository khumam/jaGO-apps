<section class="mt-5 mb-5">
    <div class="container">
        <h5 class="text-center mb-5">Pesanan</h5>
        <?php if (!$pesanan) echo "Tidak ada pesanan"; ?>
        <?php foreach ($pesanan->result_array() as $ps) : ?>
            <!-- Jasa -->
            <p>ID : <?php echo $ps['id_pesanan']; ?> (<?php echo $ps['status']; ?>)</p>
            <div class="row mb-4">
                <div class="col">
                    <div class="cardMember">
                        <div class="row p-3">
                            <div class="col">
                                <div class="row">
                                    <p><b>Nama Pemesan : </b><br><?php echo $ps['nama_pemesan']; ?></p>
                                </div>
                                <div class="row">
                                    <p><b>Mapel Pesanan : </b><br><?php echo $ps['mapel_pesanan']; ?></p>
                                </div>
                                <div class="row">
                                    <p><b>Waktu pelaksanaan : </b><br><?php echo $ps['req_hari']; ?> <br> <?php echo $ps['req_jam']; ?></p>
                                </div>
                                <div class="row">
                                    <p><b>Biaya dipilih : </b><br>Rp<?php echo $ps['biaya']; ?> /<?php echo $ps['biaya_per']; ?></p>
                                </div>
                                <div class="row">
                                    <p><b>Total : </b><br>Rp<?php $total = 0;
                                                            if ($ps['biaya_per'] == 'Per Mata Pelajaran') {
                                                                $total = $ps['biaya'];
                                                                echo $total;
                                                            }
                                                            if ($ps['biaya_per'] == 'Per Hari') {
                                                                $jumlahReqHari = explode(',', $ps['req_hari']);
                                                                $jumlahReqHari = count($jumlahReqHari);
                                                                $total = $ps['biaya'] * (int)$jumlahReqHari;
                                                                echo $total;
                                                            }
                                                            if ($ps['biaya_per'] == 'Per Jam') {
                                                                $seluruhJam = explode('-', $ps['req_jam']);
                                                                $awal = explode(':', $seluruhJam[0]);
                                                                $akhir = explode(':', $seluruhJam[1]);
                                                                if (!$akhir[0]) {
                                                                    $durasi = 1;
                                                                } else {
                                                                    $durasi = (int)$akhir[0] - (int)$awal[0];
                                                                }
                                                                $total = $ps['biaya'] * $durasi;
                                                                echo $total;
                                                            } ?>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <p><b>Catatan pemesan:</b><br><?php echo $ps['catatan']; ?></p>
                                </div>
                                <div class="row">
                                    <p><b>Lokasi pemesan:</b><br><?php echo $ps['lokasi_pemesan']; ?></p>
                                </div>
                                <div class="row">
                                    <p><b>No Hp Pemesan:</b><br><?php echo $ps['nohp_pemesan']; ?></p>
                                </div>
                                <div class="row">
                                    <p><b>Dibuat pada:</b><br><?php echo $ps['time_created'] . " WIB"; ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="userCardBottom">
                        <div class="row d-flex align-items-center">
                            <div class="col-4 bgGreen text-center btnHover">
                                <a href="<?php echo base_url('dashboard/selesai/' . $ps['id_pesanan']) . "/" . $total; ?>" class="linkWhite">
                                    <h6 class="text-center p-2">Pesanan selesai</h6>
                                </a>
                            </div>
                            <div class="col-4 bgBlue2 text-center btnHover">
                                <a href="https://api.whatsapp.com/send?phone=<?php echo $ps['nohp_pemesan']; ?>" class="linkWhite">
                                    <h6 class="text-center p-2">Hubungi</h6>
                                </a>
                            </div>
                            <div class="col-4 bgRed text-center p-2 btnHover">
                                <a data-toggle="modal" data-target="#modalBatal<?php echo $ps['id_pesanan']; ?>" class="linkWhite">
                                    <h6 class="text-center">Batalkan Pesanan</h6>
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
                                <textarea name="alasanbatal" class="form-control" placeholder="Alasan dibatalkan, kami akan memberitahu pemesan" required></textarea>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary noRadius" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary noRadius">Batal dan kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</section>