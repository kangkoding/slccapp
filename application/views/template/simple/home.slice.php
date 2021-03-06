@extends('template.simple.app')
@section('title', ' SLCC PGRI WONOSOBO')
@section('carousel')
@if(count($data_sliders) > 1)
<div class="col-md-12" style="margin-top: 50px;">
	<div class="row">
		<div class="coba">
			<div class="slider">
				<div class="slides">
					<?php
					foreach ($data_sliders as $key_sliders) :
					?>
						<div class="slide-item">
							<div class="slide-title bg-black">
								<h3><?= $key_sliders->title ?></h3>
							</div>
							<a href="<?= $key_sliders->url ?>">
								<img src="<?= base_url('assets/images/') . $key_sliders->image ?>">
							</a>
						</div>
					<?php
					endforeach;
					?>
				</div>
			</div>
		</div>
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
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<style>
						.panel {
							box-shadow: 0px !important;
						}

						.slider {
							width: 1050px;
							height: auto;
							text-align: center;
							overflow: hidden;
						}

						.slides {
							display: flex;
							height: auto;
							overflow-y: hidden;
							overflow-x: auto;
							scroll-snap-type: x mandatory;
							scroll-behavior: smooth;
							-webkit-overflow-scrolling: touch;

							/*
  scroll-snap-points-x: repeat(300px);
  scroll-snap-type: mandatory;
  */
						}

						.slides::-webkit-scrollbar {
							width: 10px;
							height: 10px;
						}

						.slides::-webkit-scrollbar-thumb {
							background: black;
							border-radius: 10px;
						}

						.slides::-webkit-scrollbar-track {
							background: transparent;
						}

						.slides>div {
							scroll-snap-align: start;
							flex-shrink: 0;
							width: 1050px;
							height: 400px;
							/* height: auto; */
							margin-right: 50px;
							border-radius: 10px;
							background: white;
							transform-origin: center center;
							transform: scale(1);
							transition: transform 0.5s;
							position: relative;
							padding: 10px;
							display: flex;
							justify-content: center;
							align-items: center;
							font-size: 100px;
							background-color: #F6F9FF;
						}

						.slide-title {
							height: 50px;
							min-width: 200px;
							position: absolute;
							opacity: 0.9;
							color: white;
							left: 0;
							padding: 10px;
						}

						.slide-title>h3 {
							color: white;
						}

						.slides>div:target {
							/*   transform: scale(0.8); */
						}

						.author-info {
							background: rgba(0, 0, 0, 0.75);
							color: white;
							padding: 0.75rem;
							text-align: center;
							position: absolute;
							bottom: 0;
							left: 0;
							width: 100%;
							margin: 0;
						}

						.author-info a {
							color: white;
						}

						/* img {
							object-fit: cover;
							position: absolute;
							top: 0;
							left: 0;
							width: 100%;
							height: 100%;
						} */

						.slider>a {
							display: inline-flex;
							width: 1.5rem;
							height: 1.5rem;
							background: white;
							text-decoration: none;
							align-items: center;
							justify-content: center;
							border-radius: 50%;
							margin: 0 0 0.5rem 0;
							position: relative;
						}

						.slider>a:active {
							top: 1px;
						}

						.slider>a:focus {
							background: #000;
						}

						/* Don't need button navigation */
						@supports (scroll-snap-type) {
							.slider>a {
								display: none;
							}
						}
					</style>
					<div class="col-md-12">
						<div class="col-md-12">
							<div class="row">
								<style>
									.panel {
										box-shadow: 0px !important;
									}
								</style>
								@if(settings('youtube_url') != '')
								<div class="col-md-8">
									<div class="row">
										<style>
											.panel {
												box-shadow: 0px !important;
											}
										</style>
										<div class="col-md-12">
											<div class="panel panel-sidebar" style="background-color:rgba(0,0,0,0)">
												<div class="panel-heading" style="border-bottom:solid 3px #00BCD4">
													<h3 class="panel-title bg-black">Subscribe Us </h3>
												</div>
												<div class="panel-body">
													<div class="youtube-video">
														<iframe src="<?= settings('youtube_url') ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endif
								<?php
								$arrayCol = [
									array("col" => "4", "wp" => false, "yt" => false, "wp-row" => true),
									array("col" => "8", "wp" => true, "yt" => false, "wp-row" => false),
									array("col" => "4", "wp" => false, "yt" => false, "wp-row" => false),
									array("col" => "8", "wp" => false, "yt" => false, "wp-row" => false),
								];

								// (settings('youtube_url') != '') ? array_unshift($arrayCol, array("col" => "8", "wp" => false, "yt" => true)) : '';

								$i = 0;

								foreach (news()['top'] as $top => $item) :
								?>
									<div class="col-md-{{$arrayCol[$i]['col']}}">
										<div class="panel panel-sidebar" style="background-color:rgba(0,0,0,0)">
											<div class="panel-heading" style="border-bottom:solid 3px #00BCD4">
												<h3 class="panel-title bg-black">{{ $item['title'] }} </h3>
											</div>
											<div class="panel-body">
												@if($arrayCol[$i]['wp'] == true)
												<div class="row">
													@foreach($item['data'] as $p)
													<div class="col-xs-4" style="margin:0px;padding:0px">
														<a href="{{ base_url().permalink($p['permalink']).$p['slug'] }}">
															<div class="col-md-12">
																<div>
																	<?php if ($p['featured_image'] != "") { ?>
																		<img src="{{site_url('assets/images/'.$p['featured_image'])}}">
																	<?php } else { ?>
																		<img src="http://tk.budyawacana.sch.id/joimg/publikasi/415069default-image.jpg">
																	<?php } ?>
																</div>
																<div class="news-title">
																	<h4 style="font-size:13px;font-weight:lighter">{{ $p['judul'] }}</h4>
																	<span style="font-size:13px;color:black"><i class="fa fa-clock-o c-green"></i> {{ date('d-m-Y',strtotime($p['created'])) }} <i class="fa fa-user c-green"></i> Admin</span>
																</div>
															</div>
														</a>
													</div>
													@endforeach
												</div>
												@elseif($arrayCol[$i]['wp-row'] == true)
												<div class="row">
													@foreach($item['data'] as $p)
													<a href="{{ base_url().permalink($p['permalink']).$p['slug'] }}">
														<div class="col-md-12">
															<div class="news-title">
																<div class="row event">
																	<div class="col-xs-3 date" style="padding: 0;">
																		<?php if ($p['featured_image'] != "") { ?>
																			<img src="{{site_url('assets/images/'.$p['featured_image'])}}" style="width: 180px;">
																		<?php } else { ?>
																			<img src="http://tk.budyawacana.sch.id/joimg/publikasi/415069default-image.jpg">
																		<?php } ?>
																	</div>
																	<div class="col-xs-9 detail" style="background-color: #F1F1E6;">
																		<h4 style="font-size:13px;font-weight:lighter">{{ $p['judul'] }}</h4>
																		<span style="font-size:13px;color:black"><i class="fa fa-clock-o c-green"></i> {{ date('d-m-Y',strtotime($p['created'])) }} <i class="fa fa-user c-green"></i> Admin</span>
																	</div>
																</div>
															</div>
														</div>
													</a>
													@endforeach
												</div>
												@else
												@foreach($item['data'] as $p)
												<a href="{{ base_url().permalink($p['permalink']).$p['slug'] }}">
													<div class="col-md-12">
														<div class="news-title">
															<div class="row event">
																<div class="col-xs-3 date bg-card-date">
																	<h1 style="margin-bottom:0px;font-weight:bolder;color: white;">{{ date('d',strtotime($p['created'])) }}</h1>
																	<h4 style="color: white;">{{ date('M',strtotime($p['created']))}}</h4>
																</div>
																<div class="col-xs-9 detail" style="background-color: #F1F1E6;">
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
															<span style="font-size:13px;color:whitesmoke"><i class="fa fa-clock-o c-green"></i> {{ date('d-m-Y',strtotime($postleft['data']['created'])) }} <i class="fa fa-user c-green"></i> Admin</span>
														</div>
													</div>
												</div>
											</a>
										</div>
										<div class="panel-footer">
											<a class="btn btn-primary btn-lg" href="{{base_url('post/kategori/'.$postleft['slug'])}}">Lainya</a>
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
											<a class="btn btn-primary btn-lg" href="{{base_url('post/kategori/'.$postright['slug'])}}">Lainya</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-center" style="margin-top:20px">
							<!-- <a href="<?php echo base_url('post') ?>">
								View All <i class="fa fa-arrow-right"></i>
							</a> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection