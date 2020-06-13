<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Ubah Profil</h6>
        </div>
        <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $user['nama']; ?>" placeholder="Masukkan Nama" >
                        <?php echo form_error('nama','<p class="text-danger small ml-2">','</p>'); ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?= $user['email'] ?>" placeholder="Masukkan Email" >
                        <?php echo form_error('email','<p class="text-danger small ml-2">','</p>'); ?>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <label style="font-size: 0.8rem;">**Kosongkan Password Jika Tidak Ingin Merubah</label>&nbsp;&nbsp;&nbsp;
                        <label style="font-size: 0.8rem;">**Isi Password Lama, Password Baru, Dan Konfirmasi Password Untuk Melakukan Perubahan Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Password Lama</label>
                        <input type="password" class="form-control" name="password_lama" id="password_lama" placeholder="Masukkan Password Lama">
                        <?php echo form_error('password_lama','<p class="text-danger small ml-2">','</p>'); ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Password Baru</label>
                        <input type="password" class="form-control" name="password" id="password_baru" placeholder="Masukkan Password Baru">
                        <?php echo form_error('password','<p class="text-danger small ml-2">','</p>'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Konfirmasi password</label>
                        <input type="password" class="form-control" name="repassword" id="repassword" placeholder="Ulangi Password Baru">
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-2">
                        <input type="submit" class="btn btn-primary btn-sm" name="btnSimpan" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>