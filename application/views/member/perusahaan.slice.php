@extends('template.simple.app')
@section('content')
	<div class="row" style="padding-right:10px;margin-top:15px;">
		<div style="panel panel-green">
			<div class="panel-heading">
				Data Perusahaan
			</div>
			<div class="panel-body">
				<table class="table table-hover table-striped" id="myTable">
					<thead>
						<tr>
							<th>No</th>
							<th>Perusahaan</th>
							<th>Jenis Perusahaan</th>
							<th>Bergabung Sejak</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data_perusahaan as $dp)
						<tr>
							<td>{{$dp->id}}</td>
							<td>{{$dp->perusahaan}}</td>
							<td>{{$dp->jenis_perusahaan}}</td>
							<td>{{$dp->bergabung_sejak}}</td>
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