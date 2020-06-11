<!DOCTYPE html>
<html>
<head>
	<title>Home AVE HIJUP</title>
	<link href='<?= base_url('assets/img/farhan1.png'); ?>' rel='shortcut icon'>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/css/style.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/css/bootstrap.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/css/sb-admin-2.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/css/all.css'); ?>">
	<script src="<?= base_url('assets/vendor/js/jquery-3.4.1.min.js'); ?>"></script>
  	<script src="<?= base_url('assets/vendor/js/popper.min.js'); ?>"></script>
  	<script src="<?= base_url('assets/vendor/js/bootstrap.js'); ?>"></script>
  	<script src="<?= base_url('assets/vendor/js/all.js'); ?>"></script>
  	<script type="text/javascript" src="<?= base_url('assets/vendor/js/jquery.js'); ?>"></script>
</head>
<body>

<section>
<header id="navbar">
	<nav class="navbar navbar-light bg-light">
		<div class="container-fluid">
		<?php if (session()) :?>
			<div class="nav-item dropdown no-arrow">
              <a class="" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
	                	<img src="<?= base_url('assets/admin/uploaded_files/'.$user['foto']); ?>" width="20" height="20" class="img-fluid rounded-circle">
	                  <strong class="mx-2">Wellcome</strong><?= $user['nama']; ?>
	                </span>	
              </a>
	              <!-- Dropdown - User Information -->
	              <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in" aria-labelledby="userDropdown">
	                <a class="dropdown-item" href=<?= base_url("akun"); ?>>
	                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
	                  Profile
	                </a>
	                <div class="dropdown-divider"></div>
	                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
	                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
	                  Logout
	                </a>
	              </div>
              </div>           

		<?php elseif (!session()) :?>
			<div>
				<a href=<?= base_url("login"); ?>><i class="fas fa-user mr-3"></i>Assalamualaikum Masuk</a>
	  			<span>|</span>
	  			<a href=<?= base_url("registrasi"); ?>>Daftar</a>
	  		</div>
		<?php endif; ?>
			<div>
		  		<i class="fas fa-truck mx-2"></i><span>Shipping</span>
		  		<i class="fas fa-star mx-2"></i><span>Kualitas Premium</span>
				<i class="fas fa-dollar-sign mx-2"></i><span>Harga Terjangkau</span>
			</div>
		</div>
	</nav>

	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container-fluid">

			<button class="btn toggler mr-5" type="submit" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span><i class="fas fa-bars"></i></span>
		    </button>

  			<a href=<?= base_url("home");?> class="navbar-brand">Ave Hijup</a>

  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    			<span><i class="fas fa-ellipsis-v"></i></span>
  			</button>
	  		
	  		<div class="collapse navbar-collapse" id="navbarNav">
    			<ul class="navbar-nav ml-auto mr-auto">
					<li class="nav-item dropdown ml-3">
				        <a class="nav-link warna dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          KATEGORI
				        </a>
					        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					        <?php foreach ($kategori as $row) { ?>
					          <a class="dropdown-item mt-2" href="<?= base_url('home/produk/'.$row['kategoriID']); ?>"><?= $row['namakategori']; ?></a>
					        <?php } ?>
					        </div>
				    </li>
      				<li class="nav-item ml-3">
        				<a class="nav-link warna" href="<?= base_url('bestseller'); ?>">BEST SELLER</a>
      				</li>
    			</ul>
  				<form action="<?= base_url('home'); ?>" method="post" class="form-inline my-2 my-lg-0 mr-5">
		      		<div class="wrapper-input">
		      			<input type="search" placeholder="Search" aria-label="Search" name="keyword" autocomplete="off">
			      		<button class="my-sm-0" type="submit" name="cari"><i class="fas fa-search"></i></button>
			      	</div>
    			</form>
    			<span><a href="https://api.whatsapp.com/send?phone=6283847337988&text=%Saya%berminat%dengan%produk%AveHijup&source=&data=">Hubungi Kami</a><i class="far fa-comment-dots ml-2 mr-4"></i></span>
    			<span>
    				<a href="<?= base_url('keranjang'); ?>">Tas Belanja<i class="fas fa-shopping-cart ml-2"></i> 
				<?php if (session()): ?>
    					<?php if (!$cek_keranjang == 0): ?>
    					<span style="position: absolute; margin-left: -10px; margin-top: -7px;" class="badge badge-danger"><?= $cek_keranjang; ?></span>
    					<?php endif ?>
    			<?php endif ?>
    				</a>
    			</span>
  			</div>	  	
	  	</div>
	</nav>
	
	<div class="collapse" id="navbarToggleExternalContent">
	   	<div class="bg-dark p-4">
	   		<div class="container">
	   			<ul class="navbar-nav ml-auto mr-auto">
      				<li class="nav-item">
        				<a href="<?= base_url('testimoni'); ?>">Testimoni</a>
      				</li>

      				<li class="nav-item">
        				<a href="<?= base_url('notifikasi'); ?>">Notifikasi</a>
      				</li>
      				<li class="nav-item">
        				<a href="<?= base_url('konfirmasi'); ?>">Konfirmasi Pembayaran</a>
      				</li>
      				<li class="nav-item">
        				<a href="<?= base_url('akun'); ?>">Akun Saya</a>
      				</li>
      				<li class="nav-item">
        				<a href="<?= base_url('home/info/tentangkami'); ?>">Tentang Kami</a>
      				</li>
      				<?php if (session()): ?>
	      				<li class="nav-item">
	        				<a href="<?= base_url('logout'); ?>" data-toggle="modal" data-target="#logoutModal">Logout</a>
	      				</li>
      				<?php endif ?>
    			</ul>
    		</div>
	   	</div>
	</div>
</header>
</section>
	<!-- navbar akhir -->