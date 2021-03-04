@extends('admin.template.admin')
@section('content')
    <h2 style="margin-top:0px">Detail</h2>
    <table class="table">
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>URL</td><td><?php echo $url; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/top_menu') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
@endsection