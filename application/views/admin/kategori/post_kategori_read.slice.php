@extends('admin.template.admin')
@section('content')
        <h2 style="margin-top:0px">Detail</h2>
        <table class="table">
	    <tr><td>Kategori</td><td><?php echo $kategori; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/kategori') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
@endsection