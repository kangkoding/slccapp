@extends('template.simple.app')
@section('content')
      <div class="row" style="margin-top:100px">
        <div class="col-lg-12 col-md-12 mx-auto">
          @foreach($results as $b)
          @php
              $title = str_replace(' ','-',strtolower($b->judul));
          @endphp
          <div class="post-preview">
            <a href="{{ base_url() }}artikel/read/{{ $b->id.'-'.$title }}">
              <h2 class="post-title">
               {{ $b->judul }}
              </h2>
              <h4 class="post-subtitle">
              {{ substr($b->berita, 0 , 100) }}
              </h4>
            </a>
            <p class="post-meta">Posted by
              <a href="#">Admin</a>
              on {{ $b->tgl_berita }}</p>
          </div>
          <hr>
          @endforeach

        </div>
        <div class="col-xs-12">
          @if(isset($links))
             {{ $links }}
          @endif
        </div>
      </div>
@endsection