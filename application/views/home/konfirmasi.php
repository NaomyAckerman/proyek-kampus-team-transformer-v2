	<!-- Konten -->
    <div class="contentpesanan">
	<div class="container">
		<h1 class="text-center">Pesanan Anda</h1>
		<?php 
			foreach ($detail_transaksi as $detail) {
				$totalproduk[] = $detail['qty'];
				$subtotal[] = $detail['subtotal'];
			}
		?>
		<div class="card">
			<div class="card-body">
				<div class="text-capitalize">
					<label>Total Produk</label>
					<label class="float-right"><?= array_sum($totalproduk); ?> Pcs</label>
				</div>
				<hr>
				<div class="text-capitalize">
					<label>produk</label>
					<?php foreach ($detail_transaksi as $p): ?>						
						<label class="float-right">
							<span class="badge badge-danger"><?= $p['qty']; ?> Pcs</span>
							<?= $p['namaproduk']; ?>
							<span class="ml-3">Rp. <?= number_format($p['harga'],2,',','.'); ?></span>
						</label>
						<br>
						<hr>
					<?php endforeach ?>
				</div>
				<div class="text-capitalize">
					<label>Total Pembayaran</label>
					<label class="float-right">Rp. <?= number_format(array_sum($subtotal),2,',','.'); ?></label>
				</div>
				<hr>
				<div class="font-weight-bold text-capitalize">
					<label>pembayaran</label>
						<ul class="list-unstyled text-uppercase float-right text-justify">
							<li>bni no.rek : 123456789</li>
							<li>bri no.rek : 123456789</li>
							<li>bca no.rek : 123456789</li>
						</ul>
						<br><br>
					<?php if ($konfirmasi['status_pembayaran'] == 0): ?>
						<label class="alert alert-danger w-100 text-center">Kode Invoice : <?= $konfirmasi['transaksiID']; ?> <br>
						Silahkan Unggah Bukti Pembayaran untuk Mendapatkan No Resi
						</label>
					<?php elseif ($konfirmasi['status_pembayaran'] == 1 AND $konfirmasi['status_pengiriman'] == 0):?>				
						<label class="alert alert-info w-100 text-center">Pesanan Anda dengan Kode Invoice : <?= $konfirmasi['transaksiID']; ?> telah dikonfirmasi</label>
						<label class="alert alert-danger w-100 text-center">Silahkan Menunggu Proses Pengiriman</label>
					<?php elseif ($konfirmasi['status_pembayaran'] == 1 AND $konfirmasi['status_pengiriman'] == 1) :?>
						<label class="alert alert-info w-100 text-center">No Resi : <?= $konfirmasi['no_resi']; ?><br>
						Kode Invoice : <?= $konfirmasi['transaksiID']; ?>
						</label>
						<label class="alert alert-success w-100 text-center">Pesanan Anda Telah Dikirim</label>
					<?php endif ?>
				</div>
				<form action="<?= base_url('home/konfirmasi/'.$konfirmasi['transaksiID']); ?>" method="POST" enctype="multipart/form-data">
					<div class="imgUp font-weight-bold">
						<div>
							<?= $this->session->flashdata('message'); ?>
							<label>Upload Bukti Pembayaran</label>
						</div>
		    			<label class="col-md-3 imagePreview float-left mt-3" for="bukti">
		    			</label>
						<div>
							<label class="btn btn-info float-right">
								Pilih Gambar<input id="bukti" type="file" class="uploadFile gambar" value="Upload Photo" name="uploadbukti">
							</label>
						</div>
					</div>
					<br>
					<button class="btn btn-primary float-right" type="submit" name="upload">Unggah</button>
				</form>
			</div>
		</div>
	</div>
</div>
	<!-- Konten akhir -->