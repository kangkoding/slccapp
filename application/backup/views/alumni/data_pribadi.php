<section class="content">
	<h1 class="page-header">Edit Data Pribadi</h1>
        <?php echo !empty($this->session->userdata('message')) ? $this->session->userdata('message') : "" ?>
        <div class="panel panel-primary">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form action="<?php echo $action ?>" method="post" autocomplete="off">
                    <h3 style="margin-top:0px;">Data Alamat</h3>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" placeholder="Alamat"><?php echo $data->alamat ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>RT</label>
                                <input type="text" class="form-control" name="rt" placeholder="RT" value="<?php echo $data->RT ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>RW</label>
                                <input type="text" class="form-control" name="rw" placeholder="RW" value="<?php echo $data->RW ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input type="text" class="form-control" name="kode_pos" placeholder="Kode Pos" value="<?php echo $data->KD_POS ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $data->email ?>">
                    </div>
                    <h3>Pekerjaan</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kantor Tempat Kerja</label>
                                <input type="text" class="form-control" name="tpt_kerja" placeholder="Kantor Tempat Kerja" value="<?php echo $data->tpt_kerja ?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat Kantor</label>
                                <textarea class="form-control" name="alamat_kerja" placeholder="Alamat Kantor"><?php echo $data->alamat_kerja ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telp Kantor</label>
                                <input type="text" class="form-control" name="telp_kerja" placeholder="Telp Kantor" value="<?php echo $data->telp_kerja ?>">
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" value="<?php echo $data->jabatan ?>">
                            </div>
                        </div>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                    </center>
                </form>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
</section>