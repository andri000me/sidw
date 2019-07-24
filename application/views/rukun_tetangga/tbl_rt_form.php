<div class="content-wrapper">

    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Rukun Tetangga</h3>
            </div>
            <form action="<?= $action; ?>" method="post">

                <table class='table table-bordered'>
                    <tr>
                        <td width='200'>Nama RT <?= form_error('nama_rt') ?></td>
                        <td><input type="text" class="form-control" name="nama_rt" id="nama_rt" placeholder="Masukkan Nama RT" value="<?= $nama_rt; ?>" /></td>
                    </tr>
                    <tr>
                        <td width='200'>Wilayah Rukun Tetangga <?= form_error('rt') ?></td>
                        <td><input type="text" class="form-control" name="rt" id="rt" placeholder="Wilayah Rukun Tetangga" value="<?= $rt; ?>" /></td>
                    </tr>
                    <tr>
                        <td width='200'>Nomor Hp <?= form_error('no_hp') ?></td>
                        <td><input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan Nomor HP" value="<?= $no_hp; ?>" /></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><input type="hidden" name="id_rt" value="<?= $id_rt; ?>" />
                            <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                            <a href="<?= site_url('rukuntetangga') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td>
                    </tr>
                </table>
            </form>
        </div>
</div>
</div>