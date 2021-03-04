@extends('admin.template.admin')
@section('content')
        <h2 style="margin-top:0px">Testimoni Read</h2>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Isi</td><td><?php echo $isi; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/testimoni') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
@endsection