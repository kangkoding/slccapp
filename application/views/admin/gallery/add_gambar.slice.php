@extends('admin.template.admin')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<form action="{{ base_url('admin/gallery/add_action') }}" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Album</label>
					<select name="album" id="album" class="form-control" required>
						<option value="">Pilih</option>
						@foreach($album as $al)
						<option value="{{ $al->id }}">{{ $al->title }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">Gambar</label>
					<input type="file" multiple name="images[]" class="form-control">
				</div>
				<div class="form-group">
					<button class="btn btn-primary">
						<i class="fa fa-save"></i> Tambah
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection