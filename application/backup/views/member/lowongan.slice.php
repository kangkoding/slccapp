@extends('template.simple.app')
@section('content')
	<div class="row" style="margin-top:15px;padding-right:10px;">
		<div style="border:solid 1px silver;min-height:100px;padding:10px;">
			<table class="table table-hover table-striped" id="myTable">
				<thead>
					<tr>
						<th>No</th>
						<th>Perusahaan</th>
						<th>Lowongan</th>
						<th>Min.Pendidikan</th>
						<th>Penempatan</th>
						<th>Batas Waktu</th>
					</tr>
				</thead>
				<tbody>
					@foreach($loker as $lk)
					@php
						$str = str_replace(' ','-',$lk->lowongan)
					@endphp
					<tr>
						<td>{{ $lk->id }}</td>
						<td>{{ $lk->perusahaan }}</td>
						<td><a href="{{ base_url('member/page/detail_lowongan/').$lk->id.'-'.strtolower($str) }}">{{ $lk->lowongan }}</a></td>
						<td>{{ $lk->min_pendidikan }}</td>
						<td>{{ $lk->penempatan }}</td>
						<td>{{ $lk->batas_waktu }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<script>
				$(document).ready(function(){
					$('#myTable').DataTable();
				});
			</script>
		</div>
	</div>
@endsection