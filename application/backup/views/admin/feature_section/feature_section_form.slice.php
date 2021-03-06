@extends('admin.template.admin')
@section('content')
    <h2 style="margin-top:0px"><?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Title <?php echo form_error('title') ?></label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Icon <?php echo form_error('icon') ?></label>
            <input type="hidden" name="old_image" value="{{ $icon }}">
            @if(!empty($icon))
                <br>
                <img src="{{ base_url('assets/images/').$icon }}" alt="" height="50px">
                <br>
                <br>
            @endif
            <input type="file" name="icon" class="form-control">
        </div>
	    <div class="form-group">
            <label for="varchar">Link <?php echo form_error('link') ?></label>
            <input type="text" class="form-control" name="link" id="link" placeholder="Link" value="<?php echo $link; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/feature_section') ?>" class="btn btn-default">Cancel</a>
	</form>
@endsection