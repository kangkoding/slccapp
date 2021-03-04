@extends('admin.template.admin')
@section('content')
    <h2 style="margin-top:0px">Perusahaan Read</h2>
    <table class="table">
        <tr><td>Perusahaan</td><td><?php echo $perusahaan; ?></td></tr>
        <tr><td>Jenis Perusahaan</td><td><?php echo $jenis_perusahaan; ?></td></tr>
        <tr><td>Bergabung Sejak</td><td><?php echo $bergabung_sejak; ?></td></tr>
        <tr><td>Logo</td><td><?php echo $logo; ?></td></tr>
        <tr><td></td><td><a href="<?php echo site_url('admin/perusahaan') ?>" class="btn btn-default">Cancel</a></td></tr>
   </table>
@endsection