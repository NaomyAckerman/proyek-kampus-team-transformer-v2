<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
            <?= $this->session->flashdata('message'); ?>
            <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="<?= base_url('admin/edit_transaksi/'.$transaksiID); ?>">Update Transaksi</a>
            </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="" style="font-weight:bold">Tgl. Transaksi</label>
                    <input type="text" class="form-control-plaintext" value="<?php $date=date_create($transaksi['tgl_transaksi']);echo date_format($date,"d-m-Y"); ?>" readonly>
                </div>
                <div class="col-md-4 form-group">
                    <label for="" style="font-weight:bold">Customer</label>
                    <input type="text" class="form-control-plaintext" value="<?php echo $transaksi['nama']; ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">   
                    <label for="" style="font-weight: bold">Kode Pos</label>
                    <input type="text" class="form-control-plaintext" value="<?php echo $transaksi['kode_pos']; ?>" readonly>
                </div>
                <div class="col-md-4 form-group">
                    <label for="" style="font-weight:bold">Alamat</label>
                    <input type="text" class="form-control-plaintext" value="<?php echo $transaksi['alamat']; ?>" readonly>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="" style="font-weight:bold">Bukti Pembayaran</label><br>
                    <?php
                    if(!empty($transaksi['gbrbukti_pembayaran'])){
                        echo "<a class='btn btn-sm btn-primary' href='".base_url('assets/admin/uploaded_files/'.$transaksi['gbrbukti_pembayaran'])."' target='_blank'>Link Gambar</a>";
                    }
                    ?>
                </div>
                <div class="col-md-4 form-group">
                    <label for="" style="font-weight:bold">Status Pembayaran</label><br>
                    <?php
                    if($transaksi['status_pembayaran'] == "1"){
                        echo "<span class='badge badge-pill badge-primary'>Terbayar</span>";
                    } else if($transaksi['status_pembayaran'] == "0"){
                        echo "<span class='badge badge-pill badge-danger'>Belum Dibayar</span>";
                    }
                    ?>
                </div>
                <div class="col-md-4 form-group">
                    <label for="" style="font-weight:bold">Status Pengiriman</label><br>
                    <?php
                        if($transaksi['status_pengiriman'] == "1"){
                            echo "<span class='badge badge-pill badge-primary'>Terkirim</span>";
                        } else if($transaksi['status_pengiriman'] == "0"){
                            echo "<span class='badge badge-pill badge-danger'>Belum Dikirim</span>";
                        }
                    ?>
                </div>
                <div class="col-md-4 form-group">
                    <label for="" style="font-weight:bold">No. Resi</label>
                    <input type="text" class="form-control-plaintext" value="<?php echo $transaksi['no_resi']; ?>" readonly>
                </div>
                
                
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($detailtransaksijoin as $i){
                        ?>
                        <tr>
                            <td class="text-center" style="width: 10px;"><?php echo $no++.'.'; ?></td>
                            <td><?php echo $i['namaproduk']; ?></td>
                            <td><?php echo $i['qty']; ?></td>
                            <td class="text-right"><?php echo "Rp. ".number_format($i['harga'],0,',','.'); ?></td>
                            <td class="text-right"><?php echo "Rp. ".number_format($i['subtotal'],0,',','.'); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>