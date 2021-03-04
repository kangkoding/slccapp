<section class="content">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Selamat datang <?php echo $this->session->userdata('nama'); ?>!
        </div>
        <div class="panel-body">
        	<a href="<?php echo base_url() ?>mhs/home/mata_kuliah" class="btn btn-default"><i class="fa fa-question-circle"></i>&nbsp;&nbsp; Kuesioner Mata Kuliah</a>
        </div>
    </div>
</section>