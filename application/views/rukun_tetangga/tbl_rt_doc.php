<!doctype html>
<html>

<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />
    <style>
        .word-table {
            border: 1px solid black !important;
            border-collapse: collapse !important;
            width: 100%;
        }

        .word-table tr th,
        .word-table tr td {
            border: 1px solid black !important;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <h2>Tbl_Rt List</h2>
    <table class="word-table" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
            <th>Nama Ketua RT</th>
            <th>Wilayah RT</th>
            <th>No Hp</th>


        </tr><?php
                foreach ($rt_data as $rt) {
                    ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $rt->nama_rt ?></td>
                <td><?php echo $rt->rt ?></td>
                <td><?php echo $rt->no_hp ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>