<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Kartu Keluarga</h3>
                </div>
                <form action="<?= $action; ?>" method="post" enctype="multipart/form-data">

                    <table class='table table-bordered'>
                        <tr>
                            <td width='200'>Nomor KK <?= form_error('no_kk') ?></td>
                            <td>
                                <input type="number" class="form-control" name="no_kk" id="no_kk" placeholder="Masukkan Nomor KK" value="<?php echo $no_kk; ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td width='200'>Nama Kepala Keluarga <?= form_error('nama_kepkel') ?></td>
                            <td>
                                <input type="text" class="form-control" name="nama_kepkel" id="nama_kepkel" placeholder="Nama Kepala Keluarga" value="<?php echo $nama_kepkel; ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td width='200'>Alamat <?php echo form_error('alamat') ?></td>
                            <td>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat" value="<?php echo $alamat; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td width='200'>Wilayah RT <?php echo form_error('id_rt') ?></td>
                            <td>
                                <?= cmb_dinamis('id_rt', 'tbl_rt', 'rt', 'id_rt', $id_rt, 'ASC'); ?>
                                <?= $id_rt; ?>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input type="hidden" name="no_kk" value="<?php echo $no_kk; ?>" />
                                <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
                                <a href="<?php echo site_url('kepalakeluarga') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Back</a></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
</div>