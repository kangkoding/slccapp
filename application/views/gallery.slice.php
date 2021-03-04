@extends('template.simple.page')
@section('subcontent')
	<?php 
	foreach($output->css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<?php foreach($output->js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
	<style type='text/css'>
		body
		{
			font-family: Arial;
			font-size: 14px;
		}
		a {
		    color: blue;
		    text-decoration: none;
		    font-size: 14px;
		}
		a:hover
		{
			text-decoration: underline;
		}
		.basic-image {
			width: 200px;
			height: 150px;
		}
	</style>
	<div style='height:20px;'></div>
	<h4 class="title">Gallery</h4>
    <div>
		<?php echo $output->output; ?>
    </div>
@endsection