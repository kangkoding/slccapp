@extends('admin.template.admin')
@section('content')
        <h2 style="margin-top:0px">Files <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">File <?php echo form_error('file') ?></label>
            <input type="file" name="file" class="form-control">
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/files') ?>" class="btn btn-default">Cancel</a>
	</form>
@endsection