@extends('template.simple.app')
@section('content')
	<div class="row" style="margin-top:10px;padding-right:10px;">
		<div class="panel panel-green">
			<div class="panel-heading">
				Lowongan {{ $loker->lowongan }}
			</div>
			<div class="panel-body">
				<table style="width:100%">
					<tr>
						<th style="width:25%">Perusahaan</th>
						<td>{{ $loker->perusahaan }}</td>
					</tr>
					<tr>
						<th>Min. Pendidikan</th>
						<td>{{ $loker->min_pendidikan }}</td>
					</tr>
					<tr>
						<th>Batas Ahir</th>
						<td>{{ $loker->batas_waktu }}</td>
					</tr>
					<tr>
						<th>Judul Lowongan</th>
						<td>{{ $loker->lowongan }}</td>
					</tr>
					<tr>
						<th>Membutuhkan</th>
						<td>{{ $loker->butuh_orang }} Orang</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="panel panel-green">
			<div class="panel-heading">
				Detail Lowongan
			</div>
			<div class="panel-body">
				{{ $loker->detail_lowongan }}
			</div>
		</div>
	</div>
@endsection