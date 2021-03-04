@extends('admin.template.admin')
@section('content')
    <h2 style="margin-top:0px">Post Read</h2>
    <table class="table">
	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
	    <tr><td>Isi</td><td><?php echo $isi; ?></td></tr>
	    <tr><td>Created</td><td><?php echo $created; ?></td></tr>
	    <tr><td>Updated</td><td><?php echo $updated; ?></td></tr>
	    <tr><td>Slug</td><td><?php echo $slug; ?></td></tr>
	    <tr><td>Featured Image</td><td><?php echo $featured_image; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/post') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
@endsection