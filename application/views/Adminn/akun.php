<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Akun Admin</h6>
        </div>
        <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <a href="<?= base_url('input_akun'); ?>" class="btn btn-sm btn-primary mb-3 float-right">Tambah Akun</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($useradmin as $i) {
                        ?>
                        <tr>
                            <td class="text-center" style="width: 10px;"><?php echo $no++.'.'; ?></td>
                            <td><?php echo $i['nama']; ?></td>
                            <td><?php echo $i['email']; ?></td>
                            <td class="text-center">
                                <?php if($i['user_status'] == "1"){ ?>
                                <a href="<?= base_url('admin/operasi_akun/0/'.$i['userID']); ?>" class="btn btn-sm btn-danger"><i class="icofont-ui-password"></i></a>
                                <?php }else if($i['user_status'] == "0"){ ?>
                                <a href="<?= base_url('admin/operasi_akun/1/'.$i['userID']); ?>" class="btn btn-sm btn-primary"><i class="icofont-ui-password"></i></a>
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