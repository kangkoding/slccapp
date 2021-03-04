@extends('admin.template.admin')
@section('content')
        <h2 style="margin-top:0px">Campus_hiring Read</h2>
        <table class="table">
	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
	    <tr><td>Isi</td><td><?php echo $isi; ?></td></tr>
	    <tr><td>Tgl</td><td><?php echo $tgl; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('campus_hiring') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
@endsection