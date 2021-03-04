@extends('admin.template.admin')
@section('content')
    <script src="<?php echo base_url();?>assets/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <h2 style="margin-top:0px">Lowongan <?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Perusahaan <?php echo form_error('id_perusahaan') ?></label>
            <!--
            <input type="text" class="form-control" name="id_perusahaan" id="id_perusahaan" placeholder="Id Perusahaan" value="<?php echo $id_perusahaan; ?>" />
            -->
            <select name="id_perusahaan" id="id_perusahaan" class="form-control">
            <?php foreach ($perusahaan as $p): ?>
                <option value="<?php echo $p->id ?>"><?php echo $p->perusahaan ?></option>
            <?php endforeach ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Lowongan <?php echo form_error('lowongan') ?></label>
            <input type="text" class="form-control" name="lowongan" id="lowongan" placeholder="Lowongan" value="<?php echo $lowongan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Min Pendidikan <?php echo form_error('min_pendidikan') ?></label>
            <select name="min_pendidikan" id="" class="form-control">
            @foreach($kpendidikan as $kp)
                <option value="{{ $kp->pendidikan }}">{{ $kp->pendidikan }}</option>
            @endforeach
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Penempatan <?php echo form_error('penempatan') ?></label>
            <input type="text" class="form-control" name="penempatan" id="penempatan" placeholder="Penempatan" value="<?php echo $penempatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Batas Waktu <?php echo form_error('batas_waktu') ?></label>
            <input type="text" class="form-control" name="batas_waktu" id="batas_waktu" value="<?php echo $batas_waktu; ?>" placeholder="YYYY-MM-DD"/>
        </div>
	    <div class="form-group">
            <label for="detail_lowongan">Detail Lowongan <?php echo form_error('detail_lowongan') ?></label>
            <textarea class="form-control" rows="3" name="detail_lowongan" id="detail_lowongan" placeholder="Detail Lowongan"><?php echo $detail_lowongan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Butuh Orang <?php echo form_error('butuh_orang') ?></label>
            <input type="text" class="form-control" name="butuh_orang" id="butuh_orang" placeholder="Butuh Orang" value="<?php echo $butuh_orang; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/lowongan') ?>" class="btn btn-default">Cancel</a>
	</form>
@endsection