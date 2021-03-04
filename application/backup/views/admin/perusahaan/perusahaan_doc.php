<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Perusahaan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Perusahaan</th>
		<th>Jenis Perusahaan</th>
		<th>Bergabung Sejak</th>
		<th>Logo</th>
		
            </tr><?php
            foreach ($perusahaan_data as $perusahaan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $perusahaan->perusahaan ?></td>
		      <td><?php echo $perusahaan->jenis_perusahaan ?></td>
		      <td><?php echo $perusahaan->bergabung_sejak ?></td>
		      <td><?php echo $perusahaan->logo ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>