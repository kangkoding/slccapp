@extends('template.simple.page')
@section('title')
	Gallery
@endsection
@section('subcontent')
	<link rel="stylesheet" href="{{ base_url('assets/prettyphoto/') }}css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
	<script src="{{ base_url('assets/prettyphoto/') }}js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
    <style>
        .gallery-img {
            margin-bottom:10px!important;
            display: inline-block!important;
            height: 130px!important;
            overflow: hidden;
        }
        .gim {
        	width: 100%;
        	height: auto;
        	display: inline-block;
        	background-size: cover!important;
        }
        .img-wrap {
	     	box-shadow: 0px 0px 2px 0 black;
	     	padding: 3px;
        }
        .gallery-img > .img-wrap > .content-images {
			border: none;
		    box-shadow: none;
        }
		ul li { display: inline; }
		
		.wide {
			border-bottom: 1px #000 solid;
			width: 4000px;
		}
		
		.fleft { float: left; margin: 0 20px 0 0; }
		
		.cboth { clear: both; }
		
		#main {
			background: #fff;
			margin: 0 auto;
			padding: 30px;
			width: 1000px;
		}
		.unstyled {
			float: left;
		}
		.unstyled:hover{
			text-decoration: none!important;
		}
		.unstyled:hover .well {
			box-shadow: 0 0 1px 0 black!important;
		}
        @media screen and (max-width:992px){
            .gallery-img {
                height:auto!important;
            }
        }
    </style>
	<div class="row gallery">
		<div class="col-md-12">
			<h2 class="title" style="text-align:center;margin-top:15px"><i class="fa fa-image"></i> Gallery</h2>
			<div class="row" style="padding:15px">
			@foreach($gallery as $g)
			<a href="{{ base_url('galeri/show/').$g['id'] }}" class="unstyled">
				<div class="col-md-4">
					<div class="well w-100" style="min-height:340px">
						<h3 style="padding-left:20px;font-weight:300">{{ $g['title'] }}</h3>
						<p style="padding-left:20px">{{ $g['description'] }}</p>
						<ul class="gallery clearfix" style="padding-left:20px">
							@if(count($g['gambar']) >= 1)
							<li><a href="{{ base_url('galeri/show/').$g['id'] }}" rel="prettyPhoto[{{ $g['title'] }}]"><img src="{{ base_url('assets/images/gallery/').$g['title'].'/'.$g['gambar'][0]->images }}" width="150" height="150" class="img-wrap" alt="Gallery Thumbnails"/></a></li>
							@else
							<li><a href="{{ base_url('galeri/show/').$g['id'] }}" rel="prettyPhoto[{{ $g['title'] }}]"><img src="{{ base_url('assets/images/gallery/def-img-swu.jpg') }}" width="150" height="150" class="img-wrap" alt="Gallery Thumbnails"/></a></li>
							@endif
						</ul>
					</div>
				</div>
			</a>
			@endforeach
			</div>
		</div>
	</div>
@endsection