@extends('admin.template.admin')
	@section('content')
    <h2 style="margin-top:0px">Detail Pengguna</h2>
    <table class="table table-striped">
    	<tr><td>Username</td><td><?php echo $username ?></td></tr>
		<tr><td>Email</td><td><?php echo $email ?></td></tr>
		<tr><td>Created on</td><td><?php echo $created_on ?></td></tr>
		<tr><td>Last login</td><td><?php echo $last_login ?></td></tr>
		<tr><td>First name</td><td><?php echo $first_name ?></td></tr>
		<tr><td>Last name</td><td><?php echo $last_name ?></td></tr>
		<tr><td>Company</td><td><?php echo $company ?></td></tr>
		<tr><td>Phone</td><td><?php echo $phone ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/users') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
	@endsection