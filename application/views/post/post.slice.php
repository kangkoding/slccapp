@extends('template.simple.page')
@section('title')
	Artikel
@endsection
@section('subcontent')
	<div style="margin-top:10px">
	@php $lang = $this->session->userdata('swu_lang'); @endphp
	@if(!empty($post))
	@foreach($post as $p)
 	<div class="alert">
      	<div class="media">
	      	<a class="pull-left" href="{{ base_url().permalink($p->permalink).$p->slug }}">
	    		<img class="media-object" src="{{ base_url('assets/images/').$p->featured_image }}" style="height:100px">
	  		</a>
	    		<h4 class="media-heading" style="color:#003e6f;font-family:Helvetica!important">@if($lang != 2) {{ $p->judul }} @else {{ $p->title }} @endif</h4>
		        <p><?php if($lang != 2){ echo strip_tags(substr($p->isi,0,400)); } else { echo substr($p->content,0,150); } ?><a href="{{ base_url().permalink($p->permalink).$p->slug }}"> Read More</a> </p>
		        <ul class="list-inline list-unstyled">
		  		   <li><span><i class="fa fa-clock-o"></i> {{ $p->created }} </span> &nbsp;&nbsp; <i class="fa fa-user"></i> Administrator</li>
				</ul>
    	</div>
  	</div>
  	@endforeach
  	@else
  		<div class="well"><i>Tidak ada tulisan di kategori ini</i></div>
  	@endif
  	<?php echo $links ?>
  	</div>
@endsection