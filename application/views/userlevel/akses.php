<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?= alert('alert-info', 'Warning', 'Please check the menu that will be given access'); ?>
                <div class="box box-warning box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Manage User Access : <b><?php echo $level['nama_level'] ?></b></h3>
                    </div>

                    <div class="box-body">
                        <div style="padding-bottom: 10px;">
                            <table class="table table-bordered table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="30px">No</th>
                                        <th>Modul Name</th>
                                        <th width="120px">Beri Akses</th>
                                    </tr>
                                    <?php
                                    $no = 1;
                                    foreach ($menu as $m) {
                                        echo "<tr>
                                                <td>$no</td>
                                                <td>$m->title</td>
                                                <td align='center'><input type='checkbox' " .  checked_akses($this->uri->segment(3), $m->id_menu) . " onClick='kasi_akses($m->id_menu)'></td>
                                                </tr>";
                                        $no++;
                                    }
                                    ?>
                                </thead>
                                <!-- <tr>
                                    <td></td>
                                    <td colspan="2">
                                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                    </td>
                                </tr> -->

                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<?= anchor(site_url('userlevel'), '<i></i> Kembali', 'class="btn btn-primary"'); ?>
<script type="text/javascript">
    function kasi_akses(id_menu) {
        //alert(id_menu);
        var id_menu = id_menu;
        var level = '<?php echo $this->uri->segment(3); ?>';
        //alert(level);
        $.ajax({
            url: "<?php echo base_url() ?>index.php/userlevel/kasi_akses_ajax",
            data: "id_menu=" + id_menu + "&level=" + level,
            success: function(html) {
                //load();
                //alert('sukses');
            }
        });
    }
</script>