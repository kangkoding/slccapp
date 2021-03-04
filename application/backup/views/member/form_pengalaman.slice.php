@extends('template.simple.app')
@section('content')
	<div class="row" style="margin-top:10px;padding-right:10px;">
		<div class="panel panel-green">
			<div class="panel-heading">
				Tambah Pengalaman
			</div>

			<div class="panel-body">
				<form action="{{ $action }}" class="form-horizontal" method="post">
					<input type="hidden" name="id" value="{{ $id }}">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Nama Perusahaan 
						</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" value="{{ $nama_perusahaan }}">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Jabatan
						</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="jabatan" value="{{ $jabatan }}">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Tahun Masuk
						</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="tahun_masuk" value="{{ $tahun_masuk }}">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Tahun Keluar
						</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="tahun_keluar" value="{{ $tahun_keluar }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-5 col-md-offset-3">
							<button class="btn btn-primary" type="submit">Simpan</button>
							&nbsp;
							<a href="{{ base_url('member/pengalaman') }}" class="btn btn-danger">Batal</a>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
@endsection