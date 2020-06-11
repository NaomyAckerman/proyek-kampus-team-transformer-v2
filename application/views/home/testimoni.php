	<!-- Konten -->
    <div class="contentt">
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2>Testimoni <b>Ave Hijup </b></h2>
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Carousel indicators -->
				<ol class="carousel-indicators">
					<?php $indikator = 0; foreach ($testi as $a) { ?>
						<li data-target="#myCarousel" data-slide-to="<?= $indikator; ?>" class="<?php if($indikator == 0){echo "active";} ?>"></li>
					<?php $indikator++; } ?>
				</ol>   
				<!-- Wrapper for carousel items -->
				<div class="carousel-inner">
				
					<?php 
						$counter = 1;
						foreach ($testi as $data) {
					?>
					<div class="item carousel-item <?php if($counter <= 1){echo "active";} ?>">
						<div class="row d-flex justify-content-center">
							<div class="col-sm-6">
								<div class="media">
									<div class="media-left d-flex mr-3">
										<a href="<?= base_url('home/detailproduk/'.$data['produkID']) ?>">
											<img src="<?= base_url('assets/admin/uploaded_files/'.$data['Gambartesti']); ?>" alt="">
										</a>
									</div>
									<div class="media-body">
										<div class="testimonial">
											<p><?= $data['Keterangan']; ?></p>
											<p class="overview"><b><?= $data['nama']; ?></b>, Email : <?= $data['email']; ?></p>
										</div>
									</div>
								</div>
								<hr>							
							</div>
						</div>			
					</div>

					<?php $counter++; } ?>

				</div>
			</div>
		</div>
		<div class="col-sm-12 mt-3 mx-auto">
			<div class="alert alert-success role="alert">Berhasil Upload Testimoni</div>
				<?= $this->session->flashdata('message'); ?>
		</div>
		<?php if (session()): ?>
		<a href="<?= base_url('uploadtesti'); ?>" class="btn btn-primary">Upload Testimoni</a>
		<?php endif ?>
	</div>
</div>
</div>
	<!-- Konten akhir -->