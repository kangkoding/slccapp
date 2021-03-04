@extends('admin.template.admin')
@section('content')
    <h2 style="margin-top:0px">Sidebar Read</h2>
    <table class="table">
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Jenis</td><td><?php echo $jenis; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/sidebar') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
@endsection