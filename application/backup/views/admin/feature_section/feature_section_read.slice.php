@extends('admin.template.admin')
@section('content')
        <h2 style="margin-top:0px">Feature_section Read</h2>
        <table class="table">
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Icon</td><td><?php echo $icon; ?></td></tr>
	    <tr><td>Link</td><td><?php echo $link; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/feature_section') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
@endsection