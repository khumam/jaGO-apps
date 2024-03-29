<div class="container">
    <h5 class="py-4 text-center">Tambah Jasa Baru</h5>
    <form action="<?php echo base_url('dashboard/addJasa'); ?>" method="post">
        <input id="id_user" name="id_user" placeholder="Id_user" class="form-control" type="number" value="<?php echo $dataMember['id_user']; ?>" hidden>
        <input id="hp_guru" name="hp_guru" placeholder="Hp_guru" class="form-control" type="number" value="<?php echo $dataMember['no_hp']; ?>" hidden>
        <label for="mapel">Mata Pelajaran</label><br>
        <?php if (form_error('mapel')) echo form_error('mapel'); ?>
        <select id="mapel" name="mapel" class="forms" style="width: 100%!important">
            <?php foreach ($dataMapel->result_array() as $dm) : ?>
                <option value="<?php echo $dm['id_mapel']; ?>"><?php echo $dm['nama_mapel'] . ' - ' . $dm['jenjang']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="deskripsi" class="mt-3">Deskripsi</label><br>
        <?php if (form_error('deskripsi')) echo form_error('deskripsi'); ?>
        <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi" class="noRadius form-control" required></textarea><br>

        <div class="row">
            <div class="col-sm-6">
                <label for="hari" class="mt-3">Hari</label><br>
                <?php if (form_error('hari')) echo form_error('hari'); ?>
                <!-- <input id="hari" name="hari" placeholder="Contoh Senin-Jumat" class="noRadius form-control"> -->
                <select class="noRadius" multiple="multiple" id="pilihHari" placeholder="Silakan pilih hari" name="hari[]" style="width: 400px;">
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label for="jam" class="mt-3">Jam (Jam:Menit)</label><br>
                <div class="row">
                    <div class="col">
                        <?php if (form_error('jam')) echo form_error('jam'); ?>
                        <input type="text" id="jam" name="jam" placeholder="Mulai jam" class="noRadius form-control js-time-picker">
                    </div>
                    <div class="col">
                        <?php if (form_error('jam2')) echo form_error('jam2'); ?>
                        <input type="text" id="jam2" name="jam2" placeholder="Selesai jam" class="noRadius form-control js-time-picker">
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <label for="biaya" class="mt-3">Biaya</label><br>
                <?php if (form_error('biaya')) echo form_error('biaya'); ?>
                <input id="biaya" name="biaya" placeholder="Rp" class="noRadius form-control" type="number">
            </div>
            <div class="col-6">
                <label for="per" class="mt-3">Per</label><br>
                <?php if (form_error('per')) echo form_error('per'); ?>
                <select id="per" name="per" class="forms" style="width: 100%!important">
                    <option value="Per Mata Pelajaran">Per Mata Pelajaran</option>
                    <option value="Per Jam">Per Jam</option>
                    <option value="Per Hari">Per Hari</option>
                </select>
            </div>
        </div>

        <button type="submit" class="my-4 btn btn-primary noRadius">Tambah Jasa</button>
    </form>
</div>