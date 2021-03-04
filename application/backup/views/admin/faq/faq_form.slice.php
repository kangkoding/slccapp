@extends('admin.template.admin')
@section('content')
    <script src="<?php echo base_url();?>assets/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
        <h2 style="margin-top:0px">Faq <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Question <?php echo form_error('question') ?></label>
            <input type="text" class="form-control" name="question" id="question" placeholder="Question" value="<?php echo $question; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Answer <?php echo form_error('answer') ?></label>
            <textarea name="answer" id="answer" cols="30" rows="10"><?php echo $answer; ?></textarea>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/faq') ?>" class="btn btn-default">Cancel</a>
	</form>
@endsection