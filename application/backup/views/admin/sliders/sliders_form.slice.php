@extends('admin.template.admin')
@section('content')
    <h2 style="margin-top:0px">Sliders <?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        @if($button=='Update')
        <div class="form-group">
            <label for="varchar">Old Image</label><br>
            <img src="<?php echo base_url() ?>assets/images/<?php echo $image ?>" width="600" alt="">
        </div>
        @else
        @endif
        <div class="form-group">
            <label for="varchar"><?php if ($button=='Update') { echo ' New '; } ?>Image standar(4067 x 1271)px <?php echo form_error('image') ?></label>
            <input type="file" class="form-control" name="image" id="image" placeholder="Image" />
        </div>
        <div class="form-group">
            <label for="varchar">Level <?php echo form_error('level') ?></label>
            <select class="form-control" name="level" id="level">
                <option <?php echo ($level=='1' ? 'selected' : '') ?> value="1">1</option>
                <option <?php echo ($level=='2' ? 'selected' : '') ?> value="2">2</option>
                <option <?php echo ($level=='3' ? 'selected' : '') ?> value="3">3</option>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">URL</label>
            <input type="text" class="form-control" name="url" id="url" placeholder="URL" value="<?php echo $url; ?>" />
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('admin/sliders') ?>" class="btn btn-default">Cancel</a>
    </form>
@endsection