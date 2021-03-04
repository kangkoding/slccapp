@extends('template.simple.app')
@section('title', ' SLCC PGRI WONOSOBO')
@section('carousel')
@if(count($data_sliders) > 0)
<div class="row margin-bottom-20">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			<li data-target="#carousel-example-generic" data-slide-to="3"></li>
		</ol>
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<a href="#" title=""><img src="https://1.bp.blogspot.com/-h0kVZ7qmHGo/X6RSL1Yd2RI/AAAAAAAAAKg/Z0zLL2C-sLc7_TvNp99gR8mYkPef5AePgCLcBGAsYHQ/s500/SLCC-removebg-preview.png"></a>
				<div class="carousel-caption">
				</div>
			</div>
			<div class="item">
				<a href="#" title="">
					<img src="https://1.bp.blogspot.com/-h0kVZ7qmHGo/X6RSL1Yd2RI/AAAAAAAAAKg/Z0zLL2C-sLc7_TvNp99gR8mYkPef5AePgCLcBGAsYHQ/s500/SLCC-removebg-preview.png">
				</a>
				<div class="carousel-caption">
				</div>
			</div>
			<div class="item">
				<a href="#" title=""><img src="https://1.bp.blogspot.com/-h0kVZ7qmHGo/X6RSL1Yd2RI/AAAAAAAAAKg/Z0zLL2C-sLc7_TvNp99gR8mYkPef5AePgCLcBGAsYHQ/s500/SLCC-removebg-preview.png"></a>
				<div class="carousel-caption">
				</div>
			</div>
			<div class="item">
				<img src="assets/images/cr-1.jpg">
				<div class="carousel-caption">
				</div>
			</div>
		</div>
		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left fa fa-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right fa fa-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>
<br><br>
@endif
@endsection

@section('content')
<style>
	.forceright>a {
		padding-right: 0px;
	}

	@media screen and (max-width:768px) {
		.mbpT-10 {
			margin-top: 20px;
		}

		.forceright {
			float: none !important;
		}

		.future-block {
			float: none !important;
		}
	}

	@media screen and (max-width: 460px) {
		.carousel-inner>.item>a>img {
			display: block;
			max-width: 1000px;
			max-height: 200px;
			overflow: hidden;
		}
	}
</style>

