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
        <h2>Berita List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Judul</th>
		<th>Berita</th>
		<th>Tgl Berita</th>
		
            </tr><?php
            foreach ($berita_data as $berita)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $berita->judul ?></td>
		      <td><?php echo $berita->berita ?></td>
		      <td><?php echo $berita->tgl_berita ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>