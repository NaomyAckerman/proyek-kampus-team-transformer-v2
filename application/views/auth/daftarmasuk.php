	<!-- Konten -->

    <div class="contentdm">
	<div class="container">
  		<div class="card o-hidden border-0 shadow-lg my-5">
	    	<div class="card-body p-0">
        		<div class="row">
          		<div class="col-lg-6 bg-light">
          			<div class="p-5">
                		<h1 class="h4 text-gray-900 mb-4">Masuk</h1>
						<?= $this->session->flashdata('messagemasuk'); ?>
				        <form class="needs-validation user" novalidate method="POST" action="<?= base_url('login'); ?>">
				            <div class="form-group">
				      			<label for="email">Email *</label>
				               	<input required type="email" class="form-control form-control-user" id="email" placeholder="Avehijup@gmail.com" name="email">
				      			<div class="valid-feedback">Benar.</div>
							    <div class="invalid-feedback">Email tidak boleh kosong.</div>
				            </div>
				            <div class="form-group">
				            	<label for="pass">Password *</label>
				               	<input required type="password" class="form-control form-control-user" id="pass" placeholder="Masukkan password" name="password">
				               	<div class="valid-feedback">Benar.</div>
							    <div class="invalid-feedback">Password tidak boleh kosong</div>
				            </div>
				            <hr>
				            <button class="btn btn-secondary btn-user btn-block" type="submit" name="masuk">Login</button>
				            <div class="small">
				            	<input class="mt-4 mr-2" type="checkbox" id="ingat" name="ingat">
				            	<label for="ingat">ingat saya</label>
				            </div>
				            <a href="<?= base_url('lupapassword'); ?>" class="small">Lupa password?</a>
				        </form>
              		</div>
          		</div>

          		<div class="col-lg-6 bg-light">
            		<div class="p-5">
		                <h1 class="h4 text-gray-900 mb-4">Daftar Baru</h1>
						<?= $this->session->flashdata('message'); ?>
						<form class="needs-validation user" novalidate method="POST" action="<?= base_url('registrasi'); ?>">
			               	<div class="form-group">
			               		<label for="emailr">Masukkan Email *</label>
			                  	<input required="" type="email" class="form-control form-control-user" id="emailr" placeholder="Avehijup@gmail.com" name="email">
			                  	<?php echo form_error('email','<p class="text-danger small ml-2">','</p>'); ?>
								<div class="valid-feedback">Good.</div>
							    <div class="invalid-feedback">Email tidak boleh kosong.</div>
			                </div>
			                <div class="form-group">
			                  	<label for="username">Masukkan Username *</label>
			                  	<input required="" type="text" class="form-control form-control-user" placeholder="Username" id="username" name="username">
			                  	<div class="valid-feedback">Benar.</div>
							    <div class="invalid-feedback">Username tidak boleh kosong.</div>
			                </div>
			               	<div class="form-group row">
			                  	<div class="col-sm-6 mb-3 mb-sm-0">
			               		<label for="pass1">Masukkan Password *</label>
			                    	<input required="" type="password" id="pass1" class="form-control form-control-user" placeholder="password" name="password1">
			                    	<div class="valid-feedback">Benar.</div>
								    <div class="invalid-feedback">Password tidak boleh kosong.</div>
			                  	</div>
			                  	<div class="col-sm-6">
			                    	<label for="pass2">Masukkan Repeat Password *</label>
			                    	<input required="" type="password" id="pass2" class="form-control form-control-user" placeholder="Repeat Password" name="password2">
			                    	<div class="valid-feedback">Benar.</div>
								    <div class="invalid-feedback">Password tidak boleh kosong.</div>
			                  	</div>
			                </div>
			               	<div class="form-group">
			                    <label for="alamat">Masukkan Alamat *</label>	
			                  	<input required="" id="alamat" type="text" class="form-control form-control-user" placeholder="Alamat" name="alamat">
			                    <div class="valid-feedback">Benar.</div>
								<div class="invalid-feedback">Alamat tidak boleh kosong.</div>
							</div>
			               	<div class="form-group">
			                    <label for="pos">Masukkan Kode Pos *</label>	
			                  	<input required="" id="pos" type="text" class="form-control form-control-user" placeholder="Kode Pos" name="pos">
			                    <div class="valid-feedback">Benar.</div>
								<div class="invalid-feedback">Kode Post tidak boleh kosong.</div>
							</div>
			                <div class="form-group">
			                    <label for="no">Masukkan No Telepone *</label>       
			                  	<input required pattern="[0-9]{1,13}" id="no" title="Mohon isi dengan maksimal 13 karakter dan hindari penggunaan huruf" type="text" class="form-control form-control-user" placeholder="Nomor Telepon" name="telepon">
			                  	<div class="valid-feedback">Benar.</div>
								<div class="invalid-feedback">Mohon isi dengan maksimal 13 karakter dan hindari penggunaan huruf.</div>
			                </div>
							<div class="small form-group form-check">
								<label>
							    <input required="" class=" form-check-input" type="checkbox" id="setuju" name="setuju">
							    <div class="ml-2">			
								Kebijakan dan Privasi
						     	</div>
						     	<div class="ml-2 valid-feedback">Benar.</div>
								<div class="ml-2 invalid-feedback">Check Berlangganan informasi AveHijup.</div>
								</label>
						     	<label class="ml-2"><i>Data pribadi Anda akan digunakan untuk mendukung pengalaman Anda di seluruh situs web ini, untuk mengelola akses ke akun Anda, dan untuk tujuan lain yang dijelaskan dalam kebijakan privasi kami.</i></label>
							</div>
			                <button class="btn btn-secondary btn-user btn-block" type="submit" name="daftar">Register</button>
			            </form>
			    	</div>
            	</div>
				</div>
        	</div>
      	</div>  
    </div>  	
</div>


	<!-- Konten akhir -->