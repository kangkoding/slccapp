@extends('template.simple.app')
@section('content')
      <div class="row">
          <div class="well" style="margin-top:10px;padding:20px">
            Terima kasih pesan anda sudah diterima. <br><br>
            <a href="<?php echo base_url() ?>" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Kembali</a>
          </div>
      </div>
@endsection