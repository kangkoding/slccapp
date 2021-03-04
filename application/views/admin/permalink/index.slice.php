@extends('admin.template.admin')
@section('content')
    <div class="row">
    	<div class="col-md-12" style="padding:10px 30px 10px 30px">
    		<h2>Permalink Option</h2>
    		<p>Pilih bentuk link tulisan.</p>
    		<form action="{{ base_url('admin/permalink/update') }}" method="post">
    			<div class="form-group">
    				<input type="radio" class="iradio_flat-green" name="permalink" id="p1" value="1" <?php if($p->permalink == 1){ echo 'checked'; } ?>> <label for="p1"><?php echo base_url().'<i>post-title</i>' ?></label>
    			</div>
				<div class="form-group">
    				<input type="radio" class="iradio_flat-green" name="permalink" id="p2" value="0" <?php if($p->permalink == 0){ echo 'checked'; } ?>> <label for="p2"><?php echo base_url().'<i>post/read/post-title</i>' ?></label>
    			</div>
    			<div class="form-group">
    				<input type="radio" class="iradio_flat-green" name="permalink" id="p3" value="2" <?php if($p->permalink == 2){ echo 'checked'; } ?>> <label for="p3"><?php echo base_url().'<i>%year%/%month%/post-title</i>' ?></label>
    			</div>
    			<div class="form-group">
    				<button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
    			</div>
    		</form>
    	</div>
    </div>
@endsection