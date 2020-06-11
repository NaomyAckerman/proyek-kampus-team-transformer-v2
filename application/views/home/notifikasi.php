	<!-- Konten -->
    <div class="contentn">
	<div class="container">
		<div><a href="akun.php"><i class="fas fa-user-circle mr-2"></i>Selamat Datang <?= $user['nama']; ?></a></div>
		<h1 class="text-center mt-3">Notifikasi</h1>
		<div>

			<h3>Produk Dikirim</h3>
			<?php if ($kirim > 0): ?>
				<?php foreach ($kirim as $data): ?>					
				<div class="alert alert-success">
					<a href="<?= base_url('home/konfirmasi/'.$data['transaksiID']); ?>"><span>Produk yang anda pesan, Dengan kode Invoice : <?= $data['transaksiID']; ?> Telah dikirim, klik untuk melihat no Resi</span></a>
				</div>
				<?php endforeach ?>
			<?php elseif ($kirim == false): ?>
				<div class="alert alert-success">
					<p>Tidak Ada Pengiriman</p>
				</div>
			<?php endif ?>

			<h3>Pesanan</h3>
			<?php if ($trx > 0): ?>
				<?php foreach ($trx as $data): ?>					
				<div class="alert alert-danger">
					<a href="<?= base_url('home/konfirmasi/'.$data['transaksiID']); ?>"><span>Anda Memiliki Transaksi Yang Belum Dibayar, Dengan kode Invoice : <?= $data['transaksiID']; ?></span></a>
				</div>
				<?php endforeach ?>
			<?php elseif ($trx == false): ?>
				<div class="alert alert-danger">
					<p>Tidak Ada Pemesanan</p>
				</div>
			<?php endif ?>

		</div>
	</div>
</div>
	<!-- Konten akhir -->