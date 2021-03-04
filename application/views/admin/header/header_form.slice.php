@extends('admin.template.admin')
@section('content')
        <h2 style="margin-top:0px">Header <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            <div class="well">
                Gambar Lama <br>
                <img src="{{ base_url('assets/images/').$gambar }}" alt="" style="height:100px">
            </div>
            <div class="well">
        	    <div class="form-group">
                    <label for="gambar">Gambar <?php echo form_error('gambar') ?></label>
                    <input type="hidden" name="old_image" value="{{ $gambar }}">
                    <input type="file" name="gambar">
                </div>
            </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('header') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
@endsection