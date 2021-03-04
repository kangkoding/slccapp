@extends('admin.template.admin')
@section('content')
    <h2 style="margin-top:0px">Header Read</h2>
    <table class="table">
	    <tr><td>Gambar</td><td><?php echo $gambar; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('header') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
@endsection