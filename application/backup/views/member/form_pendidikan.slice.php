@extends('template.simple.app')
@section('content')
	<div class="row" style="margin-top:10px;padding-right:10px">
		<div class="panel panel-green">
			<div class="panel-heading">
				<?php echo $button ?> pendidikan
			</div>
			<div class="panel-body">
				<form action="{{ $action }}" class="form-horizontal" method="post">
					<input type="hidden" name="id" value="{{ $id }}">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Tingkat
						</label>
						<div class="col-md-5">
							<select name="id_kat_pendidikan" id="" class="form-control">
								<option value="">Pilih Pendidikan</option>
								{{ print_r('kat_pendidikan') }}
								@foreach($kat_pendidikan as $kp)
								<option value="{{ $kp->id }} " @if($kp->id == $kat_pen) {{ 'selected' }} @endif>{{ $kp->pendidikan }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Nama
						</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="nama" value="<?php echo $nama ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Tahun Lulus
						</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="tahun_lulus" value="<?php echo $tahun_lulus ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-7 col-md-offset-3">
							<button class="btn btn-primary">{{ $button }}</button> <a href="{{ base_url('member/pendidikan-formal') }}" class="btn btn-danger">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection