@extends('template.simple.app')
@section('content')
    <style>
        @media screen and (max-width:992px){
            #m-auto {
                font-size:40px!important;
            }
        }
    </style>
	<div style="height:200px;padding:30px;margin-top:30px">
		<h1 style="font-size:100px" id="m-auto">
			404 NOT FOUND
		</h1><br>
		<span>Maaf halaman yang anda cari tidak ditemukan.</span>
	</div>
@endsection