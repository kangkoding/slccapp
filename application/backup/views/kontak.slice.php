@extends('template.simple.app')
@section('content')
      <?php echo $script_captcha; // javascript recaptcha ?>
      <div class="row">
          <div class="col-md-12" style="margin-bottom:30px">
              @if(!empty($error))
              <div class="alert alert-danger alert-dismissible show" role="alert">
                <strong>Gagal!</strong> {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              <h4><strong>Get in Touch</strong></h4>
              <form action="<?php echo base_url('kontak/send'); ?>" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" value="" placeholder="Name">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" value="" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input type="tel" class="form-control" name="phone" value="" placeholder="Phone">
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="3" placeholder="Message"></textarea>
                </div>
                <div class="form-group">
                    <?php echo $captcha // tampilkan recaptcha ?>
                </div>
                <button class="btn btn-default" type="submit" name="button">
                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit
                </button>
              </form>
          </div>
          <div class="col-md-12">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.1825130129873!2d109.25261521432141!3d-7.445049294628951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655c2373c89635%3A0xb03e5a4139cbea7b!2sSTMIK+Widya+Utama!5e0!3m2!1sid!2sid!4v1532751800144" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>


      </div>
@endsection