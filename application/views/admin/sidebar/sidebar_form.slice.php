@extends('admin.template.admin')
@section('content')
        <h2 style="margin-top:0px">Sidebar <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Title <?php echo form_error('title') ?></label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jenis <?php echo form_error('jenis') ?></label>
            <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Kategori <?php echo form_error('id_kategori') ?></label>
            <input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Id Kategori" value="<?php echo $id_kategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Table <?php echo form_error('table') ?></label>
            <input type="text" class="form-control" name="table" id="table" placeholder="Table" value="<?php echo $table; ?>" />
        </div>
	    <div class="form-group">
            <label for="isi">Isi <?php echo form_error('isi') ?></label>
            <textarea class="form-control" rows="3" name="isi" id="isi" placeholder="Isi"><?php echo $isi; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Arrange <?php echo form_error('arrange') ?></label>
            <input type="text" class="form-control" name="arrange" id="arrange" placeholder="Arrange" value="<?php echo $arrange; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Limit <?php echo form_error('limit') ?></label>
            <input type="text" class="form-control" name="limit" id="limit" placeholder="Limit" value="<?php echo $limit; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/sidebar') ?>" class="btn btn-default">Cancel</a>
	</form>
@endsection