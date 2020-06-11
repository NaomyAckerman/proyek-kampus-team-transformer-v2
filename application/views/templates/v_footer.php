<!-- footer -->
<footer class="mt-5">
	<div class="container">
		<div class="row text-center align-items-center">
			<div class="col-md-4 mt-2 mb-2">
				<img class="mr-3" src="<?= base_url("assets/img/bni.png"); ?>" width="60" height="20">
				<img class="mr-3" src="<?= base_url("assets/img/bri.png"); ?>" width="60" height="20">
				<img src="<?= base_url("assets/img/bca.png"); ?>" width="60" height="50">
			</div>
			<div class="col-md-4 mt-3">
				<h5>INFORMASI</h5>
				<hr class="w-50 mt-2">
				<a class="col-12" href=<?= base_url("home/info/syaratdanketentuan"); ?>>Syarat dan Ketentuan</a><br>
				<a class="col-12" href=<?= base_url("home/info/pengiriman"); ?>>Info pengiriman</a><br>
				<a class="col-12" href=<?= base_url("home/info/carabelanja"); ?>>Cara belanja</a>
			</div>
			<div class="col-md-4 mt-2 mb-2">
				<a href="https://www.instagram.com/ave.hijup/?hl=id" class="mr-3">
					<img src="<?= base_url("assets/img/ig1.png"); ?>" width="30" height="30">
				Ave.Hijup</a>
				<a href="https://api.whatsapp.com/send?phone=6283847337988&text=&source=&data=">
					<img src="<?= base_url("assets/img/wa.png"); ?>" width="30" height="32">
				0838-4733-7988</a>
			</div>
		</div>
	</div>
</footer>
<!-- footer akhir -->

<!-- Modal -->
<div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<form action="" method="POST" enctype="multipart/form-data">
      		<div class="form-group">
      		<label class="label-control">Username</label>
      		<input value="<?= $user['nama']?>" class="form-control" type="text" name="nama">
      		</div>
      		<div class="form-group">
      		<label class="label-control">Email</label>
      		<input value="<?= $user['email']?>" class="form-control" type="email" name="email">
      		</div>
      		<div class="form-group">
      		<label class="label-control">No Telepon</label>
      		<input value="<?= $user['no_telepon']?>" class="form-control" type="number" name="no">
      		</div>
      		<div class="form-group">
      		<label class="label-control">Alamat</label>
      		<input value="<?= $user['alamat']?>" class="form-control" type="text" name="alamat">
      		</div>
      		<div class="form-group">
      		<label class="label-control">Kode Pos</label>
      		<input value="<?= $user['kode_pos']?>" class="form-control" type="number" name="pos">
      		</div>
      		<div class="form-group">
      		<label class="label-control">Password</label>
      		<input class="form-control" type="password" name="password">
      		</div>
      		<div class="form-group">
      		<label class="label-control">Upload Profile</label>
      		<label class="btn btn-primary"><input type="file" name="profile"></label>
      		</div>
      		<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        	<button type="submit" name="submit" class="float-right btn btn-primary">Simpan Perubahan</button>
      		</form>
      </div>
    </div>
  </div>
</div>

<!-- modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apa anda ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik tombol keluar untuk berganti akun.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
          <a class="btn btn-primary" href=<?= base_url("logout"); ?>>Keluar</a>
        </div>
      </div>
    </div>
  </div>
	<script src="<?= base_url('assets/vendor/js/upload.js'); ?>" ></script>
    <script type="text/javascript" src="<?= base_url('assets/vendor/js/bootstrap-validate.js'); ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/vendor/js/jquery.js'); ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/vendor/js/validation.js'); ?>"></script>
</body>
</html>