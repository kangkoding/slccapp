@extends('template.simple.page')
@if($data->template == 1)
@section('subcontent')
@else
@section('content')
@endif
    <style>
		@media screen and (max-width: 460px) {
            .banner-left {
                height: 60px!important;
                background-position-y: -370px!important;
            }
		}
	</style>
	<div class="container">
		<div class="row p-20" style="margin-top:100px">
			@php $lang = $this->session->userdata('swu_lang') @endphp
			<div class="h-title" style="padding-bottom:10px;border-bottom:dotted 1px silver">
				<h3><i class="fa fa-files-o"></i> @if($lang != 2) {{ $data->judul }} @else {{ $data->title }} @endif </h3>
			</div>
			<div class="content p-20">
				@if($lang != 2) {{ $data->isi }} @else {{ $data->content }} @endif
			</div>
		</div>
	</div>
@endsection