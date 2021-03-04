@extends('template.simple.app')
	@section('content')
	<style>
		.panel {
			box-shadow: 0 0 0!important;
		}
		.header-v4 .row.header-wrapper {
			background:rgba(32, 65, 127, 1) !important;
		}
	</style>
	<div class="container">
	    <div class="row" style="margin-top:100px">
	        <div class="col-lg-9" style="box-shadow: 0px 0px 4px #b5acac;margin-top:15px">
	        	@yield('subcontent')
	        </div>
	        <div class="col-lg-3" style="margin-top:10px">
	        	@foreach(sidebar() as $sidebar)
					{{ $sidebar }}
	        	@endforeach
	        </div>
		</div>
	</div>
	@endsection