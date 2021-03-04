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
        <h2>Lowongan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>Id Perusahaan</th>
        		<th>Lowongan</th>
        		<th>Min Pendidikan</th>
        		<th>Penempatan</th>
        		<th>Batas Waktu</th>
        		<th>Detail Lowongan</th>
        		<th>Butuh Orang</th>
		
            </tr><?php
            foreach ($lowongan_data as $lowongan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $lowongan->id_perusahaan ?></td>
		      <td><?php echo $lowongan->lowongan ?></td>
		      <td><?php echo $lowongan->min_pendidikan ?></td>
		      <td><?php echo $lowongan->penempatan ?></td>
		      <td><?php echo $lowongan->batas_waktu ?></td>
		      <td><?php echo $lowongan->detail_lowongan ?></td>
		      <td><?php echo $lowongan->butuh_orang ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>