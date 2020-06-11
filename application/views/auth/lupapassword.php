	<!-- Konten -->

    <div class="contentdm">
	<div class="container">
  		<div class="card lupapassword o-hidden border-0 shadow-lg my-5">
	    	<div class="card-body p-0">
        		<div class="row">
          		<div class="col-lg-12 bg-light">
          			<div class="p-5">
                		<h1 class="h4 text-gray-900 mb-4">Lupa Password</h1>
                        <?= $this->session->flashdata('message'); ?>
				        <form class="user" method="POST" action="<?= base_url('lupapassword'); ?>">
				            <div class="form-group">
				               	<input required="" value="<?= set_value('email'); ?>" type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="email">
                                   <?php echo form_error('email','<p class="text-danger small ml-2">','</p>'); ?>
                            </div>
				            <div class="form-group">
				               	<input required="" value="<?= set_value('username'); ?>" type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username" name="username">
                                   <?php echo form_error('username','<p class="text-danger small ml-2">','</p>'); ?>
                            </div>
				            <div class="form-group">
				               	<input required="" type="password" class="form-control form-control-user" placeholder="Password Baru" name="password">
                                   <?php echo form_error('password','<p class="text-danger small ml-2">','</p>'); ?>
                            </div>
				            <hr>
				            <button class="mb-3 btn btn-secondary btn-user btn-block" type="submit" name="reset">Reset</button>
				            <span class="small"><a href="<?= base_url('login'); ?>">Login / Daftar</a></span>
				        </form>
              		</div>
          		</div>
				</div>
        	</div>
      	</div>  
    </div>  	
</div>


	<!-- Konten akhir -->