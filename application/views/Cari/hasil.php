<section class="mt-5 mb-5">
    <div class="container">
        <div class="h4 judulWeb text-center m-4">Hasil Pencarian</div>
        <div class="row mx-auto">

            <?php if (!$hasilCari) : ?>
                <div class="container" style="height:20vh">
                    <h5 class="text-center">Tidak ditemukan</h5>
                </div>
            <?php endif; ?>
            <?php $i = 0;
            foreach ($hasilCari as $hc) : ?>

                <div class="col-4">
                    <div class="userCard">
                        <img src="<?php echo base_url('webassets/img/icons/location.svg'); ?>">
                        <h5 class="text-center mt-4"><?php echo $hc['nama_mapel'] . ' - ' . $hc['jenjang']; ?></h5>
                        <h6 class="text-center mb-1"><?php echo $hc['nama']; ?></h6>
                        <?php $jarak[$i] = distance($pribadi['lat'], $pribadi['lon'], $hc['lat'], $hc['lon']);
                        echo "<p class='text-center mb-4'>Jarak = ± " . round($jarak[$i], 2) . " KM</p>"; ?>
                        <div class="row  mt-4">
                            <div class="col">
                                <p>Rating</p>
                            </div>
                            <div class="col">
                                <p class="float-right">4.5/5</p>
                            </div>
                        </div>
                        <div class="row bgGreen btnHover">
                            <div class="col-12 py-2 text-center">
                                <a href="<?php echo base_url('cari/detail/' . $hc['id_jasa']); ?>" class="linkWhite"><?php echo "Rp" . $hc['biaya'] . " " . $hc['biaya_per']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $i++;
            endforeach; ?>
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