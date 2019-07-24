<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-10">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">Data Rukun Tetangga</h3>
                    </div>

                    <div class="box-body">
                        <div style="padding-bottom: 20px;">
                            <?= anchor(site_url('rukuntetangga/create'), '<i class="fas fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm"'); ?>

                            <?= anchor(site_url('rukuntetangga/word'), '<i class="far fa-file-excel"></i> Export Ms Word', 'class="btn btn-success btn-sm"');
                            ?></div>
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Nama</th>
                                    <th>Wilayah</th>
                                    <th>No HP</th>
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
                sProcessing: "Silahkan Tunggu..."
            },
            processing: true,
            serverSide: true,
            ajax: {
                "url": "rukuntetangga/json",
                "type": "POST"
            },
            columns: [{
                "data": "id_rt",
                "orderable": false
            }, {
                "data": "nama_rt"
            }, {
                "data": "rt"
            }, {
                "data": "no_hp"
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