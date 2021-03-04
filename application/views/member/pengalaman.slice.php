@extends('template.simple.app')
@section('content')
	<div class="row" style="margin-top:10px;padding-right:10px;">
		<div class="panel panel-green">
			<div class="panel-heading">
				Tambah Pengalaman
			</div>
			<div class="panel-body">
				<a href="{{ base_url('member/pengalaman/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pengalaman</a>
			</div>
		</div>
		<div class="panel panel-green">
			<div class="panel-heading">
				Pengalaman Kerja
			</div>
			<div class="panel-body">
				<table class="table table-hover table-striped" id="myTable">
					<thead>
						<tr>
							<th>Nama Perusahaan</th>
							<th>Jabatan</th>
							<th>Tahun Masuk</th>
							<th>Tahun Keluar</th>
							<th>Pilihan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($pengalaman as $p)
						<tr>
							<td>{{ $p->nama_perusahaan }}</td>
							<td>{{ $p->jabatan }}</td>
							<td>{{ $p->tahun_masuk }}</td>
							<td>{{ $p->tahun_keluar }}</td>
							<td>
								<a href="{{ base_url('member/pengalaman/edit/').$p->id }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
								&nbsp;
								<a href="{{ base_url('member/pengalaman/delete/').$p->id }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$('#myTable').DataTable();
		});
	</script>
@endsection