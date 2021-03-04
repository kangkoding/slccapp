@extends('admin.template.admin')
@section('content')
        <h2 style="margin-top:0px">Faq Read</h2>
        <table class="table">
	    <tr><td>Question</td><td><?php echo $question; ?></td></tr>
	    <tr><td>Answer</td><td><?php echo $answer; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/faq') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
@endsection