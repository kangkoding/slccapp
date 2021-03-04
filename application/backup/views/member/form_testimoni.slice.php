@extends('template.simple.app')
@section('content')
	<div class="row" style="margin-top:10px;padding-right:10px;">
		<div class="panel panel-green">
			<div class="panel-heading">
				Tambah Testimoni
			</div>

			<div class="panel-body">
				<form action="{{ $action }}" class="form-horizontal" method="post">
					<input type="hidden" name="id" value="{{ $id }}">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Isi 
						</label>
						<div class="col-md-5">
							<textarea name="isi" id="isi" cols="30" rows="4">{{ $isi }}</textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-5 col-md-offset-3">
							<button class="btn btn-primary" type="submit">Simpan</button>
							&nbsp;
							<a href="{{ base_url('member/testimoni') }}" class="btn btn-danger">Batal</a>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
@endsection