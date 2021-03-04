<section class="content">
	<h1 class="page-header">Data Kuesioner</h1>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Table Track Kuesioner
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <th><i class="fa fa-check"></i></th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <?php foreach ($data_soal as $key_soal): ?>
                                <th style="font-size:12px;text-transform:capitalize;white-space: nowrap;"><?php echo $key_soal->soal ?></th>
                            <?php endforeach ?>
                        </thead>
                        <tbody>
                            <?php foreach ($data_kues as $dk): ?>
                            <tr>
                                <td></td>
                                <td><?php echo $dk->nim ?></td>
                                <td><?php echo $dk->nama ?></td>
                                <?php 
                                foreach ($data_soal as $key_soal):
                                    $row_kuesioner = $this->db2->select('k.*, kj.jawaban')
                                                              ->from('tb_alumni_kuesioner k')
                                                              ->join('tb_alumni_kues_jawaban kj', 'k.id_alumni_kues_jawaban=kj.id', 'left')
                                                              ->where('k.id_mhs', $this->session->userdata('id_mhs'))
                                                              ->where('k.id_alumni_kues_soal', $key_soal->id)
                                                              ->get()->row();
                                    $jawaban = "";
                                    if ($row_kuesioner) {
                                        $jawaban = $row_kuesioner->jawaban;
                                    }
                                ?>
                                    <td><?php echo $jawaban ?></td>
                                <?php endforeach ?>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
</section>