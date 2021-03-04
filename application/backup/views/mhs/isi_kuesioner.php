<section class="content">
	<h1 class="page-header">Kuesioner</h1>
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
        	<form action="<?php echo base_url() ?>mhs/home/simpan_kuesioner" method="post">
        	<input type="hidden" name="id_krs" value="<?php echo $data_krs->ID ?>">
        	<table class="table table-bordered">
        		<thead>
        			<tr>
	        			<th width="5">No</th>
	        			<th>Butir Pertanyaan</th>
	        			<th width="100">Skor</th>
        			</tr>
        		</thead>
        		<tbody>
	        	<?php 
                $i=0;
                $no=1;
                $alpha = range('A', 'Z'); 
                foreach ($tb_umpan_balik_ques_group as $key_group): ?>
	        		<tr>
	        			<th class="text-center"><?php echo $alpha[$i] ?></th>
	        			<th><?php echo $key_group->nm_umpan_balik_ques_group ?></th>
	        			<th></th>
	        		</tr>
	        		<?php 
					$ques = $this->db2->where('id_umpan_balik_group_ques', $key_group->id)->get('tb_umpan_balik_ques')->result();
	        		foreach ($ques as $key_ques):
                        $row_umpan_balik = $this->db2->select('*')
                                                     ->from('tb_umpan_balik')
                                                     ->where('id_krs', $data_krs->ID)
                                                     ->where('id_umpan_balik_ques', $key_ques->id)
                                                     ->get()->row();
                        $sel_umpan_balik = 0;
                        if ($row_umpan_balik) {
                            $sel_umpan_balik = $row_umpan_balik->jawaban;
                        }
                    ?>
	        		<tr>
	        			<td class="text-center"><?php echo $no ?></td>
	        			<td><?php echo $key_ques->pertanyaaan ?></td>
	        			<td>
	        				<select class="form-control" name="kues[<?php echo $key_ques->id ?>]" required>
	        					<option value="">-- --</option>
	        				<?php foreach ($tb_umpan_balik_jawaban as $key_jawaban): ?>
	        					<option value="<?php echo $key_jawaban->id ?>" <?php echo $sel_umpan_balik==$key_jawaban->id ? "selected" : "" ?>><?php echo $key_jawaban->id ?>. <?php echo $key_jawaban->jawaban ?></option>
	        				<?php endforeach ?>
	        				</select>
	        			</td>
	        		</tr>
	        		<?php $no++; endforeach ?>
	        	<?php $i++; endforeach ?>
		        </tbody>
        	</table>
        	<center>
        		<button type="submit" class="btn btn-primary btn-lg">Selesai</button>
        		<br><br>
        	</center>
        	</form>
        </div>
    </div>
</section>