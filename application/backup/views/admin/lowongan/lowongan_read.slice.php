@extends('admin.template.admin')
@section('content')
    <h2 style="margin-top:0px">Lowongan Read</h2>
    <table class="table">
	    <tr><td>Id Perusahaan</td><td><?php echo $id_perusahaan; ?></td></tr>
	    <tr><td>Lowongan</td><td><?php echo $lowongan; ?></td></tr>
	    <tr><td>Min Pendidikan</td><td><?php echo $min_pendidikan; ?></td></tr>
	    <tr><td>Penempatan</td><td><?php echo $penempatan; ?></td></tr>
	    <tr><td>Batas Waktu</td><td><?php echo $batas_waktu; ?></td></tr>
	    <tr><td>Detail Lowongan</td><td><?php echo $detail_lowongan; ?></td></tr>
	    <tr><td>Butuh Orang</td><td><?php echo $butuh_orang; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/lowongan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
@endsection