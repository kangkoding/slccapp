@extends('admin.template.admin')
@section('content')
    <script src="<?php echo base_url();?>assets/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <h2 style="margin-top:0px">Berita <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Judul <?php echo form_error('judul') ?></label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
        </div>
	    <div class="form-group">
            <label for="berita">Berita <?php echo form_error('berita') ?></label>
            <textarea class="form-control" rows="3" name="berita" id="berita" placeholder="Berita"><?php echo $berita; ?></textarea>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/berita') ?>" class="btn btn-default">Cancel</a>
	</form>
@endsection