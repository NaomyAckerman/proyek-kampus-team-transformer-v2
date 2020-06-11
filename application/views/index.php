	<!-- Konten -->
    <div class="content">
	<div class="atas container-fluid">

	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner rounded">
	    <div class="carousel-item active">
	      <img class="d-block w-100" height="520" src="<?= base_url('assets/img/gambar5.jpeg'); ?>" alt="First slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" height="520" src="<?= base_url('assets/img/gambar1.jpg'); ?>" alt="Second slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" height="520" src="<?= base_url('assets/img/gambar4.jpg'); ?>" alt="Third slide">
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
</div>
<br>

<h1 class="text-center mt-5">Produk Terbaru</h1>
<hr class="w-50">

<div class="bawah container-fluid">

	<?php 
	$numcol = 3;
	$countrow = 0;
	$colwidth = 12 / $numcol;
	?>
	<div class="row m-5">
		<?php if ($produk == NULL): ?>
			<span class="alert alert-danger mx-auto">Produk Dengan Keywoard <b><?= $keyword; ?></b> Tidak Ada</span>
		<?php else: ?>
			<?php foreach ($produk as $data) { ?>
				
				<div class="col-md-<?= $colwidth; ?> mt-5">
					<a href="<?= base_url('home/detailproduk/'.$data['produkID']); ?>">
						<img class="float-left rounded mr-4" height="150" width="150" alt="Card image cap" src="<?= base_url('assets/admin/uploaded_files/'.$data['GambarProduk']); ?>">
					</a>
						<div class="mt-1">
					    	<h5><?= $data['namaproduk'] ?></h5>
					    	<p>Rp. <?= number_format($data['harga'],2,',','.') ?></p>
			
							<?php if ($data['jumlah'] <= 0): ?>
								<div class="habis">
						      	<p>Sold Out</p>
						      	<p class="small"><?= $data['jumlah'] ?> pcs</p>
								</div>
							<?php else: ?>
						      	<div class="ada">
						      	<p>Ready Stock</p>
						      	<p class="small"><?= $data['jumlah'] ?> pcs</p>
								</div>
							<?php endif ?>

				     	</div>
				</div>	
			<?php 
			$countrow++;
			if ($countrow % $numcol == 0)
				echo '</div><div class="row m-5">';
			}
			 ?>
		<!-- <?php endif ?> -->
	</div>
</div>
</div>
<!-- Konten akhir -->