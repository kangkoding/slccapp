@extends('admin.template.admin')
@section('content')
        <h2 style="margin-top:0px">Detail</h2>
        <table class="table">
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Id Kategori</td><td><?php echo $id_kategori; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/news_section') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
@endsection