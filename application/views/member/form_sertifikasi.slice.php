@extends('template.simple.app')
@section('content')
	<div class="row" style="margin-top:10px;padding-right:10px">
		<div class="panel panel-green">
			<div class="panel-heading">
				{{ $button }} Sertifikasi
			</div>
			<div class="panel-body">
				<form action="{{ $action }}" class="form-horizontal" method="post">
					<input type="hidden" name="id" value="{{ $id }}">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Bidang Sertifikasi
						</label>

						<div class="col-md-5">
							<select name="bidang" id="" class="form-control">
								<option value="">Pilih Bidang</option>
								@foreach($bidang as $b)
								@php $id = $b->id; @endphp
								<option value="{{$b->id}}" @if($b->id == $id_sertifikasi) {{ 'selected' }} @endif>{{$b->sertifikasi}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Level
						</label>
						<div class="col-md-5">
							<select name="level" id="level" class="form-control">
								<option value="">Pilih Level</option>
								@for($i=1; $i < 7; $i++)
								  <option value="{{$i}}" @if($i == $level) {{ 'selected' }} @endif>{{ $i }}</option>
								@endfor
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Nomor
						</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="nomor" value="{{ $nomor }}">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Lembaga Sertifikasi
						</label>
						<div class="col-md-5">
							<select name="lembaga" id="" class="form-control">
								<option value="">Pilih Lembaga</option>
								@foreach($lembaga as $l)
								<option value="{{$l->id}}" @if($l->id == $id_lembaga) {{ 'selected' }} @endif>{{ $l->sertifikasi }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-7 col-md-offset-3">
							<button class="btn btn-primary">{{$button}}</button> <a href="{{ base_url('member/sertifikasi') }}" class="btn btn-danger">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection