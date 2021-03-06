@extends('template.simple.app')
@section('content')
	<div class="row" style="margin-top:10px;padding-right:10px">
		<div class="panel panel-green">
			<div class="panel-heading">
				{{ $page_title }}
			</div>
			<div class="panel-body">
				<a href="{{ $action }}" class="btn btn-default"><i class="fa fa-plus"></i> Sertifikasi </a>
				<hr style="margin:10px 0px 10px 0px;padding:0px">
				<table class="table table-hover table-striped" id="myTable">
					<thead>
						<tr>
							<th>Nomor</th>
							<th>Level</th>
							<th>Lembaga</th>
							<th>Bidang</th>
							<th>Pilihan</th>
						</tr>
					</thead>	
				</table>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			var url = '<?php echo $json ?>';
			$('#myTable').DataTable({
				"ajax":{url, "type": "POST"},
				"dataSrc": 'data',
				"columns": [
					{'data':'nomor'},
					{'data':'level'},
					{'data':'lembaga'},
					{'data':'bidang'},
					{'data':'button'}
				],
			});
		});
	</script>
@endsection