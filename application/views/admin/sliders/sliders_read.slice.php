@extends('admin.template.admin')
@section('content')
    <h2 style="margin-top:0px">Sliders Read</h2>
    <table class="table">
        <tr><td>Image</td><td><img src="<?php echo base_url() ?>assets/images/<?php echo $image ?>" width="600" alt=""></td></tr>
        <tr><td>Level</td><td><?php echo $level; ?></td></tr>
        <tr><td></td><td><a href="<?php echo site_url('admin/sliders') ?>" class="btn btn-default">Cancel</a></td></tr>
   </table>
@endsection