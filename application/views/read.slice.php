@extends('template.simple.app')
@section('content')
	<div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4"><?php echo $artikel->judul; ?></h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="#">Admin</a> <?php echo $artikel->tgl_berita ?>

          </p>
          <hr>
          <?php echo $artikel->berita; ?>
      </div>
@endsection