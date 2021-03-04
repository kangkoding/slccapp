<section class="content">
	<h1 class="page-header">Data Kuesioner</h1>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <b><?php echo $data_krs->nm_mk ?></b>
        </div>
        <div class="panel-body" style="padding:0px;">
        	<style>
        		table {
        			margin-bottom: 0px;
        		}
        		thead > tr {
        			background-color: silver;
        		}
        		thead tr, thead th {
        			border: 1px solid silver;
        		}
        	</style>
        	<table class="table table-bordered">
        		<thead>
        			<tr>
	        			<th width="5">No</th>
	        			<th>Butir Pertanyaan</th>
	        			<th width="200">Skor</th>
        			</tr>
        		</thead>
        		<tbody>
	        	<?php $no=1; foreach ($tracer_kues_kategori as $key_kategori): ?>
	        		<tr>
	        			<th class="text-center"><?php echo $key_kategori->a_z ?></th>
	        			<th><?php echo $key_kategori->kues_kategori ?></th>
	        			<th></th>
	        		</tr>
	        		<?php 
					$tracer_kues = $this->db2->where('id_kategori', $key_kategori->id)->get('tracer_kues_umpan_balik')->result();
	        		foreach ($tracer_kues as $key_kues):
    					$row_jawaban = $this->db2->select('th.*, j.jawaban')
						    					->from('tracer_th_umpan_balik th')
						    					->join('tracer_kues_jawaban j', 'th.id_jawaban=j.id', 'left')
    											->where('th.id_krs', $data_krs->ID)
    											->where('th.id_kues', $key_kues->id)
    											->get()->row();
    					$jawaban = '<i class="fa fa-remove"></i>';
    					if ($row_jawaban) {
    						$jawaban = $row_jawaban->id_jawaban.". ".$row_jawaban->jawaban;
    					}
	        		?>
	        		<tr>
	        			<td class="text-center"><?php echo $no ?></td>
	        			<td><?php echo $key_kues->pertanyaan ?></td>
	        			<td><?php echo $jawaban ?></td>
	        		</tr>
	        		<?php $no++; endforeach ?>
	        	<?php endforeach ?>
		        </tbody>
        	</table>
        </div>
    </div>
</section>