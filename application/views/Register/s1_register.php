<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 regImg hideMobile">
            </div>
            <div class="col-sm-6 p-5 text-center">
                <h4 class="txtBlue subJudul">REGISTER</h4>
                <p class="smText">Bergabunglah Bersama Kami untuk Saling berbagi</p>

                <div class="container mt-5">
                    <form action="<?php echo base_url('home/register'); ?>" method="post">
                        <label for="nama">Nama</label><br>
                        <?php if (form_error('nama')) echo form_error('nama'); ?>
                        <input id="nama" name="nama" placeholder="Nama" class="forms" type="text"><br>
                        <label for="email" class="mt-3">Email</label><br>
                        <?php if (form_error('email')) echo form_error('email'); ?>
                        <input id="email" name="email" placeholder="Email" class="forms" type="email"><br>
                        <label for="pass" class="mt-3">Password</label><br>
                        <?php if (form_error('password')) echo form_error('password'); ?>
                        <input id="pass" name="password" placeholder="Password" class="forms" type="password"><br>
                        <label for="jenisMember" class="mt-3">Pilih Jenis Member</label><br>
                        <?php if (form_error('jenisMember')) echo form_error('jenisMember'); ?>
                        <select id="jenisMember" name="jenisMember" class="forms">
                            <option value="2">Member Biasa</option>
                            <option value="3">Guru</option>
                        </select><br>
                        <button class="btn tombol bgBlue2 mt-5 noRadius" type="submit">Register</button>
                        <p class="mt-4 text-center tnText lead">Sudah punya akun? <a href="">Klik di sini untuk login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>