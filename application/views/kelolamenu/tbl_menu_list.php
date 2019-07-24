<div class="content-wrapper">
    <section class="content">


        <div class="row">
            <div class="col-md-7">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">Setting Menu Layout</h3>
                    </div>

                    <div class="box-body">
                        <?php echo form_open('kelolamenu/simpan_setting') ?>
                        <table class="table table-bordered">
                            <tr>
                                <td width="250">View Menu By Level</td>
                                <td>

                                    <?php
                                    echo form_dropdown('tampil_menu', array('ya' => 'YA', 'tidak' => 'TIDAK'), $setting['value'], array('class' => 'form-control'));
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button type="submit" class="btn btn-success btn-sm">SAVE</button></td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">Manage Data Menu</h3>
                    </div>

                    <div class="box-body">
                        <div style="padding-bottom: 20px;">
                            <?php echo anchor(site_url('kelolamenu/create'), '<i class="fas fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-success btn-sm"'); ?>
                        </div>
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Title</th>
                                    <th>Url</th>
                                    <th>Icon</th>
                                    <th>Is Main Menu</th>
                                    <th>Is Aktif</th>
                                    <th width="150px">Action</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var t = $("#mytable").dataTable({
            initComplete: function() {
                var api = this.api();
                $(' #mytable_filter input').off('.DT').on('keyup.DT', function(e) {
                    if (e.keyCode == 13) {
                        api.search(this.value).draw();
                    }
                });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {
                "url": "kelolamenu/json",
                "type": "POST"
            },
            columns: [{
                "data": "id_menu",
                "orderable": false
            }, {
                "data": "title"
            }, {
                "data": "url"
            }, {
                "data": "icon"
            }, {
                "data": "is_main_menu"
            }, {
                "data": "is_aktif"
            }, {
                "data": "action",
                "orderable": false,
                "className": "text-center"

            }],
            order: [
                [0, 'desc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    });
</script>