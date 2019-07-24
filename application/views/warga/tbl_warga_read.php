<!doctype html>
<html>

<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />
    <style>
        body {
            padding: 15px;
        }
    </style>
</head>

<body>
    <h2 style="margin-top:0px">Tbl_menu Read</h2>
    <table class="table">
        <tr>
            <td>No KK</td>
            <td><?php echo $no_kk; ?></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td><?php echo $nik; ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr>
            <td>tempat Lahir</td>
            <td><?php echo $tempat_lahir; ?></td>
        </tr>
        <tr>
            <td>Tanggal Lhir</td>
            <td><?php echo $tanggal_lahir; ?></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="<?php echo site_url('warga') ?>" class="btn btn-success">Kembali</a></td>
        </tr>
    </table>
</body>

</html>