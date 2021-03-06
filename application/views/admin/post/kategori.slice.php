@extends('admin.template.admin')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Kategori</div>
				<div class="panel-body" style="padding:10px 40px 10px 40px">
					<form id="formKat" class="form-horizontal">
						<div class="form-group">
							<label for="#">Kategori</label>
							<input type="text" name="kategori" class="form-control">
						</div>
						<div class="form-group">
							<button id="submit" class="btn btn-primary">Tambah</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<th>ID</th>
					<th>Kategori</th>
				</thead>
				<tbody>
					<?php foreach ($data as $kat): ?>
						<tr>
							<td><?php echo $kat->id ?></td>
							<td><?php echo $kat->kategori ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
	<script>
		$('#submit').click(function(){
			var data = $('#formKat').serialize();
			$.ajax({
				url:'<?php echo base_url();?>admin/post/kategori_create',
				data:data,
				type:'post',
				success:function(response){
					var content = JSON.parse(response);
					alert(content.response);
				}

			})
		});
	</script>
@endsection