@extends('template.simple.page')
@section('title')
	Gallery
@endsection
@section('subcontent')
	<link rel="stylesheet" href="{{ base_url('assets/prettyphoto/') }}css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
	<script src="{{ base_url('assets/prettyphoto/') }}js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
    <style>
    	.gallery {
    		padding-bottom:100px;
    	}
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
        @media screen and (max-width:992px){
            .gallery-img {
                height:auto!important;
            }
            .gallery {
                margin-top:50px;
            }
        }
    </style>
	<div class="row gallery">
		<div class="col-md-12">
			<h2 class="title" style="text-align:center;margin-top:15px"><i class="fa fa-image"></i> Gallery</h2>
			@foreach($gallery as $g)
			<div class="row" style="padding:15px">
				<h3 style="padding-left:20px">{{ $g['title'] }}</h3>
				<p style="padding-left:20px">{{ $g['description'] }}</p>
				<ul class="gallery clearfix">
					@if(count($g['gambar']) >= 1)
						@foreach($g['gambar'] as $gambar)
							<li><a href="{{ base_url('assets/images/gallery/').$g['title'].'/'.$gambar->images }}" rel="prettyPhoto[{{ $g['title'] }}]" title="{{ $gambar->title }}"><img src="{{ base_url('assets/images/gallery/').$g['title'].'/'.$gambar->images }}" width="150" height="150" class="img-wrap"/></a></li>
						@endforeach
					@endif
				</ul>
			</div>
			@endforeach
		</div>
	</div>
	<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$("area[rel^='prettyPhoto']").prettyPhoto();
		
		$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
		$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});

		$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
			custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
			changepicturecallback: function(){ initialize(); }
		});

		$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
			custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
			changepicturecallback: function(){ _bsap.exec(); }
		});
	});
	</script>
@endsection