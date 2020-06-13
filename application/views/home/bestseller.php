<!-- Konten -->
<div class="contentbs">
	<div class="container">

		<h1 class="text-center mb-5">BEST SELLER</h1>

			<?php 
			$numcol = 3;
			$countrow = 0;
			$colwidth = 12 / $numcol;
			?>
			<div class="row text-center">
			<?php foreach ($best as $data) { ?>
					<div class="col-md-<?= $colwidth; ?>">
						<div class="ml-5 mb-4 card w-75">
							<a href="<?= base_url('home/detailproduk/'.$data['produkID']); ?>">
							<img src="<?= base_url('assets/admin/uploaded_files/'.$data['GambarProduk']); ?>" class="card-img-top" height="270">
							</a>
							<div class="card-body">
								<p><?= $data['namaproduk']; ?></p>
								<p class="small">Rp. <?= number_format($data['harga'],2,',','.'); ?></p>
							</div>
						</div>
					</div>
			<?php 
			$countrow++;
			if ($countrow % $numcol == 0)
				echo '</div><div class="row text-center">';
			}
			 ?>
			</div>
	</div>
</div>
	<!-- Konten akhir -->