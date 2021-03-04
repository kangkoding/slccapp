<style>
.green {
	color: green;
}
.red {
	color: red;
}
.loj {
	margin-top: -20px;
}
</style>
<section class="content">
	<h1 class="page-header">Mata Kuliah</h1>
    <div class="panel panel-primary">
        <div class="panel-body" style="padding:0px;">
        	<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Mata Kuliah</th>
							<th width="100">Kelompok</th>
							<th>Dosen</th>
							<th width="200">Umpan Balik</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$jumlah_soal = 0;
					$row_ques = $this->db2->query('SELECT COUNT(id) AS jml FROM tb_umpan_balik_ques')->row();
					if ($row_ques) {
						$jumlah_soal = $row_ques->jml;
					}
					foreach ($data_krs as $key):
						$jumlah_jawab = 0;
						$row_umpan_balik = $this->db2->query('SELECT COUNT(id) AS jml FROM tb_umpan_balik WHERE id_krs="'.$key->ID.'"')->row();
						if ($row_umpan_balik) {
							$jumlah_jawab = $row_umpan_balik->jml;
						}
					?>
						<tr>
							<td><?php echo $key->nm_mk ?></td>
							<td><?php echo $key->KELOMPOK ?></td>
							<td><?php echo $key->nama_dosen ?></td>
							<td>
				        		<form action="<?php echo base_url() ?>mhs/home/kuesioner" method="post">
				        			<input type="hidden" name="id_krs" value="<?php echo $key->ID ?>">
					        		<button type="submit" class="btn btn-warning">Form Kuesioner (<?php echo $jumlah_jawab."/".$jumlah_soal ?>)</button>
				        		</form>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
        	</div>
        </div>
    </div>
    <!-- /.panel -->
</section>