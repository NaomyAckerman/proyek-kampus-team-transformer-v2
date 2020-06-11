	<!-- Konten -->
    <div class="contentut">
	<div class="container">
		<form method="POST" action="" enctype="multipart/form-data">	
		<div class="row">
 	 		<div class="col-sm-2 imgUp">
    			<div class="imagePreview">	</div>  			
					<label class="btn btn-primary">
					Upload<input type="file" class="uploadFile img gambar" value="Upload Photo" name="gambar">
					</label>
		  	</div>
		  	<div class="col-sm-10">
		  		<label for="form01">Komentar Testimoni</label>
		  		<i class="fas fa-heart"></i>
		  		<textarea class="form-control" id="form01" name="testi"></textarea>
		  		<br>
		  		<select class="form-control col-sm-3" name="produk">
		  				<option value="" class="active" readonly>Pilih Produk Testimoni</option>
		  			<?php foreach ($produk as $data): ?>
			  			<option value="<?= $data['produkID'] ?>"><?= $data['namaproduk'] ?></option>
		  			<?php endforeach ?>
		  		</select>
		  		<div class="my-4"><button class="btn btn-info" name="upload">Kirim Testimoni</button></div>
		  	</div>
 		</div>
		</form>
	</div>
</div>
	<!-- Konten akhir -->