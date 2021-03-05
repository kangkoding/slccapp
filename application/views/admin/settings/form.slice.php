@extends('admin.template.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<form action="<?php echo $action ?>" class="" enctype="multipart/form-data" method="post">
			<div class="panel panel-default">
				<div class="panel-heading">
					Site
				</div>
				<div class="panel-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-12" style="margin-bottom:10px">
								<label for="logo"><i class="fa fa-image"></i> Logo</label><br>
								<img src="<?php echo base_url('assets/images/') . $data->logo ?>" alt="logo" width="100px"><br><br>
								<input type="hidden" name="old_logo" value="<?php echo $data->logo ?>">
								<input type="file" name="logo" class="form-control">
							</div>
							<div class="col-md-6" style="margin-bottom:10px">
								<label for="lbanner_images"><i class="fa fa-bookmark"></i> Left Banner</label>
								<input type="hidden" name="old_banner" value="{{ $data->lbanner_images }}">
								<input type="file" name="lbanner_images" id="lbanner_images" class="form-control">
							</div>
							<div class="col-md-6" style="margin-bottom:10px">
								<label for="lbanner_tagline"><i class="fa fa-badge"></i> Left Banner Tagline</label>
								<input type="text" name="lbanner_tagline" id="lbanner_tagline" class="form-control" value="<?php echo $data->lbanner_tagline ?>">
							</div>
							<div class="col-md-6">
								<label for="website_name"><i class="fa fa-globe"></i> Nama Website</label>
								<input type="text" name="website_name" id="website_name" class="form-control" value="<?php echo $data->website_name ?>">
							</div>
							<div class="col-md-6">
								<label for="Email"><i class="fa fa-envelope-o"></i> Email</label>
								<input type="text" name="email" id="Email" class="form-control" value="<?php echo $data->email ?>">
							</div>
						</div>
						<div class="form-group" style="margin-top:10px">
							<label for="site_tagline"><i class="fa fa-abc"></i> Site Tagline</label>
							<input type="text" name="site_tagline" id="site_tagline" class="form-control" value="<?php echo $data->site_tagline ?>">
						</div>
						<div class="form-group" style="margin-top:10px">
							<label for="website_url"><i class="fa fa-link"></i> Website URL</label>
							<input type="text" name="website_url" id="website_url" class="form-control" value="<?php echo $data->website_url ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-smartphone"></i> Social</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="facebook_url"><i class="fa fa-facebook"></i> Facebook URL</label>
						<input type="text" name="facebook_url" id="facebook_url" class="form-control" value="<?php echo $data->facebook_url ?>">
					</div>
					<div class="form-group">
						<label for="instagram_url"><i class="fa fa-instagram"></i> Instagram URL</label>
						<input type="text" name="instagram_url" id="instagram_url" class="form-control" value="<?php echo $data->instagram_url ?>">
					</div>
					<div class="form-group">
						<label for="twitter_url"><i class="fa fa-twitter"></i> Twitter URL</label>
						<input type="text" name="twitter_url" id="twitter_url" class="form-control" value="<?php echo $data->twitter_url ?>">
					</div>
					<div class="form-group">
						<label for="youtube_url"><i class="fa fa-youtube"></i> Youtube URL</label>
						<input type="text" name="youtube_url" id="youtube_url" class="form-control" value="<?php echo $data->youtube_url ?>">
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					Other
				</div>
				<div class="panel-body">
					<!-- <div class="form-group">
						<label for="about_section"><i class="fa fa-info-circle"></i> About Section</label>
						<input type="text" name="about_section" id="about_section" class="form-control" value="<?php echo $data->about_section ?>">
					</div>
					<div class="form-group">
						<label for="feature_section"><i class="fa fa-bookmark"></i> Feature Section</label>
						<input type="text" name="feature_section" id="feature_section" class="form-control" value="<?php echo $data->feature_section ?>">
					</div> -->
					<div class="form-group">
						<label for="#"><i class="fa fa-list"></i> Footer</label>
						<div class="row">
							<div class="col-md-3">
								<label for="foot1">Blok 1</label>
								<input type="text" name="foot1" id="foot1" class="form-control" value="<?php echo $data->foot1 ?>">
							</div>
							<div class="col-md-3">
								<label for="foot2">Blok 2</label>
								<input type="text" name="foot2" id="foot2" class="form-control" value="<?php echo $data->foot2 ?>">
							</div>
							<div class="col-md-3">
								<label for="foot3">Blok 3</label>
								<input type="text" name="foot3" id="foot3" class="form-control" value="<?php echo $data->foot3 ?>">
							</div>
							<div class="col-md-3">
								<label for="foot4">Blok 4</label>
								<input type="text" name="foot4" id="foot4" class="form-control" value="<?php echo $data->foot4 ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<button class="btn btn-primary">
					<i class="fa fa-save"></i> Simpan
				</button>
			</div>
		</form>
	</div>
</div>
@endsection