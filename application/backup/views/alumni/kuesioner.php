<section class="content">
	<h1 class="page-header">Kuesioner</h1>
    <div class="panel panel-primary">
        <!-- /.panel-heading -->
        <div class="panel-body">
		    <form action="" method="post" id="formKues">
				<?php foreach ($data_soal as $ds): ?>
					<h4><strong><?php echo $ds->soal; ?></strong></h4>
					<?php foreach ($ds->data_jawaban as $dj): ?>
						<input type="radio" name="<?php echo $ds->id ?>" value="<?php echo $dj->id ?>" id="<?php echo $dj->id ?>"> <label for="<?php echo $dj->id ?>" style="cursor:pointer"><?php echo $dj->jawaban ?></label> <br>
					<?php endforeach ?>
				<?php endforeach ?>
				<br>
				<button type="button" class="btn btn-primary btn-lg" id="simpan">Kirim</button>
				<br>
			</form>
        </div>
    </div>
</section>
<script type="text/javascript">
$(document).ready(function(){
	$('#simpan').click(function(){
		var data = $('#formKues').serializeArray();
		$.ajax({
			url:'<?php echo base_url();?>alumni/kuesioner/input',
			type:'post',
			data:{data:data},
			success:function(response){
				console.log(response);
				alert('data berhasil dikirim.');
				window.location.href = "<?php echo base_url();?>alumni/kuesioner/data"
			}
		});
	});
});
</script>