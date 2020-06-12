<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Update Transaksi</h6>
        </div>
        <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Invoices</label>
                        <input type="text" class="form-control" value="<?= $transaksi['transaksiID']; ?>" readonly required>
                    </div>    
                </div>
                <div class="row">
                    
                    <div class="form-group col-md-4">
                        <label for="">Status Pembayaran</label>
                        <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                            <option value="0" <?php if($transaksi['status_pembayaran'] == 0){echo "Selected";} ?>>Belum Dibayar</option>
                            <option value="1" <?php if($transaksi['status_pembayaran'] == 1){echo "Selected";} ?>>Terbayar</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">No Resi</label>
                        <input type="text" class="form-control" name="no_resi" id="no_resi" value="<?php echo $transaksi['no_resi'] ?>">
                        <?php echo form_error('no_resi','<p class="text-danger small ml-2">','</p>'); ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Status Pengiriman</label>
                        <select name="status_pengiriman" id="status_pengiriman" class="form-control" required>
                            <option value="0" <?php if($transaksi['status_pengiriman'] == 0){echo "Selected";} ?>>Belum Dikirim</option>
                            <option value="1" <?php if($transaksi['status_pengiriman'] == 1){echo "Selected";} ?>>Terkirim</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2">
                        <input type="submit" class="btn btn-primary btn-sm" name="btnSimpan" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>