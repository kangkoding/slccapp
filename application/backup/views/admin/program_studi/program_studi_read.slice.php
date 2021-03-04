@extends('admin.template.admin')
@section('content')
        <h2 style="margin-top:0px">Detail</h2>
        <table class="table">
	    <tr><td>Nama Program</td><td><?php echo $nama_program; ?></td></tr>
	    <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/program_studi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
@endsection