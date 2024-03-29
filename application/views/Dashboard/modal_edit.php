<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel">Edit Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('home/updateDataMember'); ?>" method="post">
          <input id="id" name="id" placeholder="Id" class="form-control" type="text" value="<?php echo $dataMember['id_user']; ?>" hidden>
          <label for="id">Nama</label><br>
          <?php if (form_error('nama')) echo form_error('nama'); ?>
          <input id="nama" name="nama" placeholder="Nama" class="form-control" type="text" value="<?php echo $dataMember['nama']; ?>" required><br>

          <label for="email" class="mt-3">Email</label><br>
          <?php if (form_error('email')) echo form_error('email'); ?>
          <input id="email" name="email" placeholder="Email" class="form-control" type="email" value="<?php echo $dataMember['email']; ?>" required disabled><br>

          <label for="handphone" class="mt-3">Handphone</label><br>
          <?php if (form_error('handphone')) echo form_error('handphone'); ?>
          <input id="handphone" name="handphone" placeholder="08192809xxx" class="form-control" type="text" value="<?php echo $dataMember['no_hp']; ?>" required><br>

          <label for="bio" class="mt-3">Bio</label><br>
          <?php if (form_error('bio')) echo form_error('bio'); ?>
          <textarea id="bio" name="bio" placeholder="Bio" class="form-control"><?php echo $dataMember['bio']; ?></textarea><br>

          <label for="lokasi" class="mt-3">Alamat</label><br>
          <?php if (form_error('lokasi')) echo form_error('lokasi'); ?>
          <textarea id="lokasi" name="lokasi" placeholder="lokasi" class="form-control"><?php echo $dataMember['lokasi']; ?></textarea><br>

          <label for="pass" class="mt-3">Masukkan Password</label><br>
          <?php if (form_error('password')) echo form_error('password'); ?>
          <input id="pass" name="password" placeholder="Password" class="form-control" type="password" required>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary noRadius" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary noRadius">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalUploadFoto" tabindex="-1" role="dialog" aria-labelledby="modalUploadFotoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalUploadFotoLabel">Upload Foto Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('home/uploadFoto'); ?>" method="post" enctype="multipart/form-data">
          <p class="lead tnText text-center">Saran: Gunakan gambar berasio 1:1 (square)</p>
          <input id="id" name="id" placeholder="Id" class="form-control" type="text" value="<?php echo $dataMember['id_user']; ?>" hidden>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="fotoProfil" name="fotoProfil" aria-describedby="inputGroupFileAddon04">
              <label class="custom-file-label" for="fotoProfil">Choose file</label>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary noRadius" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary noRadius">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>