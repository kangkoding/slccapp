@extends('template.simple.app')
@section('content')
      <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto">
          @if(!empty($results))
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
                {{ substr($b->isi, 0 , 100) }}
                </h4>
              </a>
              <p class="post-meta">Posted by
                <a href="#">Admin</a>
                on {{ $b->tgl }}</p>
            </div>
            <hr>
            @endforeach
            @else
            <div class="well" style="margin-top:10px"><p>Tidak ada lowongan</p></div>
            @endif

        </div>
        <div class="col-xs-12">
          @if(isset($links))
             {{ $links }}
          @endif
        </div>
      </div>
@endsection