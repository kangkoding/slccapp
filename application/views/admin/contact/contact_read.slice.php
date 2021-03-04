@extends('admin.template.admin')
@section('content')
    <h2 style="margin-top:0px">Contact Read</h2>
    <table class="table">
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
	    <tr><td>Message</td><td><?php echo $message; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/contact') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
@endsection