<div class="row section" style="border-top:0px">
	<div class="container p-20">
		<div class="row" style="margin-top:30px;">
			<div class="col-md-12" style="margin-bottom:50px">
				<div class="row">
					<style>
						.panel {
							box-shadow: 0px !important;
						}
					</style>
					<div class="col-md-12">
						<div class="panel panel-sidebar" style="background-color:rgba(0,0,0,0)">
							<div class="panel-heading" style="border-bottom:solid 3px #00BCD4">
								<h3 class="panel-title bg-grad-2">Youtube </h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<div class="embed-responsive embed-responsive-16by9">
											<iframe width="420" height="315" class="embed-responsive-item" src="https://www.youtube.com/watch?v=0yZcDeVsj_Y&ab_channel=AdamEschborn" allowfullscreen></iframe>
										</div>
									</div>
								</div>
							</div>
							<div class="panel-footer">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12" style="margin-bottom:50px">
				<div class="row">
					<style>
						.panel {
							box-shadow: 0px !important;
						}
					</style>
					<?php
					$arrayCol = [
						array("col" => "8", "wp" => false),
						array("col" => "4", "wp" => true),
						array("col" => "8", "wp" => false),
						array("col" => "8", "wp" => false),
						array("col" => "8", "wp" => false),
					];
					$i = 0;

					foreach (news()['top'] as $top => $item) :
					?>
						<div class="col-md-{{$arrayCol[$i]['col']}}">
							<div class="panel panel-sidebar" style="background-color:rgba(0,0,0,0)">
								<div class="panel-heading" style="border-bottom:solid 3px #00BCD4">
									<h3 class="panel-title bg-grad-2">{{ $item['title'] }} </h3>
								</div>
								<div class="panel-body">
									@if($arrayCol[$i]['wp'] == true)
									<div class="row">
										@foreach($item['data'] as $p)
										<div class="col-xs-4" style="margin:0px;padding:0px">
											<a href="{{ base_url().permalink($p['permalink']).$p['slug'] }}">
												<div class="col-md-12">
													<!--<div>-->
													<!--	<img src="{{site_url('assets/images/post/'.$p['featured_image'])}}">-->
													<!--</div>-->
													<div class="news-title">
														<h4 style="font-size:13px;font-weight:lighter">{{ $p['judul'] }}</h4>
														<span style="font-size:13px;color:black"><i class="fa fa-clock-o c-green"></i> {{ date('d-m-Y',strtotime($p['created'])) }} <i class="fa fa-user c-green"></i> Admin</span>
													</div>
												</div>
											</a>
										</div>
										@endforeach
									</div>
									@else
									@foreach($item['data'] as $p)
									<a href="{{ base_url().permalink($p['permalink']).$p['slug'] }}">
										<div class="col-md-12">
											<div class="news-title">
												<div class="row event">
													<div class="col-xs-3 date">
														<h1 style="margin-bottom:0px;font-weight:bolder">{{ date('d',strtotime($p['created'])) }}</h1>
														<h4>{{ date('M',strtotime($p['created']))}}</h4>
													</div>
													<div class="col-xs-9 detail">
														<h5 style="font-weight:bold">{{ $p['judul'] }}</h5>
														<span style="font-size:13px;color:black"><i class="fa fa-user c-green"></i> Admin</span>
													</div>
												</div>
											</div>
										</div>
									</a>
									@endforeach
									@endif
								</div>
								<div class="panel-footer">
									<a class="btn btn-primary btn-lg" href="{{base_url('post/kategori/'.$item['slug'])}}">Lainya</a>
								</div>
							</div>
						</div>
					<?php $i++;
					endforeach ?>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					@php $postleft = news()['bottom']['left'] @endphp
					<div class="col-md-8">
						<div class="panel panel-sidebar " style="background-color:rgba(0,0,0,0)">
							<div class="panel-heading" style="border-bottom:solid 3px #00BCD4">
								<h3 class="panel-title" style="background-color:#00BCD4">{{ $postleft['title'] }}</h3>
							</div>
							<div class="panel-body" style="padding:10px 0px">
								<a href="{{ base_url().permalink($postleft['data']['permalink']).$postleft['data']['slug'] }}">
									<div class="col-md-12" style="padding:0px">
										<div class="news-images bottom" style="background:url({{ base_url('assets/images/').$postleft['data']['featured_image'] }});border:solid 1px #cecece;height:320px">
											<div class="news-title">
												<h4 style="font-size:15px;font-weight:bold">{{ $postleft['data']['judul'] }}</h4>
												<span style="font-size:13px;color:black"><i class="fa fa-clock-o c-green"></i> {{ date('d-m-Y',strtotime($postleft['data']['created'])) }} <i class="fa fa-user c-green"></i> Admin</span>
											</div>
										</div>
									</div>
								</a>
							</div>
							<div class="panel-footer">
								<a class="btn btn-primary btn-xs" href="{{base_url('post/kategori/'.$postleft['slug'])}}">Lainya</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						@php $postright = news()['bottom']['right'] @endphp
						<div class="panel panel-sidebar " style="background-color:rgba(0,0,0,0)">
							<div class="panel-heading">
								<h3 class="panel-title" style="background-color:#00BCD4">{{ $postright['title'] }}</h3>
							</div>
							<div class="panel-body">
								@php $lang = $this->session->userdata('swu_lang'); @endphp
								@foreach($postright['data'] as $item)
								<div class="row margin-bottom-10">
									<a href="{{ base_url().permalink($item['permalink']).$item['slug'] }}">
										<div class="col-md-12">
											<div class="news-title">
												<h4 style="font-size:15px;font-weight:bold">{{ $item['judul'] }}</h4>
												<span style="font-size:13px;color:black"><i class="fa fa-clock-o c-green"></i> {{ date('d-m-Y',strtotime($item['created'])) }} <i class="fa fa-user c-green"></i> Admin</span>
											</div>
										</div>
									</a>
								</div>
								@endforeach
							</div>
							<div class="panel-footer">
								<a class="btn btn-primary btn-xs" href="{{base_url('post/kategori/'.$postright['slug'])}}">Lainya</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 text-center" style="margin-top:20px"><a href="<?php echo base_url('post') ?>">View All <i class="fa fa-arrow-right"></i></a></div>
		</div>
	</div>
</div>

@endsection