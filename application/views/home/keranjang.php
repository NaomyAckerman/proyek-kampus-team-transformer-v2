<!-- Konten -->
<div class="contentk">
	<div class="container">

		<h1 class="text-center mb-4">Keranjang</h1>
		<div class="row">
			<div class="col-md">
				<?php 
				$numcol = 1;
				$countrow = 0;
				$colwidth = 12 / $numcol;
				?>
				<div class="row">
				<?php foreach ($keranjang as $data) { 
                    $jumlah = $data['jumlahproduk'];
                    $total[] = $jumlah;
                    $jumlahharga = $jumlah * $data['harga']; 	
                    $hartot[] = $jumlahharga;
                ?>
						<div class="col-md text-center">
							<img class="rounded" src="<?= base_url('assets/admin/uploaded_files/'.$data['GambarProduk']); ?>" height="230" width="200">	
						</div>
						<div class="col-md mt-3">
							<h5><?= $data['namaproduk'] ?></h5>
							<h4>Rp. <?= number_format($data['harga'],2,',','.') ?></h4>
							<p>Jumlah = <?= $data['jumlahproduk']; ?></p>
							<a href="<?= base_url('home/hapuskeranjang/'.$data['cartID']); ?>" class="btn btn-danger">Hapus</a>
						</div>
				<?php 
				$countrow++;
				if ($countrow % $numcol == 0)
					echo '</div><div class="row"><hr>';
				}
				 ?>
				</div>
			</div>

			<div class="col-md">
				<div class="card mt-5">
					<div class="card-header text-center">
						<p>Total pembelian</p>
					</div>
					<div class="card-body">
					<?php if(count($keranjang) > 0){ ?>
						<table >
							<tr>
								<th>Jumlah Beli</th>
								<td></td>
								<td>:</td>
								<td></td>
								<td><?= array_sum($total);?></td>
							</tr>
							<tr>
								<td colspan="5"><hr class="w-100"></td>
							</tr>
							<tr>
								<th>Total Harga</th>
								<td></td>
								<td>:</td>
								<td></td>
								<td><?= array_sum($hartot);?></td>
							</tr>
						</table>
					<?php } ?>
						<div class="text-right">
						<a href="<?= base_url('updatestok');?>" class="btn btn-danger">Checkout</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<br>
		<div>
			<a href="<?= base_url('home'); ?>" class="btn btn-info">Lanjut Belanja</a>
		</div>
	</div>
</div>
	<!-- Konten akhir -->