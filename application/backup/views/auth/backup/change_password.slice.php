@extends('template.simple.app')
@section('content')
      <div class="row" style="margin-top:10px;padding-right:10px">
            <div id="infoMessage"><?php echo $message;?></div>
            <div class="panel panel-green">
                  <div class="panel-heading">
                        Change Password
                  </div>
                  <div class="panel-body">
                        <div class="col-md-5">
                        <?php echo form_open("auth/change_password");?>

                              <p>
                                    <?php echo lang('Password Lama', 'old_password');?> <br />
                                    <input type="text" name="old_password" class="form-control">
                              </p>

                              <p>
                                    <label for="new_password"><?php echo sprintf(lang('Password Baru'), $min_password_length);?></label> <br />
                                    <input type="text" name="new_password" class="form-control">
                              </p>

                              <p>
                                    <?php echo lang('Confirm Password', 'new_password_confirm');?> <br />
                                    <input type="text" name="new_password_confirm" class="form-control">
                              </p>

                              <?php echo form_input($user_id);?>
                              <button class="btn btn-primary">Simpan</button>
                        <?php echo form_close();?>
                        </div>
                  </div>
            </div>
      </div>
@endsection