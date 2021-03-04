@extends('admin.template.admin')
@section('content')
    <h2 style="margin-top:0px">Perusahaan <?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Perusahaan <?php echo form_error('perusahaan') ?></label>
            <input type="text" class="form-control" name="perusahaan" id="perusahaan" placeholder="Perusahaan" value="<?php echo $perusahaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jenis Perusahaan <?php echo form_error('jenis_perusahaan') ?></label>
            <!--
            <input type="text" class="form-control" name="jenis_perusahaan" id="jenis_perusahaan" placeholder="Jenis Perusahaan" value="<?php echo $jenis_perusahaan; ?>" />
            -->
            <select name="jenis_perusahaan" id="jenis_perusahaan" class="form-control">
                <?php foreach ($kat_perusahaan as $kp): ?>
                    <option value="<?php echo $kp->id ?>" <?php if($kp->id == $jenis_perusahaan){ echo 'selected'; } ?>><?php echo $kp->jenis ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <!--
	    <div class="form-group">
            <label for="date">Bergabung Sejak <?php echo form_error('bergabung_sejak') ?></label>
            <input type="text" class="form-control" name="bergabung_sejak" id="bergabung_sejak" placeholder="Bergabung Sejak" value="<?php echo $bergabung_sejak; ?>" />
        </div>
        -->
        <!--
	    <div class="form-group">
            <label for="varchar">Logo <?php echo form_error('logo') ?></label>
            <input type="text" class="form-control" name="logo" id="logo" placeholder="Logo" value="<?php echo $logo; ?>" />
        </div>
        -->
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/perusahaan') ?>" class="btn btn-default">Cancel</a>
	</form>
@endsection