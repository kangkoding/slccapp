@extends('template.simple.app')
@section('content')
	<div class="row" style="margin-top:15px;padding-right:10px;">
		<div class="panel panel-green">
			<div class="panel-heading">
				Daftar Lamaran
			</div>
			<div class="panel-body">
				<table class="table table-hover table-striped" id="myTable">
					<thead>
						<tr>
							<th>Perusahaan</th>
							<th>Lowongan</th>
							<th>Status</th>
						</tr>
					</thead>
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