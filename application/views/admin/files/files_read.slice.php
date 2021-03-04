@extends('admin.template.admin')
@section('content')
    <h2 style="margin-top:0px">Detail</h2>
    <table class="table">
	    <tr><td>File</td><td><?php echo $file; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/files') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
@endsection