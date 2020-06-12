<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Testimoni</h6>
        </div>
        <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Customer</th>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($testimonijoin as $i){
                        ?>
                        <tr>
                            <td class="text-center" style="width: 10px;"><?php echo $no++.'.'; ?></td>
                            <td><?php echo $i['nama']; ?></td>
                            <td><?php echo $i['namaproduk']; ?></td>
                            <td><?php echo $i['Gambartesti']; ?></td>
                            <td><?php echo $i['Keterangan']; ?></td>
                            <td class="text-center">
                            <?php
                                if($i['show_status'] == "1"){
                                    echo "<span class='badge badge-pill badge-primary'>Tampil</span>";
                                } else if($i['show_status'] == "0"){
                                    echo "<span class='badge badge-pill badge-danger'>Tidak Tampil</span>";
                                }
                            ?>
                            </td>
                            <td class="text-center">
                                <?php if($i['show_status'] == "1"){ ?>
                                <a href="<?= base_url('admin/operasi_testimoni/0/'.$i['testimoniID']); ?>" class="btn btn-sm btn-danger"><i class="icofont-eye"></i></a>
                                <?php }else if($i['show_status'] == "0"){ ?>
                                <a href="<?= base_url('admin/operasi_testimoni/1/'.$i['testimoniID']); ?>" class="btn btn-sm btn-primary"><i class="icofont-eye"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>