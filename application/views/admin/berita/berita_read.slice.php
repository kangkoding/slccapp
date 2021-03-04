@extends('admin.template.admin')
@section('content')

    <h2 style="margin-top:0px">Berita Read</h2>
    <table class="table">
	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
	    <tr><td>Berita</td><td><?php echo $berita; ?></td></tr>
	    <tr><td>Tgl Berita</td><td><?php echo $tgl_berita; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/berita') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
@endsection